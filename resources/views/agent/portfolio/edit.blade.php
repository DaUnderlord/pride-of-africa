<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Campaign · Accredited Agent · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#000000] text-white">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.14),_transparent_55%),_#000000]">
            <header class="border-b border-white/5 bg-black/80 backdrop-blur">
                <div class="poa-container flex items-center justify-between py-5">
                    <div class="leading-tight">
                        <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENT DASHBOARD</div>
                        <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Edit campaign</div>
                    </div>
                    <a href="{{ route('agent.portfolio.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">Back to portfolio</a>
                </div>
            </header>

            <main class="poa-container py-8">
                <div class="poa-card max-w-3xl p-6 text-sm text-neutral-200">
                    <form action="{{ route('agent.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Campaign / project title</label>
                            <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                            @error('title')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Description (optional)</label>
                            <textarea name="description" rows="5" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">{{ old('description', $portfolio->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Tags</label>
                            <input type="text" name="tags" value="{{ old('tags', $portfolio->tags) }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                            @error('tags')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Add more images</label>
                            <input type="file" name="images[]" multiple class="w-full text-[12px] text-neutral-300" />
                            <p class="mt-1 text-[11px] text-neutral-500">Existing images stay. New uploads will be added to the gallery.</p>
                            @error('images.*')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror

                            @if (!empty($portfolio->images))
                                <div class="mt-3 grid grid-cols-3 gap-2">
                                    @foreach ($portfolio->images as $img)
                                        <div class="overflow-hidden rounded-md border border-white/10 bg-black/40">
                                            <img src="{{ asset('storage/'.$img) }}" alt="{{ $portfolio->title }}" class="h-20 w-full object-cover" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2 text-[11px] uppercase tracking-[0.26em]">
                            <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">Save changes</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
