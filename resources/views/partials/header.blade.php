<header class="sticky top-0 z-50 border-b border-white/10 bg-black/80 backdrop-blur">
    <div class="poa-container flex items-center justify-between py-6">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <div class="h-10">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars & Pride of Afrika" class="h-10 w-auto object-contain" />
            </div>
        </a>

        <div class="flex items-center gap-8 text-[11px] uppercase tracking-[0.32em] text-neutral-300">
            <nav class="hidden items-center gap-7 md:flex">
                <a href="{{ route('talent.index') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('talent.*') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Talent</a>
                <a href="{{ route('join.create') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('join.*') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Join Us</a>
                <a href="{{ route('premium') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('premium') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Premium</a>
                <a href="{{ route('testimonials') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('testimonials') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Testimonials</a>
                <a href="{{ route('blog.index') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('blog.*') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Journal</a>
                <a href="{{ route('about') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('about') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="hover:text-white/90 transition-colors {{ request()->routeIs('contact') ? 'text-[rgba(245,230,179,0.9)]' : '' }}">Contact</a>
            </nav>

            <button
                type="button"
                data-theme-toggle
                class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-black/60 text-[rgba(245,230,179,0.95)] shadow-[0_0_0_1px_rgba(255,255,255,0.05)] transition hover:border-[rgba(212,175,55,0.8)] hover:text-white"
                aria-label="Toggle theme"
            >
                <span class="text-xs">◎</span>
            </button>

            <!-- Mobile menu button -->
            <button type="button" class="md:hidden inline-flex h-9 w-9 items-center justify-center" id="mobile-menu-btn" aria-label="Toggle menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile navigation -->
    <nav id="mobile-nav" class="hidden md:hidden border-t border-white/5 bg-black/95 px-6 py-4 space-y-3 text-[11px] uppercase tracking-[0.26em]">
        <a href="{{ route('talent.index') }}" class="block py-2 text-neutral-300 hover:text-white">Talent</a>
        <a href="{{ route('join.create') }}" class="block py-2 text-neutral-300 hover:text-white">Join Us</a>
        <a href="{{ route('premium') }}" class="block py-2 text-neutral-300 hover:text-white">Premium</a>
        <a href="{{ route('testimonials') }}" class="block py-2 text-neutral-300 hover:text-white">Testimonials</a>
        <a href="{{ route('blog.index') }}" class="block py-2 text-neutral-300 hover:text-white">Journal</a>
        <a href="{{ route('about') }}" class="block py-2 text-neutral-300 hover:text-white">About</a>
        <a href="{{ route('contact') }}" class="block py-2 text-neutral-300 hover:text-white">Contact</a>
    </nav>
</header>

<script>
document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
    document.getElementById('mobile-nav')?.classList.toggle('hidden');
});
</script>
