<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Talent Directory · Pillars &amp; Pride of Africa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    </div>

                    <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.32em] text-neutral-300">
                        <nav class="hidden items-center gap-7 md:flex">
                            <a href="{{ url('/') }}" class="hover:text-white/90 transition-colors">Home</a>
                            <a href="#filters" class="hover:text-white/90 transition-colors">Filters</a>
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
                <section id="filters" class="poa-container pt-10 pb-6" data-reveal>
                    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                        <div class="space-y-3">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                DIRECTORY FILTERS
                            </p>
                            <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Browse the roster.</h1>
                            <p class="max-w-xl text-sm leading-relaxed text-neutral-300">
                                This is the prototype directory view. Filters and search are wired visually and can later be
                                connected to the database and API.
                            </p>
                        </div>

                        <form method="GET" class="grid w-full max-w-xl grid-cols-1 gap-3 text-xs md:grid-cols-3">
                            <input
                                type="text"
                                name="q"
                                placeholder="Search by talent ID or internal ref"
                                value="{{ request('q') }}"
                                class="rounded-full border border-white/10 bg-black/50 px-4 py-2 text-[11px] placeholder:text-neutral-500 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                            />
                            <select
                                name="category"
                                class="rounded-full border border-white/10 bg-black/50 px-4 py-2 text-[11px] text-neutral-200 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                            >
                                <option value="">Category</option>
                                <option value="Fashion / Editorial" @selected(request('category') === 'Fashion / Editorial')>Fashion / Editorial</option>
                                <option value="Commercial / Lifestyle" @selected(request('category') === 'Commercial / Lifestyle')>Commercial / Lifestyle</option>
                                <option value="Runway" @selected(request('category') === 'Runway')>Runway</option>
                                <option value="Film / TV" @selected(request('category') === 'Film / TV')>Film / TV</option>
                                <option value="Kids" @selected(request('category') === 'Kids')>Kids</option>
                                <option value="Plus-size / Curve" @selected(request('category') === 'Plus-size / Curve')>Plus-size / Curve</option>
                            </select>
                            <select
                                name="location"
                                class="rounded-full border border-white/10 bg-black/50 px-4 py-2 text-[11px] text-neutral-200 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                            >
                                <option value="">Location</option>
                                <option value="Lagos" @selected(request('location') === 'Lagos')>Lagos, Nigeria</option>
                                <option value="Accra" @selected(request('location') === 'Accra')>Accra, Ghana</option>
                                <option value="Nairobi" @selected(request('location') === 'Nairobi')>Nairobi, Kenya</option>
                                <option value="Cape Town" @selected(request('location') === 'Cape Town')>Cape Town, South Africa</option>
                                <option value="Abuja" @selected(request('location') === 'Abuja')>Abuja, Nigeria</option>
                            </select>
                        </form>
                    </div>
                </section>

                <section class="poa-container" data-reveal>
                    <div class="flex items-center justify-between gap-4 pb-4 text-[11px] text-neutral-400">
                        <div>Showing a preview of the directory (static data).</div>
                        <div class="hidden items-center gap-2 md:flex">
                            <span class="h-px w-8 bg-[rgba(212,175,55,0.7)]"></span>
                            <span>Full filters, search &amp; pagination coming in the next phase.</span>
                        </div>
                    </div>

                    <div class="grid gap-7 md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($talents as $entry)
                            <article class="poa-card group flex flex-col overflow-hidden" data-reveal>
                                <div class="relative aspect-[4/5] overflow-hidden">
                                    <div class="absolute inset-0 bg-[url('https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=900')] bg-cover bg-center opacity-65 transition duration-500 group-hover:scale-[1.03] group-hover:opacity-85"></div>
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(0,0,0,0.15),_transparent_55%)]"></div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                                    <div class="absolute inset-0 flex flex-col justify-between px-5 py-4 text-[11px]">
                                        <div class="flex items-center justify-between">
                                            <span class="rounded-full border border-[rgba(212,175,55,0.75)] bg-[rgba(0,0,0,0.75)] px-3 py-1 text-[10px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.95)]">
                                                {{ $entry->city }} — {{ $entry->country }}
                                            </span>
                                            <span class="poa-id-font text-[11px] tracking-[0.24em] text-[rgba(245,230,179,0.95)]">
                                                {{ $entry->talent_code }}
                                            </span>
                                        </div>
                                        <div class="space-y-1">
                                            <div class="text-[11px] text-neutral-200">{{ $entry->category ?? 'Category pending' }}</div>
                                            <div class="flex flex-wrap gap-1">
                                                @if ($entry->primary_role)
                                                    <span class="rounded-full border border-white/15 bg-black/60 px-2 py-1 text-[10px] uppercase tracking-[0.22em] text-neutral-100">
                                                        {{ $entry->primary_role }}
                                                    </span>
                                                @endif
                                                @if ($entry->gender)
                                                    <span class="rounded-full border border-white/15 bg-black/60 px-2 py-1 text-[10px] uppercase tracking-[0.22em] text-neutral-100">
                                                        {{ $entry->gender }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between gap-4 border-t border-white/5 bg-black/60 px-5 py-4 text-[11px]">
                                    <div class="text-neutral-300">
                                        <span class="text-neutral-400">Booking note:</span>
                                        <span class="ml-1 text-neutral-100">Profile ready for editorial review.</span>
                                    </div>
                                    <button
                                        type="button"
                                        onclick="window.location.href='{{ route('talent.show', $entry) }}'"
                                        class="rounded-full border border-white/15 bg-white/5 px-4 py-2 text-[10px] uppercase tracking-[0.22em] text-neutral-100 transition group-hover:border-[rgba(212,175,55,0.7)] group-hover:bg-white/10"
                                    >
                                        View Profile
                                    </button>
                                </div>
                            </article>
                        @empty
                            <p class="text-sm text-neutral-400">No talent matches this filter yet. Adjust filters or check back soon.</p>
                        @endforelse
                    </div>
                    @if ($talents instanceof \Illuminate\Contracts\Pagination\Paginator || $talents instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                        <div class="mt-10 flex justify-center">
                            {{ $talents->onEachSide(1)->links() }}
                        </div>
                    @endif
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
                                Talent Directory Prototype
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 md:justify-end">
                        <a href="{{ url('/') }}" class="hover:text-neutral-200">Back to Home</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
