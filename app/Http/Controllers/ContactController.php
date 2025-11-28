<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        // Rate limiting - max 5 submissions per hour per IP
        $key = 'contact-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withInput()
                ->withErrors(['rate_limit' => "Too many submissions. Please try again in {$seconds} seconds."]);
        }

        RateLimiter::hit($key, 3600); // 1 hour decay

        // Validate reCAPTCHA if configured
        if (config('services.recaptcha.secret')) {
            $request->validate([
                'g-recaptcha-response' => ['required', 'string'],
            ], [
                'g-recaptcha-response.required' => 'Please complete the CAPTCHA verification.',
            ]);

            $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$recaptchaResponse->json('success')) {
                return back()
                    ->withInput()
                    ->withErrors(['captcha' => 'CAPTCHA verification failed. Please try again.']);
            }
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        $contactMessage = ContactMessage::create($validated);

        // Send email notification to admin
        $adminEmail = config('mail.from.address');
        if ($adminEmail && config('mail.mailer') !== 'log') {
            try {
                Mail::send([], [], function ($mail) use ($contactMessage, $adminEmail) {
                    $mail->to($adminEmail)
                        ->subject('New Contact Message: ' . ($contactMessage->subject ?: 'General Enquiry'))
                        ->html("
                            <h2>New Contact Message</h2>
                            <p><strong>From:</strong> {$contactMessage->name}</p>
                            <p><strong>Email:</strong> {$contactMessage->email}</p>
                            <p><strong>Phone:</strong> " . ($contactMessage->phone ?: 'Not provided') . "</p>
                            <p><strong>Subject:</strong> " . ($contactMessage->subject ?: 'General Enquiry') . "</p>
                            <hr>
                            <p><strong>Message:</strong></p>
                            <p>" . nl2br(e($contactMessage->message)) . "</p>
                        ");
                });
            } catch (\Exception $e) {
                // Log error but don't fail the request
                \Log::error('Failed to send contact notification email: ' . $e->getMessage());
            }
        }

        return redirect()
            ->route('contact')
            ->with('status', 'message_sent')
            ->with('message_id', $contactMessage->id);
    }
}
