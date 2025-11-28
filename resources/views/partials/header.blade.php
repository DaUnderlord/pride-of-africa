<header class="sticky top-0 z-50 border-b border-white/10 bg-black/80 backdrop-blur">
    <div class="poa-container flex items-center justify-between py-4 md:py-6">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <div class="h-8 md:h-10">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars & Pride of Afrika" class="h-8 md:h-10 w-auto object-contain" />
            </div>
        </a>

        <div class="flex items-center gap-4 md:gap-8 text-[11px] uppercase tracking-[0.32em] text-neutral-300">
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
                class="hidden md:inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-black/60 text-[rgba(245,230,179,0.95)] shadow-[0_0_0_1px_rgba(255,255,255,0.05)] transition hover:border-[rgba(212,175,55,0.8)] hover:text-white"
                aria-label="Toggle theme"
            >
                <span class="text-xs">◎</span>
            </button>

            <!-- Mobile menu button -->
            <button type="button" class="md:hidden inline-flex h-9 w-9 items-center justify-center" id="mobile-menu-btn" aria-label="Toggle menu">
                <svg class="w-5 h-5 hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-5 h-5 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-opacity duration-300"></div>

<!-- Mobile Sidebar Navigation -->
<nav id="mobile-sidebar" class="fixed top-0 right-0 h-full w-72 bg-black border-l border-[rgba(212,175,55,0.2)] z-[70] transform translate-x-full transition-transform duration-300 ease-out">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-5 border-b border-white/10">
            <span class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(245,230,179,0.9)]">MENU</span>
            <button type="button" id="close-sidebar-btn" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/20 text-neutral-400 hover:text-white hover:border-[rgba(212,175,55,0.5)] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Links -->
        <div class="flex-1 overflow-y-auto py-6 px-5 space-y-1">
            <a href="{{ route('talent.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('talent.*') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Talent
            </a>
            <a href="{{ route('join.create') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('join.*') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Join Us
            </a>
            <a href="{{ route('premium') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('premium') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                Premium
            </a>
            <a href="{{ route('testimonials') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('testimonials') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Testimonials
            </a>
            <a href="{{ route('blog.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('blog.*') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Journal
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('about') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                About
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 py-3 px-4 rounded-xl text-[11px] uppercase tracking-[0.2em] text-neutral-300 hover:text-white hover:bg-white/5 transition-all {{ request()->routeIs('contact') ? 'text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]' : '' }}">
                <svg class="w-4 h-4 text-[rgba(212,175,55,0.7)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Contact
            </a>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-5 border-t border-white/10">
            <div class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-600 text-center">
                PILLARS & PRIDE OF AFRIKA
            </div>
        </div>
    </div>
</nav>

<script>
(function() {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-sidebar-btn');
    const sidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('mobile-overlay');
    const hamburgerIcon = menuBtn?.querySelector('.hamburger-icon');
    const closeIcon = menuBtn?.querySelector('.close-icon');

    function openSidebar() {
        sidebar?.classList.remove('translate-x-full');
        overlay?.classList.remove('opacity-0', 'pointer-events-none');
        overlay?.classList.add('opacity-100', 'pointer-events-auto');
        hamburgerIcon?.classList.add('hidden');
        closeIcon?.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar?.classList.add('translate-x-full');
        overlay?.classList.add('opacity-0', 'pointer-events-none');
        overlay?.classList.remove('opacity-100', 'pointer-events-auto');
        hamburgerIcon?.classList.remove('hidden');
        closeIcon?.classList.add('hidden');
        document.body.style.overflow = '';
    }

    menuBtn?.addEventListener('click', function() {
        if (sidebar?.classList.contains('translate-x-full')) {
            openSidebar();
        } else {
            closeSidebar();
        }
    });

    closeBtn?.addEventListener('click', closeSidebar);
    overlay?.addEventListener('click', closeSidebar);
})();
</script>
