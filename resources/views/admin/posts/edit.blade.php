<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Post · Owner Dashboard · Pillars &amp; Pride of Afrika</title>
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
                            <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Edit journal post</div>
                        </div>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back to posts</a>
                </div>
            </header>

            <main class="poa-container py-8">
                @if (session('status'))
                    <div class="poa-card mb-4 border border-emerald-500/40 bg-emerald-500/10 p-3 text-[12px] text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="poa-card max-w-3xl p-6 text-sm text-neutral-200">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                            @error('title')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Excerpt (optional)</label>
                            <textarea name="excerpt" rows="2" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Body</label>
                            <textarea name="body" rows="10" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required>{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Cover image</label>
                                <input type="file" name="cover_image" class="w-full text-[12px] text-neutral-300" />
                                @error('cover_image')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                                @if ($post->cover_image)
                                    <p class="mt-2 text-[11px] text-neutral-400">Current:</p>
                                    <div class="mt-1 overflow-hidden rounded-md border border-white/10 bg-black/40">
                                        <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" class="h-32 w-full object-cover" />
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-col justify-center gap-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="is_published" id="is_published" value="1" class="h-4 w-4 rounded border-white/20 bg-black/60" {{ old('is_published', $post->is_published) ? 'checked' : '' }} />
                                    <label for="is_published" class="text-[11px] uppercase tracking-[0.26em] text-neutral-300">Published</label>
                                </div>
                                <div class="text-[11px] text-neutral-500">
                                    Slug: /blog/{{ $post->slug }}<br />
                                    Published: {{ optional($post->published_at)->format('M j, Y H:i') ?? '—' }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-3 text-[11px] uppercase tracking-[0.26em]">
                            <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">Save changes</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
