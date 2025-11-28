<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Become an Accredited Agent · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.18),_transparent_55%),_#000000] text-white">
        <div class="relative min-h-screen">
            <header class="sticky top-0 z-50 border-b border-white/10 bg-black/80 backdrop-blur">
                <div class="poa-container flex items-center justify-between py-6">
                    <div class="flex items-center gap-3">
                        <div class="h-10">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars &amp; Pride of Afrika" class="h-10 w-auto object-contain" />
                        </div>
                        <div class="leading-tight">
                            <div class="poa-id-font text-xs tracking-[0.35em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENT ACCESS</div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">Work with us, keep your roster</div>
                        </div>
                    </div>
                    <a href="{{ route('agents.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back to directory</a>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <section class="max-w-3xl space-y-4">
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">FOR INDUSTRY PROFESSIONALS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Become an Accredited Model / Talent Manager.</h1>
                    <p class="text-sm leading-relaxed text-neutral-300">
                        Accredited agents upload campaigns, editorials and show images on behalf of their models. Our goal is to protect
                        your relationships while giving your talent greater visibility. This platform is not here to collect your models
                        directly—we route briefs back through accredited managers like you.
                    </p>
                </section>

                @if (session('status'))
                    <div class="poa-card max-w-3xl border border-emerald-500/40 bg-emerald-500/10 p-4 text-[13px] text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                <section class="poa-card max-w-3xl p-6 text-sm text-neutral-200">
                    <form method="POST" action="{{ route('agents.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Your name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                                @error('name')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Agency / company name</label>
                                <input type="text" name="agency_name" value="{{ old('agency_name') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('agency_name')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                                @error('email')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Phone / WhatsApp</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('phone')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">City</label>
                                <input type="text" name="city" value="{{ old('city') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('city')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Country</label>
                                <input type="text" name="country" value="{{ old('country') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('country')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Tell us about your roster &amp; experience</label>
                            <textarea name="bio" rows="5" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Website (optional)</label>
                                <input type="text" name="website" value="{{ old('website') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('website')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Instagram handle (optional)</label>
                                <input type="text" name="instagram" value="{{ old('instagram') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                                @error('instagram')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2 text-[11px] uppercase tracking-[0.26em]">
                            <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">Submit request</button>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </body>
</html>
