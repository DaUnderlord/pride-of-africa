<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Testimonials · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">TESTIMONIALS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Client Testimonials</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.testimonials.create') }}" class="rounded-full border border-[rgba(212,175,55,0.8)] bg-[rgba(212,175,55,0.15)] px-5 py-2 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">
                        Add Testimonial
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

            <section class="poa-card overflow-hidden">
                <table class="min-w-full text-left text-[12px] text-neutral-200">
                    <thead class="bg-white/5 text-[11px] uppercase tracking-[0.22em] text-neutral-400">
                        <tr>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Company</th>
                            <th class="px-4 py-3">Rating</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $testimonial)
                            <tr class="border-t border-white/5">
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[12px] text-neutral-100">{{ $testimonial->client_name }}</div>
                                    @if($testimonial->role)
                                        <div class="text-[11px] text-neutral-500">{{ $testimonial->role }}</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 align-top text-[12px] text-neutral-300">
                                    {{ $testimonial->company_name ?: '—' }}
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="flex gap-0.5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="text-[12px] {{ $i <= $testimonial->rating ? 'text-[rgba(212,175,55,0.9)]' : 'text-neutral-700' }}">★</span>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="flex flex-wrap gap-1">
                                        @if($testimonial->is_published)
                                            <span class="inline-flex rounded-full border border-emerald-400/70 px-2 py-0.5 text-[10px] uppercase tracking-[0.2em] text-emerald-200">Published</span>
                                        @else
                                            <span class="inline-flex rounded-full border border-neutral-500 px-2 py-0.5 text-[10px] uppercase tracking-[0.2em] text-neutral-400">Draft</span>
                                        @endif
                                        @if($testimonial->is_featured)
                                            <span class="inline-flex rounded-full border border-[rgba(212,175,55,0.7)] px-2 py-0.5 text-[10px] uppercase tracking-[0.2em] text-[rgba(245,230,179,0.9)]">Featured</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-[11px] text-[rgba(245,230,179,0.9)] hover:text-white">Edit</a>
                                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[11px] text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-[12px] text-neutral-400">
                                    No testimonials yet. <a href="{{ route('admin.testimonials.create') }}" class="text-[rgba(245,230,179,0.9)]">Add one</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($testimonials->hasPages())
                    <div class="border-t border-white/5 bg-black/70 px-4 py-3">
                        {{ $testimonials->links() }}
                    </div>
                @endif
            </section>
        </div>
    </body>
</html>
