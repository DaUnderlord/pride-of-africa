<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accredited Agents · Pillars &amp; Pride of Afrika</title>
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
                            <div class="poa-id-font text-xs tracking-[0.35em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENTS</div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">Model &amp; talent managers</div>
                        </div>
                    </div>
                    <a href="{{ url('/') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back home</a>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <section class="space-y-3 max-w-3xl">
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">ACCREDITED MODEL / TALENT MANAGERS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Industry partners we trust with their rosters.</h1>
                    <p class="text-sm leading-relaxed text-neutral-300">
                        This directory showcases accredited agents and talent managers who upload campaigns, shows and portfolios on behalf
                        of their models. The platform is designed to work <span class="font-semibold text-[rgba(245,230,179,0.95)]">with</span> agents, not to collect or bypass them.
                    </p>
                </section>

                <section class="flex flex-wrap items-center justify-between gap-4 text-[11px] uppercase tracking-[0.26em] text-neutral-300">
                    <div>Approved agents: {{ $agents->total() }}</div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('agents.apply') }}" class="rounded-full border border-[rgba(212,175,55,0.8)] bg-[rgba(212,175,55,0.16)] px-5 py-2 text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.26)]">Become accredited</a>
                        <a href="{{ route('agent.login.show') }}" class="rounded-full border border-white/15 bg-white/5 px-5 py-2 text-neutral-100 hover:bg-white/10">Agent login</a>
                    </div>
                </section>

                @if ($agents->count() === 0)
                    <div class="poa-card p-6 text-sm text-neutral-300">
                        No accredited agents are listed yet. Once the agency approves partners, they will appear here.
                    </div>
                @else
                    <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($agents as $agent)
                            <article class="poa-card flex flex-col p-5 text-sm text-neutral-200">
                                <div class="space-y-1">
                                    <h2 class="poa-hero-heading text-base tracking-[0.08em]">{{ $agent->agency_name ?? $agent->name }}</h2>
                                    @if ($agent->agency_name)
                                        <p class="text-[12px] text-neutral-400">{{ $agent->name }}</p>
                                    @endif
                                </div>
                                <div class="mt-3 text-[12px] text-neutral-400">
                                    @if ($agent->city || $agent->country)
                                        <span>{{ $agent->city }}{{ $agent->city && $agent->country ? ' · ' : '' }}{{ $agent->country }}</span>
                                    @endif
                                </div>
                                @if ($agent->bio)
                                    <p class="mt-3 line-clamp-3 text-[13px] leading-relaxed text-neutral-300">{{ $agent->bio }}</p>
                                @endif
                                <div class="mt-4 flex items-center justify-between text-[11px] text-neutral-400">
                                    <span>Campaigns: {{ $agent->portfolios_count }}</span>
                                    <a href="{{ route('agents.show', $agent) }}" class="text-[rgba(245,230,179,0.9)] hover:text-white">View profile</a>
                                </div>
                            </article>
                        @endforeach
                    </section>

                    <div class="mt-6">
                        {{ $agents->links() }}
                    </div>
                @endif
            </main>
        </div>
    </body>
</html>
