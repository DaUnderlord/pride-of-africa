<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Testimonials & Partners · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.18),_transparent_55%),_#000000] text-white">
        <div class="relative min-h-screen">
            @include('partials.header')

            <main class="poa-container py-10 space-y-16">
                <!-- Hero Section -->
                <section class="space-y-4 max-w-3xl" data-reveal>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">TESTIMONIALS & PARTNERS</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">What our clients & partners say about us.</h1>
                    <p class="text-sm leading-relaxed text-neutral-300">
                        We've had the privilege of working with leading brands, agencies, and producers across Africa and beyond.
                        Here's what they have to say about their experience with Pillars & Pride of Afrika.
                    </p>
                </section>

                <!-- Featured Testimonials -->
                @if($featuredTestimonials->count() > 0)
                    <section class="space-y-6" data-reveal>
                        <div class="flex items-center gap-4">
                            <div class="poa-gold-line flex-1"></div>
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">FEATURED TESTIMONIALS</p>
                            <div class="poa-gold-line flex-1"></div>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            @foreach($featuredTestimonials as $testimonial)
                                <article class="poa-card p-6 space-y-4">
                                    <div class="flex items-start gap-4">
                                        @if($testimonial->avatar_url)
                                            <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" class="h-14 w-14 rounded-full object-cover border-2 border-[rgba(212,175,55,0.5)]" />
                                        @else
                                            <div class="h-14 w-14 rounded-full bg-[rgba(212,175,55,0.2)] flex items-center justify-center text-[rgba(245,230,179,0.9)] text-lg font-semibold">
                                                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h3 class="text-sm font-medium text-white">{{ $testimonial->client_name }}</h3>
                                            @if($testimonial->role || $testimonial->company_name)
                                                <p class="text-[12px] text-neutral-400">
                                                    {{ $testimonial->role }}{{ $testimonial->role && $testimonial->company_name ? ' · ' : '' }}{{ $testimonial->company_name }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="flex gap-0.5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="text-[14px] {{ $i <= $testimonial->rating ? 'text-[rgba(212,175,55,0.9)]' : 'text-neutral-600' }}">★</span>
                                            @endfor
                                        </div>
                                    </div>
                                    <blockquote class="text-[13px] leading-relaxed text-neutral-200 italic">
                                        "{{ $testimonial->content }}"
                                    </blockquote>
                                    @if($testimonial->project_type)
                                        <div class="pt-2">
                                            <span class="inline-flex rounded-full border border-[rgba(212,175,55,0.5)] bg-[rgba(212,175,55,0.1)] px-3 py-1 text-[10px] uppercase tracking-[0.24em] text-[rgba(245,230,179,0.9)]">
                                                {{ $testimonial->project_type }}
                                            </span>
                                        </div>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Other Testimonials -->
                @if($otherTestimonials->count() > 0)
                    <section class="space-y-6" data-reveal>
                        <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">MORE TESTIMONIALS</p>

                        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($otherTestimonials as $testimonial)
                                <article class="poa-card p-5 space-y-3">
                                    <div class="flex items-center gap-3">
                                        @if($testimonial->avatar_url)
                                            <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->client_name }}" class="h-10 w-10 rounded-full object-cover" />
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center text-[rgba(245,230,179,0.8)] text-sm font-medium">
                                                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-[13px] font-medium text-white truncate">{{ $testimonial->client_name }}</h3>
                                            @if($testimonial->company_name)
                                                <p class="text-[11px] text-neutral-400 truncate">{{ $testimonial->company_name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <blockquote class="text-[12px] leading-relaxed text-neutral-300 line-clamp-4">
                                        "{{ $testimonial->content }}"
                                    </blockquote>
                                    <div class="flex gap-0.5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="text-[12px] {{ $i <= $testimonial->rating ? 'text-[rgba(212,175,55,0.8)]' : 'text-neutral-700' }}">★</span>
                                        @endfor
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if($featuredTestimonials->count() === 0 && $otherTestimonials->count() === 0)
                    <section class="poa-card p-8 text-center" data-reveal>
                        <p class="text-neutral-400">Testimonials coming soon. We're gathering feedback from our amazing clients and partners.</p>
                    </section>
                @endif

                <!-- Partners Section -->
                <section class="space-y-6" data-reveal>
                    <div class="flex items-center gap-4">
                        <div class="poa-gold-line flex-1"></div>
                        <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">OUR PARTNERS & COLLABORATORS</p>
                        <div class="poa-gold-line flex-1"></div>
                    </div>

                    <p class="text-center text-sm text-neutral-300 max-w-2xl mx-auto">
                        We're proud to collaborate with these incredible brands, agencies, and organizations who trust us with their talent needs.
                    </p>

                    @if($partners->count() > 0)
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                            @foreach($partners as $partner)
                                <a 
                                    href="{{ $partner->website_url ?: '#' }}" 
                                    target="{{ $partner->website_url ? '_blank' : '_self' }}"
                                    rel="noopener noreferrer"
                                    class="poa-card group flex flex-col items-center justify-center p-5 text-center transition hover:border-[rgba(212,175,55,0.5)]"
                                >
                                    @if($partner->logo_url)
                                        <img 
                                            src="{{ $partner->logo_url }}" 
                                            alt="{{ $partner->name }}" 
                                            class="h-12 w-auto object-contain opacity-70 grayscale transition group-hover:opacity-100 group-hover:grayscale-0"
                                        />
                                    @else
                                        <div class="h-12 flex items-center justify-center">
                                            <span class="text-sm font-medium text-neutral-300 group-hover:text-[rgba(245,230,179,0.9)]">{{ $partner->name }}</span>
                                        </div>
                                    @endif
                                    @if($partner->category)
                                        <span class="mt-2 text-[10px] uppercase tracking-[0.2em] text-neutral-500">{{ $partner->category }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="poa-card p-8 text-center">
                            <p class="text-neutral-400">Partner logos and collaborations will be displayed here soon.</p>
                        </div>
                    @endif
                </section>

                <!-- CTA Section -->
                <section class="poa-card p-8 text-center space-y-4" data-reveal>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">WORK WITH US</p>
                    <h2 class="poa-hero-heading text-xl tracking-[0.1em]">Ready to create something amazing?</h2>
                    <p class="text-sm text-neutral-300 max-w-xl mx-auto">
                        Whether you're a brand looking for talent, or an aspiring model ready to join our roster, we'd love to hear from you.
                    </p>
                    <div class="flex flex-wrap justify-center gap-3 pt-2">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[10px] uppercase tracking-[0.28em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)]">
                            Contact Us
                        </a>
                        <a href="{{ route('join.create') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-2 text-[10px] uppercase tracking-[0.26em] text-neutral-100 transition hover:bg-white/10">
                            Join as Talent
                        </a>
                    </div>
                </section>
            </main>

            @include('partials.footer')
            @include('partials.whatsapp-button')
        </div>
    </body>
</html>
