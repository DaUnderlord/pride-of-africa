<?php

namespace App\Http\Controllers;

use App\Models\ModelApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class JoinUsController extends Controller
{
    public function create(): View
    {
        return view('join.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:50'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'membership_option' => ['nullable', 'string', 'max:255'],
            'skin_tone' => ['nullable', 'string', 'max:255'],
            'height_cm' => ['nullable', 'integer', 'min:120', 'max:220'],
            'chest_bust_cm' => ['nullable', 'integer', 'min:50', 'max:200'],
            'waist_cm' => ['nullable', 'integer', 'min:40', 'max:200'],
            'hair_color' => ['nullable', 'string', 'max:255'],
            'eye_color' => ['nullable', 'string', 'max:255'],
            'shoe_size' => ['nullable', 'string', 'max:255'],
            'primary_category' => ['nullable', 'string', 'max:255'],
            'talents' => ['nullable', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'has_experience' => ['nullable', 'boolean'],
            'experience_notes' => ['nullable', 'string'],
            'portfolio_links' => ['nullable', 'string'],
            'profile_images.*' => ['nullable', 'image', 'max:3072'],
        ]);

        $imagePaths = [];
        if ($request->hasFile('profile_images')) {
            foreach ((array) $request->file('profile_images') as $file) {
                if ($file) {
                    $imagePaths[] = $file->store('applications/profile-images', 'public');
                }
            }
        }

        $application = ModelApplication::create([
            ...$validated,
            'full_name' => $validated['first_name'].' '.$validated['last_name'],
            'age_range' => $validated['age'],
            'has_experience' => (bool) $request->boolean('has_experience'),
            'profile_images' => $imagePaths,
            'status' => 'pending',
            'meta' => [
                'source' => 'public_join_form',
            ],
        ]);

        $adminAddress = config('mail.from.address');
        if ($adminAddress) {
            Mail::raw(
                'New talent application from '.$application->full_name.' '.$application->email,
                function ($message) use ($adminAddress) {
                    $message->to($adminAddress)->subject('New talent application');
                }
            );
        }

        return redirect()
            ->route('join.create')
            ->with('status', 'application_submitted')
            ->with('application_id', $application->id);
    }
}
