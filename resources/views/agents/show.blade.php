<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $agent->agency_name ?? $agent->name }} · Accredited Agent · Pillars &amp; Pride of Afrika</title>
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
                            <div class="poa-id-font text-xs tracking-[0.35em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENT</div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">Model / talent manager</div>
                        </div>
                    </div>
                    <a href="{{ route('agents.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back to directory</a>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <section class="grid gap-8 md:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] items-start">
                    <div class="poa-card p-6 text-sm text-neutral-200">
                        <h1 class="poa-hero-heading text-xl tracking-[0.1em]">{{ $agent->agency_name ?? $agent->name }}</h1>
                        @if ($agent->agency_name)
                            <p class="mt-1 text-[13px] text-neutral-400">Principal: {{ $agent->name }}</p>
                        @endif
                        <div class="mt-3 text-[13px] text-neutral-300">
                            @if ($agent->city || $agent->country)
                                <p>{{ $agent->city }}{{ $agent->city && $agent->country ? ' · ' : '' }}{{ $agent->country }}</p>
                            @endif
                            @if ($agent->website)
                                <p class="mt-1"><a href="{{ $agent->website }}" target="_blank" class="text-[rgba(245,230,179,0.9)] hover:underline">{{ $agent->website }}</a></p>
                            @endif
                            @if ($agent->instagram)
                                <p class="mt-1">Instagram: <span class="text-[rgba(245,230,179,0.9)]">{{ $agent->instagram }}</span></p>
                            @endif
                        </div>
                        @if ($agent->bio)
                            <p class="mt-4 text-[13px] leading-relaxed text-neutral-200">{{ $agent->bio }}</p>
                        @endif
                        <div class="mt-4 flex flex-wrap gap-3 text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                            <span>Campaigns listed: {{ $portfolios->count() }}</span>
                        </div>
                    </div>

                    <div class="poa-card p-6 text-[12px] text-neutral-300">
                        <p class="poa-id-font mb-2 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">WORKING WITH ACCREDITED AGENTS</p>
                        <p>
                            Brands, producers and casting teams can use this directory to discover agents who manage vetted talent across
                            Africa and its diaspora. When you book through this platform, briefs and negotiations are routed through
                            accredited managers, ensuring their rosters are protected and properly represented.
                        </p>
                    </div>
                </section>

                <section class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="poa-hero-heading text-lg tracking-[0.1em]">Campaigns &amp; portfolio</h2>
                        <p class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">Visuals uploaded on behalf of their models</p>
                    </div>

                    @if ($portfolios->isEmpty())
                        <div class="poa-card p-6 text-sm text-neutral-300">No campaigns have been uploaded yet for this agent.</div>
                    @else
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($portfolios as $item)
                                <article class="poa-card flex flex-col overflow-hidden">
                                    @if (!empty($item->images))
                                        <div class="relative aspect-[4/3] overflow-hidden">
                                            <img src="{{ asset('storage/'.($item->images[0] ?? '')) }}" alt="{{ $item->title }}" class="h-full w-full object-cover" />
                                        </div>
                                    @endif
                                    <div class="flex flex-1 flex-col gap-2 border-t border-white/5 bg-black/60 p-5 text-sm">
                                        <h3 class="poa-hero-heading text-base tracking-[0.08em]">{{ $item->title }}</h3>
                                        @if ($item->description)
                                            <p class="text-[13px] leading-relaxed text-neutral-300 line-clamp-3">{{ $item->description }}</p>
                                        @endif
                                        <div class="mt-auto flex items-center justify-between text-[11px] text-neutral-400">
                                            <span>{{ optional($item->published_at)->format('M j, Y') }}</span>
                                            @if ($item->tags)
                                                <span>{{ $item->tags }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </section>
            </main>
        </div>
    </body>
</html>
