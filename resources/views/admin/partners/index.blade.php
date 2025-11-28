<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Partners · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">PARTNERS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Brand Partners & Collaborators</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.partners.create') }}" class="rounded-full border border-[rgba(212,175,55,0.8)] bg-[rgba(212,175,55,0.15)] px-5 py-2 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">
                        Add Partner
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100 py-2">
                        ← Dashboard
                    </a>
                </div>
            </header>

            @if(session('status'))
                <div class="mb-6 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-[13px] text-emerald-200">
                    {{ session('status') }}
                </div>
            @endif

            <section class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($partners as $partner)
                    <div class="poa-card p-5">
                        <div class="flex items-start gap-4">
                            @if($partner->logo_url)
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="h-12 w-12 object-contain rounded" />
                            @else
                                <div class="h-12 w-12 rounded bg-white/5 flex items-center justify-center text-neutral-500">
                                    <span class="text-lg">{{ strtoupper(substr($partner->name, 0, 1)) }}</span>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-medium text-white truncate">{{ $partner->name }}</h3>
                                @if($partner->category)
                                    <p class="text-[11px] text-neutral-500">{{ $partner->category }}</p>
                                @endif
                                <div class="mt-2 flex flex-wrap gap-1">
                                    @if($partner->is_published)
                                        <span class="inline-flex rounded-full border border-emerald-400/70 px-2 py-0.5 text-[9px] uppercase tracking-[0.2em] text-emerald-200">Published</span>
                                    @else
                                        <span class="inline-flex rounded-full border border-neutral-500 px-2 py-0.5 text-[9px] uppercase tracking-[0.2em] text-neutral-400">Draft</span>
                                    @endif
                                    @if($partner->is_featured)
                                        <span class="inline-flex rounded-full border border-[rgba(212,175,55,0.7)] px-2 py-0.5 text-[9px] uppercase tracking-[0.2em] text-[rgba(245,230,179,0.9)]">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end gap-2 border-t border-white/5 pt-3">
                            <a href="{{ route('admin.partners.edit', $partner) }}" class="text-[11px] text-[rgba(245,230,179,0.9)] hover:text-white">Edit</a>
                            <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" onsubmit="return confirm('Delete this partner?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[11px] text-red-400 hover:text-red-300">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full poa-card p-6 text-center text-[12px] text-neutral-400">
                        No partners yet. <a href="{{ route('admin.partners.create') }}" class="text-[rgba(245,230,179,0.9)]">Add one</a>
                    </div>
                @endforelse
            </section>

            @if ($partners->hasPages())
                <div class="mt-6">
                    {{ $partners->links() }}
                </div>
            @endif
        </div>
    </body>
</html>
