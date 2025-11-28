<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Testimonial · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8 max-w-2xl">
            <header class="mb-6">
                <a href="{{ route('admin.testimonials.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">← Back to Testimonials</a>
                <h1 class="mt-4 poa-hero-heading text-2xl tracking-[0.1em]">Add Testimonial</h1>
            </header>

            <form method="POST" action="{{ route('admin.testimonials.store') }}" class="poa-card p-6 space-y-5">
                @csrf

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Client Name *</label>
                        <input type="text" name="client_name" value="{{ old('client_name') }}" required class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                        @error('client_name')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Company Name</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Role / Title</label>
                        <input type="text" name="role" value="{{ old('role') }}" placeholder="e.g. Creative Director" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Project Type</label>
                        <input type="text" name="project_type" value="{{ old('project_type') }}" placeholder="e.g. Fashion Campaign" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Testimonial Content *</label>
                    <textarea name="content" rows="4" required class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-3 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">{{ old('content') }}</textarea>
                    @error('content')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Rating *</label>
                        <select name="rating" required class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" @selected(old('rating', 5) == $i)>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Avatar URL</label>
                        <input type="text" name="avatar_url" value="{{ old('avatar_url') }}" placeholder="https://..." class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" />
                    </div>
                </div>

                <div class="flex gap-6 pt-2">
                    <label class="flex items-center gap-2 text-sm text-neutral-300">
                        <input type="checkbox" name="is_published" value="1" @checked(old('is_published')) class="h-4 w-4 rounded border-white/30 bg-black/70" />
                        Published
                    </label>
                    <label class="flex items-center gap-2 text-sm text-neutral-300">
                        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured')) class="h-4 w-4 rounded border-white/30 bg-black/70" />
                        Featured
                    </label>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-3 text-[11px] uppercase tracking-[0.28em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)]">
                        Create Testimonial
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
