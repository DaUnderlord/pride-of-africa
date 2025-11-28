<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $talent->display_name }} · {{ $talent->talent_code }} · Pillars &amp; Pride of Africa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endif
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.18),_transparent_55%),_#000000] text-white">
        <div class="relative min-h-screen">
            <header class="sticky top-0 z-50 border-b border-white/10 bg-black/70 backdrop-blur">
                <div class="poa-container flex items-center justify-between py-6">
                    <div class="flex items-center gap-3">
                        <div class="h-10">
                            <img
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="Pillars &amp; Pride of Africa"
                                class="h-10 w-auto object-contain"
                            />
                        </div>
                        <div class="leading-tight">
                            <div class="poa-id-font text-xs tracking-[0.32em] text-[rgba(245,230,179,0.9)]">
                                TALENT PROFILE · {{ $talent->talent_code }}
                            </div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">
                                {{ $talent->city }} · {{ $talent->country }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.32em] text-neutral-300">
                        <nav class="hidden items-center gap-7 md:flex">
                            <a href="{{ url('/') }}" class="hover:text-white/90 transition-colors">Home</a>
                            <a href="{{ route('talent.index') }}" class="hover:text-white/90 transition-colors">Directory</a>
                        </nav>

                        <button
                            type="button"
                            data-theme-toggle
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-black/60 text-[rgba(245,230,179,0.95)] shadow-[0_0_0_1px_rgba(255,255,255,0.05)] transition hover:border-[rgba(212,175,55,0.8)] hover:text-white"
                            aria-label="Toggle theme"
                        >
                            <span class="text-xs">◎</span>
                        </button>
                    </div>
                </div>
            </header>

            <main class="relative z-10 pb-16">
                <section class="poa-container grid gap-12 py-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]" data-reveal>
                    <div class="space-y-6">
                        <div class="poa-card overflow-hidden">
                            <div class="relative aspect-[3/4] w-full">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>
                                <div
                                    class="absolute inset-0 bg-cover bg-center"
                                    style="background-image: url('{{ $talent->hero_image_url ?: 'https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=1200' }}');"
                                ></div>
                            </div>

                            <div class="flex items-center justify-between gap-4 border-t border-white/5 bg-black/70 px-6 py-4 text-[11px]">
                                <div class="space-y-1">
                                    <div class="poa-id-font tracking-[0.26em] text-[rgba(245,230,179,0.95)]">
                                        {{ $talent->display_name }}
                                    </div>
                                    <div class="text-neutral-300">
                                        {{ $talent->primary_role ?? $talent->category ?? 'Talent role pending' }}
                                    </div>
                                </div>

                                <div class="flex flex-col items-end gap-1 text-[10px] uppercase tracking-[0.24em] text-neutral-200">
                                    @if ($talent->is_verified)
                                        <span class="rounded-full border border-[rgba(212,175,55,0.7)] bg-[rgba(0,0,0,0.75)] px-3 py-1 text-[rgba(245,230,179,0.95)]">
                                            Verified Talent
                                        </span>
                                    @endif
                                    <span>{{ $talent->city }} · {{ $talent->country }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="poa-card space-y-3 p-6 text-sm text-neutral-200">
                                <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                    STORY &amp; NOTES
                                </p>
                                <p class="leading-relaxed">
                                    {{ $talent->short_bio ?: 'This profile is ready to receive a fully editorial bio. In production, this will tell the story of the talent, their experience and visual positioning.' }}
                                </p>
                            </div>

                            <div class="poa-card p-6 text-sm text-neutral-200">
                                <p class="poa-id-font mb-3 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                    STATS &amp; MEASUREMENTS
                                </p>
                                <dl class="grid grid-cols-2 gap-3 text-[12px]">
                                    <div>
                                        <dt class="text-neutral-400">Height</dt>
                                        <dd class="text-neutral-100">{{ $talent->height_cm ? $talent->height_cm.' cm' : '—' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-neutral-400">Gender</dt>
                                        <dd class="text-neutral-100">{{ $talent->gender ?: '—' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-neutral-400">Bust</dt>
                                        <dd class="text-neutral-100">{{ $talent->bust_cm ? $talent->bust_cm.' cm' : '—' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-neutral-400">Waist</dt>
                                        <dd class="text-neutral-100">{{ $talent->waist_cm ? $talent->waist_cm.' cm' : '—' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-neutral-400">Hips</dt>
                                        <dd class="text-neutral-100">{{ $talent->hips_cm ? $talent->hips_cm.' cm' : '—' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-neutral-400">Shoe</dt>
                                        <dd class="text-neutral-100">{{ $talent->shoe_size ?: '—' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        @php
                            $gallery = is_array($talent->gallery) ? $talent->gallery : [];
                        @endphp

                        <div class="poa-card p-6 text-sm text-neutral-200" data-reveal>
                            <div class="flex items-center justify-between gap-3">
                                <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                    GALLERY PREVIEW
                                </p>
                                <span class="text-[10px] uppercase tracking-[0.26em] text-neutral-400">Identity-aware framing</span>
                            </div>

                            <div class="mt-4 grid grid-cols-3 gap-3 md:grid-cols-4">
                                @forelse ($gallery as $image)
                                    <div class="group relative overflow-hidden rounded-xl border border-white/10 bg-black/60">
                                        <div
                                            class="aspect-[3/4] w-full bg-cover bg-center opacity-80 transition duration-500 group-hover:scale-[1.05] group-hover:opacity-100"
                                            style="background-image: url('{{ $image }}');"
                                        ></div>
                                    </div>
                                @empty
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="flex aspect-[3/4] items-center justify-center rounded-xl border border-dashed border-white/10 bg-black/40 text-[11px] text-neutral-500">
                                            Coming soon
                                        </div>
                                    @endfor
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="poa-card p-6 text-sm text-neutral-200">
                            <p class="poa-id-font mb-3 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                BOOKING / ENQUIRY
                            </p>
                            <p class="mb-4 text-[13px] leading-relaxed text-neutral-300">
                                Share your project details below. This will be routed to the Pillars &amp; Pride admin team and
                                relevant accredited agents for this talent.
                            </p>

                            @if (session('status') === 'booking_submitted')
                                <div class="mb-4 rounded-lg border border-[rgba(212,175,55,0.7)] bg-[rgba(212,175,55,0.08)] px-4 py-3 text-[12px] text-[rgba(245,230,179,0.95)]">
                                    Your enquiry has been received. Reference:
                                    <span class="poa-id-font text-[11px] tracking-[0.26em]">
                                        B-{{ str_pad((string) session('booking_id'), 4, '0', STR_PAD_LEFT) }}
                                    </span>.
                                    A member of the team will review and get back to you.
                                </div>
                            @endif

                            <form
                                method="POST"
                                action="{{ route('talent.booking.store', $talent) }}"
                                class="space-y-4"
                            >
                                @csrf

                                <div class="grid gap-3 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Client name *</label>
                                        <input
                                            type="text"
                                            name="client_name"
                                            value="{{ old('client_name') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                            required
                                        />
                                        @error('client_name')
                                            <p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Company</label>
                                        <input
                                            type="text"
                                            name="company_name"
                                            value="{{ old('company_name') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        />
                                    </div>
                                </div>

                                <div class="grid gap-3 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Email *</label>
                                        <input
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                            required
                                        />
                                        @error('email')
                                            <p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Phone</label>
                                        <input
                                            type="text"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Project title</label>
                                    <input
                                        type="text"
                                        name="project_title"
                                        value="{{ old('project_title') }}"
                                        class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                    />
                                </div>

                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Project details</label>
                                    <textarea
                                        name="project_details"
                                        rows="4"
                                        class="w-full rounded-3xl border border-white/10 bg-black/60 px-4 py-3 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        placeholder="Usage, territories, dates, deliverables, references..."
                                    >{{ old('project_details') }}</textarea>
                                </div>

                                <div class="grid gap-3 md:grid-cols-3">
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Budget range</label>
                                        <input
                                            type="text"
                                            name="budget_range"
                                            value="{{ old('budget_range') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        />
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Shoot location</label>
                                        <input
                                            type="text"
                                            name="shoot_location"
                                            value="{{ old('shoot_location') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        />
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Preferred dates</label>
                                        <input
                                            type="text"
                                            name="shoot_dates"
                                            value="{{ old('shoot_dates') }}"
                                            class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2 text-[12px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        />
                                    </div>
                                </div>

                                @if(config('services.recaptcha.site_key'))
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-theme="dark"></div>
                                @endif

                                <div class="pt-2">
                                    <button
                                        type="submit"
                                        class="inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-3 text-[10px] uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)] hover:text-white"
                                    >
                                        Submit Booking Enquiry
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="poa-card grid gap-4 p-6 text-[11px] text-neutral-200 md:grid-cols-[minmax(0,1.2fr)_minmax(0,0.9fr)]">
                            <div>
                                <p class="poa-id-font mb-2 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                    PROFILE SHARING & QR CODE
                                </p>
                                <p class="text-neutral-400 mb-3">
                                    Scan this QR code with your phone camera to quickly access this talent's profile, 
                                    or share it at events and casting calls for instant portfolio viewing.
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    <a 
                                        href="{{ route('talent.qr', $talent) }}" 
                                        download="{{ $talent->talent_code }}-qr.png"
                                        class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1.5 text-[10px] uppercase tracking-[0.22em] text-neutral-200 transition hover:bg-white/10"
                                    >
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Download QR
                                    </a>
                                    <button 
                                        type="button"
                                        onclick="navigator.clipboard.writeText('{{ route('talent.show', $talent) }}').then(() => alert('Profile URL copied!'))"
                                        class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1.5 text-[10px] uppercase tracking-[0.22em] text-neutral-200 transition hover:bg-white/10"
                                    >
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        Copy Link
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <div class="flex flex-col items-center justify-center rounded-2xl border border-[rgba(212,175,55,0.6)] bg-white p-2 shadow-[0_18px_45px_rgba(0,0,0,0.85)]">
                                    <img 
                                        src="{{ route('talent.qr', $talent) }}" 
                                        alt="QR Code for {{ $talent->display_name }}"
                                        class="h-24 w-24"
                                        loading="lazy"
                                    />
                                    <span class="mt-1 poa-id-font text-[8px] tracking-[0.2em] text-neutral-600">
                                        {{ $talent->talent_code }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="border-t border-white/5 bg-black/80">
                <div class="poa-container flex flex-col gap-6 py-8 text-[11px] text-neutral-400 md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-8">
                            <img
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="Pillars &amp; Pride of Africa"
                                class="h-8 w-auto object-contain"
                            />
                        </div>
                        <div>
                            <div class="poa-id-font tracking-[0.32em] text-[rgba(245,230,179,0.9)]">
                                PILLARS &amp; PRIDE OF AFRICA
                            </div>
                            <div class="mt-1 text-[10px] uppercase tracking-[0.28em] text-neutral-500">
                                Booking flow prototype
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 md:justify-end">
                        <a href="{{ route('talent.index') }}" class="hover:text-neutral-200">Back to Directory</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
