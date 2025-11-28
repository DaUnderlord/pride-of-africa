<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join Us · Pillars &amp; Pride of Afrika</title>
        <meta name="description" content="Apply to join the Pillars & Pride of Afrika talent roster. For models, actors, dancers, and creatives.">

        @include('partials.favicon')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />

        @if(config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endif

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-grain" aria-hidden="true"></div>

        <div class="relative min-h-screen">
            <!-- Background -->
            <div class="pointer-events-none fixed inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,_rgba(212,175,55,0.12),_transparent_50%)]"></div>
            </div>

            @include('partials.header')

            <main class="relative z-10 poa-container py-8 md:py-12">
                <!-- Success Message -->
                @if (session('status') === 'application_submitted')
                    <div class="mb-8 rounded-2xl border border-[rgba(212,175,55,0.5)] bg-[rgba(212,175,55,0.08)] p-6 text-center">
                        <div class="flex items-center justify-center gap-2 mb-3">
                            <svg class="w-6 h-6 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="poa-hero-heading text-xl text-[rgba(245,230,179,0.95)]">Application Submitted!</span>
                        </div>
                        <p class="text-sm text-neutral-300 mb-2">Your reference number is:</p>
                        <span class="poa-id-font text-lg tracking-[0.3em] text-[rgba(212,175,55,0.95)]">A-{{ str_pad((string) session('application_id'), 4, '0', STR_PAD_LEFT) }}</span>
                        <p class="mt-3 text-xs text-neutral-400">Our team will review your application and reach out if there's a fit.</p>
                    </div>
                @endif

                <div class="grid gap-8 lg:grid-cols-[1fr_1.3fr]">
                    <!-- Left Column - Info -->
                    <div class="space-y-6 poa-reveal">
                        <div>
                            <p class="poa-id-font text-[10px] tracking-[0.4em] text-[rgba(245,230,179,0.7)]">JOIN THE ROSTER</p>
                            <h1 class="poa-hero-heading text-3xl md:text-4xl tracking-[0.06em] mt-3">Become Part of Afrika's Premier Talent Directory</h1>
                        </div>

                        <p class="text-sm leading-relaxed text-neutral-300">
                            We're building a curated platform for African models, actors, dancers, hosts and creatives who want professional, agency-ready visibility with privacy protection.
                        </p>

                        <div class="space-y-4">
                            <h3 class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(245,230,179,0.8)]">IDEAL CANDIDATES</h3>
                            <ul class="space-y-3 text-sm text-neutral-300">
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    <span>16+ years old (or have a guardian who can represent you)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    <span>Based in or strongly connected to an African city or diaspora hub</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    <span>Open to commercial, editorial, film or campaign work</span>
                                </li>
                            </ul>
                        </div>

                        <div class="poa-card p-4 space-y-3">
                            <h3 class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(245,230,179,0.8)]">WHAT YOU GET</h3>
                            <ul class="space-y-2 text-xs text-neutral-400">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Professional anonymised portfolio
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Direct booking enquiries from brands
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    QR code for easy profile sharing
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Access to vetted agency partners
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column - Form -->
                    <div class="poa-card p-6 md:p-8 poa-reveal poa-reveal-delay-1">
                        <h2 class="poa-hero-heading text-xl mb-6">Application Form</h2>

                        @if ($errors->any())
                            <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4">
                                <p class="text-sm text-red-400 mb-2">Please fix the following errors:</p>
                                <ul class="text-xs text-red-300 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('join.store') }}" enctype="multipart/form-data" class="space-y-5">
                            @csrf

                            <!-- Personal Info Section -->
                            <div class="space-y-4">
                                <p class="poa-id-font text-[9px] tracking-[0.3em] text-[rgba(245,230,179,0.6)] border-b border-white/5 pb-2">PERSONAL INFORMATION</p>
                                
                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">First Name <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" required 
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Last Name <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" required 
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                </div>

                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Email <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" required 
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Phone <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+234..."
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                </div>

                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Date of Birth <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required 
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Gender <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <select name="gender" required class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition">
                                            <option value="">Select...</option>
                                            <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                                            <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                                            <option value="Non-binary" @selected(old('gender') == 'Non-binary')>Non-binary</option>
                                            <option value="Prefer not to say" @selected(old('gender') == 'Prefer not to say')>Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Address <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                    <input type="text" name="address" value="{{ old('address') }}" required placeholder="Street address"
                                        class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                </div>

                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">City <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="text" name="city" value="{{ old('city') }}" required placeholder="e.g. Lagos"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Country <span class="text-[rgba(212,175,55,0.8)]">*</span></label>
                                        <input type="text" name="country" value="{{ old('country') }}" required placeholder="e.g. Nigeria"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none focus:ring-1 focus:ring-[rgba(212,175,55,0.3)] transition" />
                                    </div>
                                </div>
                            </div>

                            <!-- Physical Attributes Section -->
                            <div class="space-y-4 pt-4">
                                <p class="poa-id-font text-[9px] tracking-[0.3em] text-[rgba(245,230,179,0.6)] border-b border-white/5 pb-2">PHYSICAL ATTRIBUTES</p>
                                
                                <div class="grid gap-4 grid-cols-2 md:grid-cols-4">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Height (cm)</label>
                                        <input type="number" name="height_cm" value="{{ old('height_cm') }}" placeholder="175"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Chest/Bust (cm)</label>
                                        <input type="number" name="chest_bust_cm" value="{{ old('chest_bust_cm') }}" placeholder="90"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Waist (cm)</label>
                                        <input type="number" name="waist_cm" value="{{ old('waist_cm') }}" placeholder="70"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Shoe Size</label>
                                        <input type="text" name="shoe_size" value="{{ old('shoe_size') }}" placeholder="42 EU"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                </div>

                                <div class="grid gap-4 grid-cols-3">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Hair Color</label>
                                        <input type="text" name="hair_color" value="{{ old('hair_color') }}" placeholder="Black"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Eye Color</label>
                                        <input type="text" name="eye_color" value="{{ old('eye_color') }}" placeholder="Brown"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Skin Tone</label>
                                        <input type="text" name="skin_tone" value="{{ old('skin_tone') }}" placeholder="Dark/Medium/Light"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Info Section -->
                            <div class="space-y-4 pt-4">
                                <p class="poa-id-font text-[9px] tracking-[0.3em] text-[rgba(245,230,179,0.6)] border-b border-white/5 pb-2">PROFESSIONAL INFORMATION</p>
                                
                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Primary Category</label>
                                        <select name="primary_category" class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition">
                                            <option value="">Select...</option>
                                            <option value="Fashion Model" @selected(old('primary_category') == 'Fashion Model')>Fashion Model</option>
                                            <option value="Commercial Model" @selected(old('primary_category') == 'Commercial Model')>Commercial Model</option>
                                            <option value="Editorial Model" @selected(old('primary_category') == 'Editorial Model')>Editorial Model</option>
                                            <option value="Runway Model" @selected(old('primary_category') == 'Runway Model')>Runway Model</option>
                                            <option value="Film/TV Actor" @selected(old('primary_category') == 'Film/TV Actor')>Film/TV Actor</option>
                                            <option value="Theatre Actor" @selected(old('primary_category') == 'Theatre Actor')>Theatre Actor</option>
                                            <option value="Dancer" @selected(old('primary_category') == 'Dancer')>Dancer</option>
                                            <option value="Host/Presenter" @selected(old('primary_category') == 'Host/Presenter')>Host/Presenter</option>
                                            <option value="Influencer/Content Creator" @selected(old('primary_category') == 'Influencer/Content Creator')>Influencer/Content Creator</option>
                                            <option value="Other" @selected(old('primary_category') == 'Other')>Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Other Talents</label>
                                        <input type="text" name="talents" value="{{ old('talents') }}" placeholder="e.g. Singing, Dancing, Languages"
                                            class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-2.5 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none transition" />
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 rounded-xl bg-white/5 border border-white/5">
                                    <input type="checkbox" name="has_experience" value="1" @checked(old('has_experience')) 
                                        class="mt-0.5 h-4 w-4 rounded border-white/30 bg-black/70 text-[rgba(212,175,55,0.9)] focus:ring-[rgba(212,175,55,0.5)]" />
                                    <div>
                                        <label class="text-sm text-neutral-200">I have previous professional experience</label>
                                        <p class="text-xs text-neutral-500 mt-0.5">Campaigns, shows, theatre, content creation, etc.</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Experience Details</label>
                                    <textarea name="experience_notes" rows="3" placeholder="Describe your professional experience, key projects, agencies, brands, or training..."
                                        class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-3 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none resize-none transition">{{ old('experience_notes') }}</textarea>
                                </div>

                                <div>
                                    <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Portfolio Links</label>
                                    <textarea name="portfolio_links" rows="2" placeholder="Instagram, TikTok, website, Dropbox, Google Drive..."
                                        class="w-full rounded-xl border border-white/10 bg-black/60 px-4 py-3 text-sm text-neutral-100 placeholder-neutral-600 focus:border-[rgba(212,175,55,0.6)] focus:outline-none resize-none transition">{{ old('portfolio_links') }}</textarea>
                                </div>
                            </div>

                            <!-- Photos Section -->
                            <div class="space-y-4 pt-4">
                                <p class="poa-id-font text-[9px] tracking-[0.3em] text-[rgba(245,230,179,0.6)] border-b border-white/5 pb-2">PROFILE PHOTOS</p>
                                
                                <div>
                                    <label class="mb-1.5 block text-[10px] uppercase tracking-[0.2em] text-neutral-400">Upload Images</label>
                                    <div class="relative">
                                        <input type="file" name="profile_images[]" multiple accept="image/*"
                                            class="w-full rounded-xl border border-dashed border-white/20 bg-black/40 px-4 py-6 text-sm text-neutral-300 file:mr-4 file:rounded-full file:border-0 file:bg-[rgba(212,175,55,0.2)] file:px-4 file:py-2 file:text-xs file:uppercase file:tracking-wider file:text-[rgba(245,230,179,0.9)] hover:border-[rgba(212,175,55,0.4)] transition cursor-pointer" />
                                    </div>
                                    <p class="mt-2 text-[10px] text-neutral-500">Upload clear headshots and full-body photos. Max 3MB each. JPG, PNG accepted.</p>
                                </div>
                            </div>

                            <!-- Hidden age field (calculated from DOB on server) -->
                            <input type="hidden" name="age" value="{{ old('age', '18+') }}">

                            <!-- reCAPTCHA -->
                            @if(config('services.recaptcha.site_key'))
                                <div class="pt-2">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-theme="dark"></div>
                                    @error('g-recaptcha-response')
                                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif

                            <!-- Submit -->
                            <div class="pt-4">
                                <button type="submit" 
                                    class="poa-magnetic poa-btn-shine w-full md:w-auto inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-10 py-4 text-[11px] font-medium uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] shadow-[0_15px_40px_rgba(212,175,55,0.15)] transition-all duration-300 hover:bg-[rgba(212,175,55,0.28)] hover:shadow-[0_20px_50px_rgba(212,175,55,0.25)]">
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            @include('partials.footer')
            @include('partials.whatsapp-button')
        </div>

        @include('partials.chat-widget')
    </body>
</html>
