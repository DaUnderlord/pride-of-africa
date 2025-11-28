<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }} · Journal · Pillars &amp; Pride of Afrika</title>
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
                            <div class="poa-id-font text-xs tracking-[0.35em] text-[rgba(245,230,179,0.9)]">JOURNAL ENTRY</div>
                            <div class="mt-1 text-[11px] uppercase tracking-[0.28em] text-neutral-300">{{ optional($post->published_at)->format('M j, Y') }}</div>
                        </div>
                    </div>
                    <a href="{{ route('blog.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back to Journal</a>
                </div>
            </header>

            <main class="poa-container py-10 space-y-8">
                <article class="space-y-6">
                    <header class="space-y-4">
                        <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">{{ $post->title }}</h1>
                        @if ($post->excerpt)
                            <p class="max-w-2xl text-sm leading-relaxed text-neutral-300">{{ $post->excerpt }}</p>
                        @endif
                        @if ($post->cover_image)
                            <div class="poa-card overflow-hidden">
                                <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" class="h-full w-full max-h-[420px] object-cover" />
                            </div>
                        @endif
                    </header>

                    <div class="prose prose-invert max-w-none text-sm leading-relaxed text-neutral-100">
                        {!! nl2br(e($post->body)) !!}
                    </div>
                </article>
            </main>
        </div>
    </body>
</html>
