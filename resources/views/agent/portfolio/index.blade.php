<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your Portfolio · Accredited Agent · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#000000] text-white">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.14),_transparent_55%),_#000000]">
            <header class="border-b border-white/5 bg-black/80 backdrop-blur">
                <div class="poa-container flex items-center justify-between py-5">
                    <div class="leading-tight">
                        <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENT DASHBOARD</div>
                        <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">{{ $agent->agency_name ?? $agent->name }}</div>
                    </div>
                    <form method="POST" action="{{ route('agent.logout') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                        @csrf
                        <button type="submit" class="hover:text-neutral-100">Logout</button>
                    </form>
                </div>
            </header>

            <main class="poa-container py-8 space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="poa-hero-heading text-lg tracking-[0.12em]">Your campaigns &amp; portfolio</h1>
                    <a href="{{ route('agent.portfolio.create') }}" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-5 py-2 text-[10px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">Add campaign</a>
                </div>

                @if (session('status'))
                    <div class="poa-card border border-emerald-500/40 bg-emerald-500/10 p-3 text-[12px] text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($portfolios->isEmpty())
                    <div class="poa-card p-6 text-sm text-neutral-300">You have not added any campaigns yet. Use “Add campaign” to upload images for your models.</div>
                @else
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($portfolios as $item)
                            <article class="poa-card flex flex-col overflow-hidden text-sm text-neutral-200">
                                @if (!empty($item->images))
                                    <div class="relative aspect-[4/3] overflow-hidden">
                                        <img src="{{ asset('storage/'.($item->images[0] ?? '')) }}" alt="{{ $item->title }}" class="h-full w-full object-cover" />
                                    </div>
                                @endif
                                <div class="flex flex-1 flex-col gap-2 border-t border-white/5 bg-black/60 p-4">
                                    <h2 class="poa-hero-heading text-base tracking-[0.08em]">{{ $item->title }}</h2>
                                    @if ($item->description)
                                        <p class="text-[13px] leading-relaxed text-neutral-300 line-clamp-3">{{ $item->description }}</p>
                                    @endif
                                    <div class="mt-auto flex items-center justify-between text-[11px] text-neutral-400">
                                        <span>{{ optional($item->published_at)->format('M j, Y') }}</span>
                                        <span>{{ $item->tags }}</span>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between text-[11px]">
                                        <a href="{{ route('agent.portfolio.edit', $item) }}" class="text-[rgba(245,230,179,0.95)] hover:text-white">Edit</a>
                                        <form action="{{ route('agent.portfolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this campaign?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </main>
        </div>
    </body>
</html>
