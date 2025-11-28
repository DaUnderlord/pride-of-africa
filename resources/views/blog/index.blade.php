<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Journal · Pillars &amp; Pride of Afrika</title>
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
                            <div class="poa-id-font text-xs tracking-[0.35em] text-[rgba(245,230,179,0.9)]">JOURNAL</div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">Notes from the agency floor</div>
                        </div>
                    </div>
                    <a href="{{ url('/') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back home</a>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <section class="space-y-3">
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">AGENCY JOURNAL</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Campaign notes, casting calls &amp; behind-the-scenes.</h1>
                </section>

                @if ($posts->count() === 0)
                    <div class="poa-card p-6 text-sm text-neutral-300">
                        No journal entries yet. New posts from the agency will appear here.
                    </div>
                @else
                    <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($posts as $post)
                            <article class="poa-card flex flex-col overflow-hidden">
                                @if ($post->cover_image)
                                    <div class="relative aspect-[4/3] overflow-hidden">
                                        <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" class="h-full w-full object-cover" />
                                    </div>
                                @endif
                                <div class="flex flex-1 flex-col gap-3 border-t border-white/5 bg-black/60 p-5 text-sm">
                                    <h2 class="poa-hero-heading text-base tracking-[0.08em]">{{ $post->title }}</h2>
                                    @if ($post->excerpt)
                                        <p class="text-[13px] leading-relaxed text-neutral-300">{{ $post->excerpt }}</p>
                                    @endif
                                    <div class="mt-auto flex items-center justify-between text-[11px] text-neutral-400">
                                        <span>{{ optional($post->published_at)->format('M j, Y') }}</span>
                                        <a href="{{ route('blog.show', $post) }}" class="uppercase tracking-[0.24em] text-[rgba(245,230,179,0.9)] hover:text-white">Read</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                @endif
            </main>
        </div>
    </body>
</html>
