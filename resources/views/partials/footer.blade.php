<footer class="border-t border-white/5 bg-black/80">
    <div class="poa-container py-12">
        <div class="grid gap-8 md:grid-cols-4">
            <!-- Brand -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-3">
                    <div class="h-8">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars & Pride of Africa" class="h-8 w-auto object-contain" />
                    </div>
                </div>
                <p class="mt-3 text-[12px] leading-relaxed text-neutral-400">
                    Africa's premier digital talent directory. Connecting brands with exceptional models, actors, and creatives.
                </p>
                <div class="mt-4 flex gap-3">
                    @if(config('services.social.instagram'))
                        <a href="{{ config('services.social.instagram') }}" target="_blank" rel="noopener" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/10 text-neutral-400 transition hover:border-[rgba(212,175,55,0.6)] hover:text-white" aria-label="Instagram">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    @endif
                    @if(config('services.social.tiktok'))
                        <a href="{{ config('services.social.tiktok') }}" target="_blank" rel="noopener" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/10 text-neutral-400 transition hover:border-[rgba(212,175,55,0.6)] hover:text-white" aria-label="TikTok">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                        </a>
                    @endif
                    @if(config('services.social.twitter'))
                        <a href="{{ config('services.social.twitter') }}" target="_blank" rel="noopener" class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/10 text-neutral-400 transition hover:border-[rgba(212,175,55,0.6)] hover:text-white" aria-label="Twitter/X">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">QUICK LINKS</h3>
                <ul class="mt-4 space-y-2 text-[12px] text-neutral-400">
                    <li><a href="{{ route('talent.index') }}" class="hover:text-white transition">Browse Talent</a></li>
                    <li><a href="{{ route('join.create') }}" class="hover:text-white transition">Join as Model</a></li>
                    <li><a href="{{ route('agents.apply') }}" class="hover:text-white transition">Become an Agent</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-white transition">Journal</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h3 class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">COMPANY</h3>
                <ul class="mt-4 space-y-2 text-[12px] text-neutral-400">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                    <li><a href="{{ route('testimonials') }}" class="hover:text-white transition">Testimonials</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                    <li><a href="{{ route('agents.index') }}" class="hover:text-white transition">Accredited Agents</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">CONTACT US</h3>
                <ul class="mt-4 space-y-2 text-[12px] text-neutral-400">
                    <li>Investment House, 1st Floor</li>
                    <li>CMS Bus Stop, Lagos Island</li>
                    <li>Lagos State, Nigeria</li>
                    <li class="pt-2">
                        <a href="tel:+2347084955556" class="hover:text-white transition">+234 708 495 5556</a>
                    </li>
                    <li>
                        <a href="mailto:info@prideofafrika.com" class="hover:text-white transition">info@prideofafrika.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-4 border-t border-white/5 pt-6 text-[11px] text-neutral-500 md:flex-row md:items-center md:justify-between">
            <div>
                © {{ date('Y') }} Pillars & Pride of Afrika. All rights reserved.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-neutral-300 transition">Privacy Policy</a>
                <a href="#" class="hover:text-neutral-300 transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
