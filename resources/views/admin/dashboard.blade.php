<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Owner Dashboard · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#000000] text-white">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.14),_transparent_55%),_#000000]">
            <header class="border-b border-white/5 bg-black/80 backdrop-blur">
                <div class="poa-container py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars &amp; Pride of Afrika" class="h-8 w-auto object-contain" />
                            </div>
                            <div class="leading-tight">
                                <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">OWNER DASHBOARD</div>
                                <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Pillars &amp; Pride of Afrika</div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                            @csrf
                            <button type="submit" class="hover:text-neutral-100">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <section class="space-y-3">
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">OVERVIEW</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Manage the platform at a glance.</h1>
                    <p class="max-w-2xl text-sm leading-relaxed text-neutral-300">
                        From here you can review bookings and applications, publish journal entries, and manage accredited agents and
                        their portfolios.
                    </p>
                </section>

                <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('admin.bookings.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">BOOKINGS</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Incoming enquiries</h2>
                            <p class="text-[12px] text-neutral-400">View and triage booking requests for listed talent.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ route('admin.applications.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">APPLICATIONS</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Join Us submissions</h2>
                            <p class="text-[12px] text-neutral-400">Review new model and talent applications from the site.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">MESSAGES</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Contact messages</h2>
                            <p class="text-[12px] text-neutral-400">Read and respond to contact form submissions.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ route('admin.agents.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">ACCREDITED AGENTS</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Industry partners</h2>
                            <p class="text-[12px] text-neutral-400">Approve agents and monitor portfolios they upload.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>
                </section>

                <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('admin.posts.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">POSTS / JOURNAL</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Agency journal</h2>
                            <p class="text-[12px] text-neutral-400">Publish updates, casting calls and campaign notes.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ route('admin.testimonials.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">TESTIMONIALS</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Client feedback</h2>
                            <p class="text-[12px] text-neutral-400">Manage testimonials from clients and partners.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ route('admin.partners.index') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">PARTNERS</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Brand partners</h2>
                            <p class="text-[12px] text-neutral-400">Manage partner logos and collaborations.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>

                    <a href="{{ url('/') }}" class="poa-card group flex flex-col justify-between p-5 text-sm text-neutral-200">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">VIEW SITE</p>
                            <h2 class="poa-hero-heading text-base tracking-[0.1em]">Public website</h2>
                            <p class="text-[12px] text-neutral-400">Preview the public-facing website.</p>
                        </div>
                        <span class="mt-4 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.9)] group-hover:text-white">Open &rarr;</span>
                    </a>
                </section>
            </main>
        </div>
    </body>
</html>
