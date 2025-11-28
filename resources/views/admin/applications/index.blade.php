<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Applications · Pillars &amp; Pride of Africa</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">JOIN US APPLICATIONS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Incoming talent submissions</h1>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Log out</button>
                </form>
            </header>

            <section class="poa-card overflow-hidden">
                <table class="min-w-full text-left text-[12px] text-neutral-200">
                    <thead class="bg-white/5 text-[11px] uppercase tracking-[0.22em] text-neutral-400">
                        <tr>
                            <th class="px-4 py-3">Ref</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Location</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Experience</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $app)
                            <tr class="border-t border-white/5">
                                <td class="px-4 py-3 align-top">
                                    <span class="poa-id-font text-[11px] tracking-[0.26em] text-[rgba(245,230,179,0.95)]">
                                        A-{{ str_pad((string) $app->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[11px] text-neutral-100">{{ $app->full_name }}</div>
                                    <div class="text-[11px] text-neutral-400">{{ $app->email }}</div>
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-300">
                                    {{ $app->city }}{{ $app->city && $app->country ? ' · ' : '' }}{{ $app->country }}
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-300">
                                    {{ $app->primary_category ?: '—' }}
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-300">
                                    @if ($app->has_experience)
                                        <span class="inline-flex rounded-full border border-emerald-400/70 px-3 py-1 text-[10px] uppercase tracking-[0.24em] text-emerald-200">
                                            Has experience
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full border border-neutral-500 px-3 py-1 text-[10px] uppercase tracking-[0.24em] text-neutral-300">
                                            Emerging
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <span class="inline-flex rounded-full border border-[rgba(212,175,55,0.8)] px-3 py-1 text-[10px] uppercase tracking-[0.24em] text-[rgba(245,230,179,0.95)]">
                                        {{ strtoupper($app->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-400">
                                    {{ $app->created_at?->format('Y-m-d H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-[12px] text-neutral-400">
                                    No applications have been submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($applications instanceof \Illuminate\Contracts\Pagination\Paginator || $applications instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                    <div class="border-t border-white/5 bg-black/70 px-4 py-3">
                        {{ $applications->onEachSide(1)->links() }}
                    </div>
                @endif
            </section>
        </div>
    </body>
</html>
