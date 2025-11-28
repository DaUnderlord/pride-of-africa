<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bookings · Pillars &amp; Pride of Africa</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">BOOKINGS OVERVIEW</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Incoming enquiries</h1>
                </div>
                <a href="{{ url('/') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">
                    Back to site
                </a>
            </header>

            <section class="poa-card overflow-hidden">
                <table class="min-w-full text-left text-[12px] text-neutral-200">
                    <thead class="bg-white/5 text-[11px] uppercase tracking-[0.22em] text-neutral-400">
                        <tr>
                            <th class="px-4 py-3">Ref</th>
                            <th class="px-4 py-3">Talent</th>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Project</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="border-t border-white/5">
                                <td class="px-4 py-3 align-top">
                                    <span class="poa-id-font text-[11px] tracking-[0.26em] text-[rgba(245,230,179,0.95)]">
                                        B-{{ str_pad((string) $booking->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    @if ($booking->talent)
                                        <div class="text-[11px] text-neutral-100">{{ $booking->talent->display_name }}</div>
                                        <div class="text-[11px] text-neutral-400">{{ $booking->talent->talent_code }}</div>
                                    @else
                                        <span class="text-neutral-500">Talent removed</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[11px] text-neutral-100">{{ $booking->client_name }}</div>
                                    <div class="text-[11px] text-neutral-400">{{ $booking->company_name ?: '—' }}</div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[11px] text-neutral-100">{{ $booking->project_title ?: 'Untitled project' }}</div>
                                    <div class="line-clamp-2 text-[11px] text-neutral-400">{{ $booking->project_details }}</div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    @php
                                        $status = $booking->status;
                                        $color = [
                                            'pending' => 'border-[rgba(212,175,55,0.8)] text-[rgba(245,230,179,0.95)]',
                                            'reviewed' => 'border-sky-300/70 text-sky-200',
                                            'closed' => 'border-emerald-400/70 text-emerald-200',
                                        ][$status] ?? 'border-neutral-500 text-neutral-300';
                                    @endphp
                                    <span class="inline-flex rounded-full border px-3 py-1 text-[10px] uppercase tracking-[0.24em] {{ $color }}">
                                        {{ strtoupper($status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-400">
                                    {{ $booking->created_at?->format('Y-m-d H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-[12px] text-neutral-400">
                                    No bookings have been submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($bookings instanceof \Illuminate\Contracts\Pagination\Paginator || $bookings instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                    <div class="border-t border-white/5 bg-black/70 px-4 py-3">
                        {{ $bookings->onEachSide(1)->links() }}
                    </div>
                @endif
            </section>
        </div>
    </body>
</html>
