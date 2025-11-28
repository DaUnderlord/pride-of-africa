<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agent · Owner Dashboard · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#000000] text-white">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.14),_transparent_55%),_#000000]">
            <header class="border-b border-white/5 bg-black/80 backdrop-blur">
                <div class="poa-container flex items-center justify-between py-5">
                    <div class="flex items-center gap-3">
                        <div class="h-8">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars &amp; Pride of Afrika" class="h-8 w-auto object-contain" />
                        </div>
                        <div class="leading-tight">
                            <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">OWNER DASHBOARD</div>
                            <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Agent details</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                        @csrf
                        <button type="submit" class="hover:text-neutral-100">Logout</button>
                    </form>
                </div>
            </header>

            <main class="poa-container py-8 space-y-6">
                @if (session('status'))
                    <div class="poa-card border border-emerald-500/40 bg-emerald-500/10 p-3 text-[12px] text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                <section class="grid gap-6 md:grid-cols-[minmax(0,1.3fr)_minmax(0,1fr)] items-start">
                    <div class="poa-card p-6 text-sm text-neutral-200">
                        <h1 class="poa-hero-heading text-xl tracking-[0.1em]">{{ $agent->agency_name ?? $agent->name }}</h1>
                        @if ($agent->agency_name)
                            <p class="mt-1 text-[13px] text-neutral-400">Principal: {{ $agent->name }}</p>
                        @endif
                        <div class="mt-3 text-[13px] text-neutral-300">
                            <p>Email: {{ $agent->email }}</p>
                            @if ($agent->phone)
                                <p>Phone: {{ $agent->phone }}</p>
                            @endif
                            @if ($agent->city || $agent->country)
                                <p>Location: {{ $agent->city }}{{ $agent->city && $agent->country ? ' · ' : '' }}{{ $agent->country }}</p>
                            @endif
                            @if ($agent->website)
                                <p class="mt-1">Website: <a href="{{ $agent->website }}" target="_blank" class="text-[rgba(245,230,179,0.9)] hover:underline">{{ $agent->website }}</a></p>
                            @endif
                            @if ($agent->instagram)
                                <p class="mt-1">Instagram: <span class="text-[rgba(245,230,179,0.9)]">{{ $agent->instagram }}</span></p>
                            @endif
                        </div>
                        @if ($agent->bio)
                            <p class="mt-4 text-[13px] leading-relaxed text-neutral-200">{{ $agent->bio }}</p>
                        @endif
                    </div>

                    <div class="poa-card p-6 text-sm text-neutral-200">
                        <p class="poa-id-font mb-2 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">STATUS &amp; CONTROLS</p>
                        <p class="text-[13px] text-neutral-300">Current status: <strong class="text-[rgba(245,230,179,0.95)]">{{ ucfirst($agent->status) }}</strong></p>
                        <p class="mt-2 text-[12px] text-neutral-400">Use these actions to approve or suspend access. On approval, a temporary password will be generated and shown here for you to share with the agent.</p>

                        <div class="mt-4 flex flex-wrap gap-3 text-[11px] uppercase tracking-[0.26em]">
                            <form method="POST" action="{{ route('admin.agents.approve', $agent) }}">
                                @csrf
                                <button type="submit" class="rounded-full border border-emerald-500/70 bg-emerald-500/15 px-5 py-2 text-emerald-100 hover:bg-emerald-500/25">Approve &amp; generate password</button>
                            </form>
                            <form method="POST" action="{{ route('admin.agents.suspend', $agent) }}">
                                @csrf
                                <button type="submit" class="rounded-full border border-red-500/70 bg-red-500/15 px-5 py-2 text-red-100 hover:bg-red-500/25">Suspend</button>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="space-y-3">
                    <div class="flex items-center justify-between">
                        <h2 class="poa-hero-heading text-lg tracking-[0.1em]">Uploaded campaigns</h2>
                        <p class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">Total: {{ $agent->portfolios->count() }}</p>
                    </div>

                    @if ($agent->portfolios->isEmpty())
                        <div class="poa-card p-6 text-sm text-neutral-300">No campaigns uploaded yet by this agent.</div>
                    @else
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($agent->portfolios as $item)
                                <article class="poa-card flex flex-col overflow-hidden text-sm text-neutral-200">
                                    @if (!empty($item->images))
                                        <div class="relative aspect-[4/3] overflow-hidden">
                                            <img src="{{ asset('storage/'.($item->images[0] ?? '')) }}" alt="{{ $item->title }}" class="h-full w-full object-cover" />
                                        </div>
                                    @endif
                                    <div class="flex flex-1 flex-col gap-2 border-t border-white/5 bg-black/60 p-4">
                                        <h3 class="poa-hero-heading text-base tracking-[0.08em]">{{ $item->title }}</h3>
                                        @if ($item->description)
                                            <p class="text-[13px] leading-relaxed text-neutral-300 line-clamp-3">{{ $item->description }}</p>
                                        @endif
                                        <div class="mt-auto flex items-center justify-between text-[11px] text-neutral-400">
                                            <span>{{ optional($item->published_at)->format('M j, Y') }}</span>
                                            <span>{{ $item->tags }}</span>
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
