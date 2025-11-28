<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Partner · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8 max-w-2xl">
            <header class="mb-6">
                <a href="{{ route('admin.partners.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">← Back to Partners</a>
                <h1 class="mt-4 poa-hero-heading text-2xl tracking-[0.1em]">Add Partner</h1>
            </header>

            <form method="POST" action="{{ route('admin.partners.store') }}" class="poa-card p-6 space-y-5">
                @csrf

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Partner Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                        @error('name')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Category</label>
                        <select name="category" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">
                            <option value="">Select category</option>
                            <option value="Brand" @selected(old('category') === 'Brand')>Brand</option>
                            <option value="Agency" @selected(old('category') === 'Agency')>Agency</option>
                            <option value="Media" @selected(old('category') === 'Media')>Media</option>
                            <option value="Fashion House" @selected(old('category') === 'Fashion House')>Fashion House</option>
                            <option value="Production" @selected(old('category') === 'Production')>Production Company</option>
                        </select>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Logo URL</label>
                        <input type="text" name="logo_url" value="{{ old('logo_url') }}" placeholder="https://..." class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Website URL</label>
                        <input type="text" name="website_url" value="{{ old('website_url') }}" placeholder="https://..." class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Description</label>
                    <textarea name="description" rows="3" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-3 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-32 rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                </div>

                <div class="flex gap-6 pt-2">
                    <label class="flex items-center gap-2 text-sm text-neutral-300">
                        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', true)) class="h-4 w-4 rounded border-white/30 bg-black/70" />
                        Published
                    </label>
                    <label class="flex items-center gap-2 text-sm text-neutral-300">
                        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured')) class="h-4 w-4 rounded border-white/30 bg-black/70" />
                        Featured
                    </label>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-3 text-[11px] uppercase tracking-[0.28em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)]">
                        Create Partner
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
