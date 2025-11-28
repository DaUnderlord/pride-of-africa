<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts · Owner Dashboard · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#000000] text-white">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.14),_transparent_55%),_#000000]">
            <header class="border-b border-white/5 bg-black/80 backdrop-blur">
                <div class="poa-container py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars &amp; Pride of Afrika" class="h-8 w-auto object-contain" />
                            </div>
                            <div class="leading-tight">
                                <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">OWNER DASHBOARD</div>
                                <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Manage the platform</div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                            @csrf
                            <button type="submit" class="hover:text-neutral-100">Logout</button>
                        </form>
                    </div>

                    <nav class="mt-4 flex flex-wrap items-center gap-4 text-[11px] uppercase tracking-[0.26em] text-neutral-400">
                        @php
                            $adminNavClasses = function (string $route) {
                                return request()->routeIs($route)
                                    ? 'text-[rgba(245,230,179,0.96)] border-[rgba(245,230,179,0.9)] bg-[rgba(212,175,55,0.16)]'
                                    : 'border-white/15 hover:border-[rgba(212,175,55,0.6)] hover:text-neutral-100';
                            };
                        @endphp
                        <a
                            href="{{ route('admin.bookings.index') }}"
                            class="rounded-full border px-4 py-1 {{ $adminNavClasses('admin.bookings.index') }}"
                        >
                            Bookings
                        </a>
                        <a
                            href="{{ route('admin.applications.index') }}"
                            class="rounded-full border px-4 py-1 {{ $adminNavClasses('admin.applications.index') }}"
                        >
                            Applications
                        </a>
                        <a
                            href="{{ route('admin.posts.index') }}"
                            class="rounded-full border px-4 py-1 {{ $adminNavClasses('admin.posts.index') }}"
                        >
                            Posts / Journal
                        </a>
                        <a
                            href="{{ route('admin.agents.index') }}"
                            class="rounded-full border px-4 py-1 {{ $adminNavClasses('admin.agents.index') }}"
                        >
                            Agents
                        </a>
                    </nav>
                </div>
            </header>

            <main class="poa-container py-8 space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="poa-hero-heading text-lg tracking-[0.12em]">Journal posts</h1>
                    <a href="{{ route('admin.posts.create') }}" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-5 py-2 text-[10px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">New post</a>
                </div>

                @if (session('status'))
                    <div class="poa-card border border-emerald-500/40 bg-emerald-500/10 p-3 text-[12px] text-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="poa-card overflow-hidden">
                    <table class="min-w-full text-left text-[13px] text-neutral-200">
                        <thead class="bg-white/5 text-[11px] uppercase tracking-[0.22em] text-neutral-400">
                            <tr>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Published</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="border-t border-white/5">
                                    <td class="px-4 py-3 align-middle">
                                        <div class="font-medium text-neutral-50">{{ $post->title }}</div>
                                        <div class="text-[11px] text-neutral-500">/{{ $post->slug }}</div>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        @if ($post->is_published)
                                            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-3 py-1 text-[10px] font-medium uppercase tracking-[0.22em] text-emerald-300">Published</span>
                                        @else
                                            <span class="inline-flex items-center rounded-full bg-neutral-600/20 px-3 py-1 text-[10px] font-medium uppercase tracking-[0.22em] text-neutral-300">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 align-middle text-[12px] text-neutral-400">
                                        {{ optional($post->published_at)->format('M j, Y') ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 align-middle text-right text-[12px]">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-[rgba(245,230,179,0.95)] hover:text-white">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block ml-3" onsubmit="return confirm('Delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center text-[13px] text-neutral-400">No posts yet. Create your first journal entry.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div>
                    {{ $posts->links() }}
                </div>
            </main>
        </div>
    </body>
</html>
