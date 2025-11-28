<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Talent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class TalentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Talent::query()->where('is_active', true);

        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('talent_code', 'like', "%{$search}%")
                    ->orWhere('display_name', 'like', "%{$search}%");
            });
        }

        if ($category = $request->string('category')->toString()) {
            $query->where('category', $category);
        }

        if ($location = $request->string('location')->toString()) {
            $query->where(function ($q) use ($location) {
                $q->where('city', 'like', "%{$location}%")
                    ->orWhere('country', 'like', "%{$location}%");
            });
        }

        $talents = $query->orderBy('talent_code')->paginate(9)->withQueryString();

        return view('talent.index', [
            'talents' => $talents,
        ]);
    }

    public function show(Talent $talent): View
    {
        return view('talent.show', [
            'talent' => $talent,
        ]);
    }

    public function storeBooking(Request $request, Talent $talent): RedirectResponse
    {
        // Rate limiting - max 5 bookings per hour per IP
        $key = 'booking-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withInput()
                ->withErrors(['rate_limit' => "Too many submissions. Please try again in {$seconds} seconds."]);
        }

        RateLimiter::hit($key, 3600);

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
            'client_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'project_title' => ['nullable', 'string', 'max:255'],
            'project_details' => ['nullable', 'string'],
            'budget_range' => ['nullable', 'string', 'max:255'],
            'shoot_location' => ['nullable', 'string', 'max:255'],
            'shoot_dates' => ['nullable', 'string', 'max:255'],
        ]);

        $booking = Booking::create(
            array_merge($validated, [
                'talent_id' => $talent->id,
                'status' => 'pending',
                'meta' => [
                    'source' => 'public_site',
                ],
            ])
        );

        $adminAddress = config('mail.from.address');
        if ($adminAddress && config('mail.mailer') !== 'log') {
            try {
                Mail::send([], [], function ($mail) use ($talent, $booking, $adminAddress) {
                    $mail->to($adminAddress)
                        ->subject('New Booking Enquiry: ' . $talent->display_name)
                        ->html("
                            <h2>New Booking Enquiry</h2>
                            <p><strong>Talent:</strong> {$talent->display_name} ({$talent->talent_code})</p>
                            <p><strong>Client:</strong> {$booking->client_name}</p>
                            <p><strong>Email:</strong> {$booking->email}</p>
                            <p><strong>Company:</strong> " . ($booking->company_name ?: 'Not provided') . "</p>
                            <p><strong>Project:</strong> " . ($booking->project_title ?: 'Not specified') . "</p>
                            <hr>
                            <p><strong>Details:</strong></p>
                            <p>" . nl2br(e($booking->project_details ?: 'No details provided')) . "</p>
                        ");
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send booking notification email: ' . $e->getMessage());
            }
        }

        return back()
            ->with('status', 'booking_submitted')
            ->with('booking_id', $booking->id);
    }

    /**
     * Generate QR code for talent profile
     */
    public function qrCode(Talent $talent): Response
    {
        $profileUrl = route('talent.show', $talent);
        
        // Use Google Charts API for QR code generation (free, no package needed)
        $qrApiUrl = 'https://chart.googleapis.com/chart?' . http_build_query([
            'cht' => 'qr',
            'chs' => '300x300',
            'chl' => $profileUrl,
            'choe' => 'UTF-8',
            'chld' => 'H|2', // High error correction, 2px margin
        ]);

        try {
            $response = Http::timeout(10)->get($qrApiUrl);
            
            if ($response->successful()) {
                return response($response->body(), 200)
                    ->header('Content-Type', 'image/png')
                    ->header('Cache-Control', 'public, max-age=86400');
            }
        } catch (\Exception $e) {
            \Log::error('QR code generation failed: ' . $e->getMessage());
        }

        // Fallback: return a placeholder or redirect
        abort(503, 'QR code generation temporarily unavailable');
    }
}
