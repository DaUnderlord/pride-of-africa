<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pillars &amp; Pride of Afrika · African Talent Directory</title>
        <meta name="description" content="The editorial stage for Africa's most compelling talent. Discover models, actors, photographers and creatives from across the continent.">

        @include('partials.favicon')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap"
            rel="stylesheet"
        />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white overflow-x-hidden">
        <!-- ============================================
             SPLASH SCREEN
             ============================================ -->
        <div id="splash-screen" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black">
            <div class="text-center">
                <!-- Animated Logo/Icon -->
                <div class="relative mb-8">
                    <!-- Outer ring -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="h-32 w-32 rounded-full border border-[rgba(212,175,55,0.3)] animate-[spin_8s_linear_infinite]"></div>
                    </div>
                    <!-- Middle ring -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="h-24 w-24 rounded-full border border-[rgba(212,175,55,0.5)] animate-[spin_6s_linear_infinite_reverse]"></div>
                    </div>
                    <!-- Inner glow -->
                    <div class="relative flex h-32 w-32 items-center justify-center">
                        <div class="h-16 w-16 rounded-full bg-[rgba(212,175,55,0.15)] animate-pulse"></div>
                        <!-- Logo text -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="poa-hero-heading text-3xl text-[rgba(212,175,55,0.95)] poa-glow">P</span>
                        </div>
                    </div>
                </div>

                <!-- Brand Name -->
                <div class="space-y-2 splash-text opacity-0">
                    <h1 class="poa-hero-heading text-2xl md:text-3xl tracking-[0.1em] text-white">
                        PILLARS & PRIDE
                    </h1>
                    <p class="poa-id-font text-[10px] tracking-[0.5em] text-[rgba(212,175,55,0.8)]">
                        OF AFRIKA
                    </p>
                </div>

                <!-- Loading bar -->
                <div class="mt-10 mx-auto w-48 h-px bg-white/10 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-[rgba(212,175,55,0.5)] to-[rgba(212,175,55,0.9)] splash-loader"></div>
                </div>

                <!-- Tagline -->
                <p class="mt-6 poa-id-font text-[9px] tracking-[0.4em] text-neutral-600 splash-tagline opacity-0">
                    THE EDITORIAL STAGE
                </p>
            </div>
        </div>

        <style>
            .splash-loader {
                width: 0%;
                animation: splashLoad 2s ease-out forwards;
            }
            .splash-text {
                animation: fadeInUp 0.8s ease-out 0.3s forwards;
            }
            .splash-tagline {
                animation: fadeInUp 0.8s ease-out 0.6s forwards;
            }
            @keyframes splashLoad {
                0% { width: 0%; }
                100% { width: 100%; }
            }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            #splash-screen.fade-out {
                opacity: 0;
                transition: opacity 0.6s ease-out;
                pointer-events: none;
            }
        </style>

        <script>
            // Hide splash screen after animations complete
            window.addEventListener('load', function() {
                setTimeout(function() {
                    const splash = document.getElementById('splash-screen');
                    if (splash) {
                        splash.classList.add('fade-out');
                        setTimeout(function() {
                            splash.style.display = 'none';
                        }, 600);
                    }
                }, 2200); // Wait for loading animation + buffer
            });
        </script>

        <!-- Grain Texture Overlay -->
        <div class="poa-grain" aria-hidden="true"></div>

        <div class="relative min-h-screen">
            <!-- Dynamic Background -->
            <div class="pointer-events-none fixed inset-0" aria-hidden="true">
                <!-- Main gradient -->
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,_rgba(212,175,55,0.15),_transparent_50%)]"></div>
                <!-- Secondary ambient -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,_rgba(212,175,55,0.08),_transparent_40%)]"></div>
            </div>

            <!-- Floating gold lines -->
            <div class="pointer-events-none fixed inset-0 opacity-30" aria-hidden="true">
                <div class="absolute left-[15%] top-0 h-full w-px bg-gradient-to-b from-transparent via-[rgba(212,175,55,0.5)] to-transparent"></div>
                <div class="absolute left-[85%] top-0 h-full w-px bg-gradient-to-b from-transparent via-[rgba(212,175,55,0.3)] to-transparent"></div>
            </div>

            <!-- Floating particles -->
            <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
                <div class="poa-particle poa-float" style="left: 10%; top: 20%;"></div>
                <div class="poa-particle poa-float poa-float-delay-1" style="left: 80%; top: 30%;"></div>
                <div class="poa-particle poa-float poa-float-delay-2" style="left: 60%; top: 70%;"></div>
                <div class="poa-particle poa-float" style="left: 25%; top: 60%;"></div>
                <div class="poa-particle poa-float poa-float-delay-1" style="left: 90%; top: 80%;"></div>
            </div>

            <!-- Header -->
            @include('partials.header')

            <main class="relative z-10">
                <!-- ============================================
                     HERO SECTION - Editorial Magazine Style
                     ============================================ -->
                <section class="relative min-h-[100svh] flex items-center justify-center overflow-hidden pt-0" id="hero">
                    <!-- Hero Background Image Carousel -->
                    <div class="absolute inset-0" id="heroCarousel">
                        <!-- Slide 1 -->
                        <div class="hero-slide absolute inset-0 opacity-100 transition-opacity duration-1000">
                            <div class="absolute inset-0 flex items-center justify-center" data-parallax="0.1">
                                <div class="relative w-full max-w-5xl px-8 md:px-4">
                                    <div class="grid grid-cols-3 gap-2 md:gap-6 opacity-55 md:opacity-60 scale-110 md:scale-100">
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform -translate-y-8">
                                            <img src="https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="eager" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform translate-y-4">
                                            <img src="https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="" class="h-full w-full object-cover" loading="eager" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform -translate-y-4">
                                            <img src="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="eager" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="relative w-full max-w-5xl px-8 md:px-4">
                                    <div class="grid grid-cols-3 gap-2 md:gap-6 opacity-55 md:opacity-60 scale-110 md:scale-100">
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform translate-y-4">
                                            <img src="https://images.pexels.com/photos/2681751/pexels-photo-2681751.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform -translate-y-8">
                                            <img src="https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform translate-y-8">
                                            <img src="https://images.pexels.com/photos/3622614/pexels-photo-3622614.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="relative w-full max-w-5xl px-8 md:px-4">
                                    <div class="grid grid-cols-3 gap-2 md:gap-6 opacity-55 md:opacity-60 scale-110 md:scale-100">
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform -translate-y-6">
                                            <img src="https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform translate-y-6">
                                            <img src="https://images.pexels.com/photos/2887718/pexels-photo-2887718.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                        <div class="aspect-[3/4] rounded-2xl overflow-hidden transform -translate-y-2">
                                            <img src="https://images.pexels.com/photos/3756616/pexels-photo-3756616.jpeg?auto=compress&cs=tinysrgb&w=800" alt="" class="h-full w-full object-cover" loading="lazy" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide indicators -->
                    <div class="absolute bottom-24 md:bottom-28 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                        <button class="slide-dot w-8 h-1 rounded-full bg-white/30 transition-all duration-300 active" data-slide="0"></button>
                        <button class="slide-dot w-8 h-1 rounded-full bg-white/30 transition-all duration-300" data-slide="1"></button>
                        <button class="slide-dot w-8 h-1 rounded-full bg-white/30 transition-all duration-300" data-slide="2"></button>
                    </div>

                    <!-- Subtle animated particles -->
                    <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-60" aria-hidden="true">
                        <div class="absolute top-[20%] left-[15%] w-1 h-1 rounded-full bg-[rgba(212,175,55,0.5)] poa-float"></div>
                        <div class="absolute top-[40%] right-[20%] w-1.5 h-1.5 rounded-full bg-[rgba(212,175,55,0.4)] poa-float poa-float-delay-1"></div>
                        <div class="absolute bottom-[30%] left-[25%] w-1 h-1 rounded-full bg-[rgba(212,175,55,0.6)] poa-float poa-float-delay-2"></div>
                        <div class="absolute top-[60%] right-[10%] w-2 h-2 rounded-full bg-[rgba(212,175,55,0.3)] poa-float"></div>
                    </div>

                    <!-- Overlay gradient -->
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black pointer-events-none"></div>

                    <!-- Hero Content -->
                    <div class="relative z-10 poa-container-wide text-center px-4 pt-0 md:pt-10 pb-24 md:pb-32">
                        <!-- Top Label -->
                        <div class="mb-5 md:mb-10">
                            <span class="poa-id-font inline-block text-[8px] md:text-[10px] tracking-[0.4em] md:tracking-[0.5em] text-[rgba(245,230,179,0.75)] border border-[rgba(212,175,55,0.25)] px-4 md:px-5 py-2 md:py-2.5 rounded-full backdrop-blur-sm" data-scramble>
                                CURATED AFRICAN EXCELLENCE
                            </span>
                        </div>

                        <!-- Main Headline -->
                        <h1 class="poa-hero-title mb-6 md:mb-8" style="font-size: clamp(2.8rem, 12vw, 8rem); line-height: 0.9;">
                            <span class="poa-hero-title-line block">
                                <span class="poa-hero-title-word text-white">THE</span>
                            </span>
                            <span class="poa-hero-title-line block">
                                <span class="poa-hero-title-word poa-glow text-[rgba(212,175,55,0.95)]">EDITORIAL</span>
                            </span>
                            <span class="poa-hero-title-line block">
                                <span class="poa-hero-title-word text-white">STAGE</span>
                            </span>
                        </h1>

                        <!-- Decorative line -->
                        <div class="flex items-center justify-center gap-4 mb-6 md:mb-8">
                            <div class="h-px w-12 md:w-20 bg-gradient-to-r from-transparent to-[rgba(212,175,55,0.5)]"></div>
                            <div class="h-1.5 w-1.5 rotate-45 border border-[rgba(212,175,55,0.5)]"></div>
                            <div class="h-px w-12 md:w-20 bg-gradient-to-l from-transparent to-[rgba(212,175,55,0.5)]"></div>
                        </div>

                        <!-- Subheadline -->
                        <p class="poa-hero-heading text-sm md:text-lg lg:text-xl tracking-[0.1em] text-neutral-300 mb-8 md:mb-10 max-w-2xl mx-auto font-light">
                            For Africa's Most Compelling Talent
                        </p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 md:gap-4">
                            <a
                                href="{{ route('talent.index') }}"
                                class="poa-magnetic poa-btn-shine inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 md:px-8 py-3 md:py-3.5 text-[10px] md:text-[11px] font-medium uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] shadow-[0_20px_50px_rgba(212,175,55,0.15)] transition-all duration-300 hover:bg-[rgba(212,175,55,0.3)] hover:shadow-[0_25px_60px_rgba(212,175,55,0.25)] hover:scale-105"
                            >
                                <span class="mr-2">Browse Talent</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>

                            <a
                                href="{{ route('join.create') }}"
                                class="poa-magnetic inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-6 md:px-8 py-3 md:py-3.5 text-[10px] md:text-[11px] uppercase tracking-[0.28em] text-neutral-300 backdrop-blur transition-all duration-300 hover:border-[rgba(212,175,55,0.5)] hover:bg-white/10"
                            >
                                <span>Join as Talent</span>
                            </a>
                        </div>
                    </div>

                    <!-- Scroll indicator - positioned separately -->
                    <div class="absolute bottom-6 md:bottom-10 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-1.5">
                        <div class="w-5 h-8 rounded-full border border-white/20 flex items-start justify-center p-1">
                            <div class="w-1 h-2 rounded-full bg-[rgba(212,175,55,0.6)] animate-bounce"></div>
                        </div>
                    </div>

                    <!-- Side decorative elements -->
                    <div class="hidden lg:block absolute left-8 top-1/2 -translate-y-1/2 space-y-4">
                        <div class="w-px h-20 bg-gradient-to-b from-transparent via-[rgba(212,175,55,0.5)] to-transparent mx-auto"></div>
                        <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-600 rotate-[-90deg] origin-center whitespace-nowrap">ISSUE 001 — NOV 2025</div>
                    </div>

                    <div class="hidden lg:block absolute right-8 top-1/2 -translate-y-1/2 space-y-4">
                        <div class="w-px h-20 bg-gradient-to-b from-transparent via-[rgba(212,175,55,0.5)] to-transparent mx-auto"></div>
                        <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-600 rotate-90 origin-center whitespace-nowrap">LAGOS · NAIROBI · ACCRA</div>
                    </div>
                </section>

                <!-- ============================================
                     MARQUEE STRIP
                     ============================================ -->
                <section class="poa-marquee border-y border-white/5 bg-black/50 py-4">
                    <div class="poa-marquee-content poa-id-font text-[11px] tracking-[0.4em] text-neutral-500">
                        <span>LAGOS</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>NAIROBI</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>ACCRA</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>JOHANNESBURG</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>CAPE TOWN</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>KIGALI</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>ADDIS ABABA</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>DAKAR</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <!-- Duplicate for seamless loop -->
                        <span>LAGOS</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>NAIROBI</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>ACCRA</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>JOHANNESBURG</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>CAPE TOWN</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>KIGALI</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>ADDIS ABABA</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                        <span>DAKAR</span>
                        <span class="text-[rgba(212,175,55,0.6)]">◆</span>
                    </div>
                </section>

                <!-- ============================================
                     STATS SECTION
                     ============================================ -->
                <section class="py-20 md:py-28 poa-reveal">
                    <div class="poa-container">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4">
                            <div class="text-center poa-reveal poa-reveal-delay-1">
                                <div class="poa-stat-number" data-counter="500" data-suffix="+">0+</div>
                                <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-500 mt-2">TALENT PROFILES</div>
                            </div>
                            <div class="text-center poa-reveal poa-reveal-delay-2">
                                <div class="poa-stat-number" data-counter="12" data-suffix="">0</div>
                                <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-500 mt-2">AFRICAN COUNTRIES</div>
                            </div>
                            <div class="text-center poa-reveal poa-reveal-delay-3">
                                <div class="poa-stat-number" data-counter="200" data-suffix="+">0+</div>
                                <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-500 mt-2">BRAND PARTNERS</div>
                            </div>
                            <div class="text-center poa-reveal poa-reveal-delay-4">
                                <div class="poa-stat-number" data-counter="50" data-suffix="+">0+</div>
                                <div class="poa-id-font text-[10px] tracking-[0.3em] text-neutral-500 mt-2">AGENCIES</div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================
                     TALENT DIRECTORY PREVIEW
                     ============================================ -->
                <section id="talent" class="poa-container pb-24 poa-reveal">
                    <div class="poa-gold-line mb-8"></div>
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                        <div>
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                CURATED DIRECTORY
                            </p>
                            <h2 class="poa-hero-heading mt-3 text-3xl md:text-4xl tracking-[0.06em]">Featured Talent</h2>
                        </div>
                        <a href="{{ route('talent.index') }}" class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.8)] hover:text-white transition-colors">
                            View Full Directory
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 poa-stagger">
                        @foreach ([
                            [
                                'id' => 'T-0389',
                                'category' => 'Commercial / Lifestyle',
                                'location' => 'Accra — Ghana',
                                'tag' => 'Multi-market ready',
                                'image' => 'https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                            [
                                'id' => 'T-0521',
                                'category' => 'Film / TV Actor',
                                'location' => 'Nairobi — Kenya',
                                'tag' => 'Fluent EN / FR',
                                'image' => 'https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                            [
                                'id' => 'T-0194',
                                'category' => 'Runway / Editorial',
                                'location' => 'Cape Town — SA',
                                'tag' => 'Paris / Milan ready',
                                'image' => 'https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                            [
                                'id' => 'T-0677',
                                'category' => 'Beauty / Hair',
                                'location' => 'Lagos — Nigeria',
                                'tag' => 'Beauty close-up safe',
                                'image' => 'https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                            [
                                'id' => 'T-0240',
                                'category' => 'Kids / Family',
                                'location' => 'Kigali — Rwanda',
                                'tag' => 'Parent vetted',
                                'image' => 'https://images.pexels.com/photos/3621234/pexels-photo-3621234.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                            [
                                'id' => 'T-0832',
                                'category' => 'Plus-size / Curve',
                                'location' => 'Abuja — Nigeria',
                                'tag' => 'Body positive',
                                'image' => 'https://images.pexels.com/photos/2681751/pexels-photo-2681751.jpeg?auto=compress&cs=tinysrgb&w=800',
                            ],
                        ] as $index => $preview)
                            <article class="poa-card poa-tilt group flex flex-col overflow-hidden transition-all duration-500 hover:shadow-[0_30px_60px_rgba(212,175,55,0.1)] hover:border-[rgba(212,175,55,0.3)]">
                                <div class="relative aspect-[4/5] overflow-hidden">
                                    <img 
                                        src="{{ $preview['image'] }}" 
                                        alt="Talent {{ $preview['id'] }}"
                                        class="absolute inset-0 h-full w-full object-cover opacity-70 transition-all duration-700 group-hover:scale-105 group-hover:opacity-90"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>
                                    
                                    <!-- Verified Badge -->
                                    <div class="absolute top-4 right-4">
                                        <div class="flex items-center gap-1.5 rounded-full border border-[rgba(212,175,55,0.5)] bg-black/60 px-2.5 py-1 backdrop-blur-sm">
                                            <div class="h-1.5 w-1.5 rounded-full bg-[rgba(212,175,55,0.9)] animate-pulse"></div>
                                            <span class="text-[9px] uppercase tracking-[0.2em] text-[rgba(245,230,179,0.9)]">Verified</span>
                                        </div>
                                    </div>

                                    <!-- Info Overlay -->
                                    <div class="absolute inset-x-0 bottom-0 p-5">
                                        <div class="space-y-2">
                                            <div class="poa-id-font text-[11px] tracking-[0.26em] text-[rgba(245,230,179,0.95)]">
                                                {{ $preview['id'] }}
                                            </div>
                                            <div class="text-sm text-white font-medium">
                                                {{ $preview['category'] }}
                                            </div>
                                            <div class="flex items-center gap-2 text-[11px] text-neutral-300">
                                                <svg class="w-3 h-3 text-[rgba(212,175,55,0.7)]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                                {{ $preview['location'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-1 items-center justify-between gap-4 border-t border-white/5 bg-black/60 px-5 py-4 backdrop-blur-sm">
                                    <div class="text-[11px] text-neutral-400">
                                        <span class="text-[rgba(212,175,55,0.7)]">●</span>
                                        <span class="ml-2">{{ $preview['tag'] }}</span>
                                    </div>
                                    <a
                                        href="{{ route('talent.index') }}"
                                        class="poa-btn-shine rounded-full border border-white/10 bg-white/5 px-4 py-2 text-[10px] uppercase tracking-[0.24em] text-neutral-200 transition-all duration-300 group-hover:border-[rgba(212,175,55,0.6)] group-hover:bg-[rgba(212,175,55,0.1)] group-hover:text-white"
                                    >
                                        View
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <!-- ============================================
                     AGENTS / MANAGERS SECTION
                     ============================================ -->
                <section id="managers" class="poa-container pb-20 poa-reveal">
                    <div class="relative overflow-hidden rounded-3xl border border-[rgba(212,175,55,0.15)] bg-gradient-to-br from-[rgba(212,175,55,0.05)] to-transparent p-8 md:p-12">
                        <!-- Decorative corner -->
                        <div class="absolute -right-20 -top-20 h-40 w-40 rounded-full border border-[rgba(212,175,55,0.2)] opacity-50"></div>
                        <div class="absolute -left-10 -bottom-10 h-24 w-24 border border-[rgba(212,175,55,0.15)] rotate-45"></div>

                        <div class="relative flex flex-col gap-10 md:flex-row md:items-center md:justify-between">
                            <div class="max-w-xl space-y-4">
                                <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">
                                    FOR AGENTS, SCOUTS &amp; PRODUCERS
                                </p>
                                <h2 class="poa-hero-heading text-2xl md:text-3xl tracking-[0.08em] text-white">
                                    A vetted, privacy-first pipeline of African talent.
                                </h2>
                                <p class="text-sm leading-relaxed text-neutral-300">
                                    Browse anonymised portfolios, shortlist with confidence, and route final selections through
                                    accredited agency partners. No cold-dm chaos, just structured talent discovery.
                                </p>
                            </div>

                            <div class="flex flex-col gap-3">
                                <a
                                    href="{{ route('agents.apply') }}"
                                    class="poa-magnetic poa-btn-shine inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-4 text-[10px] font-medium uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] transition-all duration-300 hover:bg-[rgba(212,175,55,0.28)] hover:shadow-[0_15px_40px_rgba(212,175,55,0.2)]"
                                >
                                    Request Agent Access
                                </a>
                                <a
                                    href="{{ route('agent.login.show') }}"
                                    class="poa-magnetic inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-8 py-4 text-[10px] uppercase tracking-[0.26em] text-neutral-200 transition-all duration-300 hover:border-[rgba(212,175,55,0.5)] hover:bg-white/10"
                                >
                                    Login as Agent
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================
                     JOIN US / BRANDS SECTION
                     ============================================ -->
                <section id="join" class="poa-container pb-16 poa-reveal">
                    <div class="poa-gold-line mb-8"></div>
                    <div class="grid gap-6 lg:grid-cols-2">
                        <!-- For Talent -->
                        <div class="poa-card p-5 md:p-6 space-y-4 transition-all duration-500 hover:border-[rgba(212,175,55,0.3)]">
                            <div class="flex items-center gap-2">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full border border-[rgba(212,175,55,0.4)] bg-[rgba(212,175,55,0.1)]">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <p class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(245,230,179,0.85)]">
                                    FOR TALENT
                                </p>
                            </div>
                            <h2 class="poa-hero-heading text-xl md:text-2xl tracking-[0.06em]">Join the Pillars &amp; Pride roster.</h2>
                            <p class="text-xs leading-relaxed text-neutral-300">
                                We work with emerging and established talent across the continent. Your face is protected
                                by design; your work speaks for itself.
                            </p>
                            <ul class="space-y-2 text-xs text-neutral-300">
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Portfolio-first submissions with identity-safe previews.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Human curation and admin vetting for every profile.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Priority routing of briefs from brands and agencies.
                                </li>
                            </ul>
                            <a
                                href="{{ route('join.create') }}"
                                class="poa-magnetic poa-btn-shine inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-3 text-[9px] uppercase tracking-[0.28em] text-[rgba(245,230,179,0.98)] transition-all duration-300 hover:bg-[rgba(212,175,55,0.28)]"
                            >
                                Apply Now
                            </a>
                        </div>

                        <!-- For Brands -->
                        <div class="poa-card p-5 md:p-6 space-y-4 transition-all duration-500 hover:border-[rgba(212,175,55,0.3)]">
                            <div class="flex items-center gap-2">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full border border-[rgba(212,175,55,0.4)] bg-[rgba(212,175,55,0.1)]">
                                    <svg class="w-4 h-4 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <p class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(245,230,179,0.85)]">
                                    FOR BRANDS &amp; PRODUCERS
                                </p>
                            </div>
                            <h3 class="poa-hero-heading text-xl md:text-2xl tracking-[0.06em]">Brief us once. We handle the roster.</h3>
                            <p class="text-xs leading-relaxed text-neutral-300">
                                Share your campaign, budget and timelines and we surface a shortlist of vetted talent from
                                across Africa and its diaspora.
                            </p>
                            <ul class="space-y-2 text-xs text-neutral-300">
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Single intake for global and regional campaigns.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Usage and exclusivity handled by accredited partners.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1 h-1 w-1 rounded-full bg-[rgba(212,175,55,0.7)] shrink-0"></span>
                                    Clear, documented communication between all parties.
                                </li>
                            </ul>
                            <a
                                href="{{ route('contact') }}"
                                class="poa-magnetic inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-3 text-[9px] uppercase tracking-[0.26em] text-neutral-200 transition-all duration-300 hover:border-[rgba(212,175,55,0.5)] hover:bg-white/10"
                            >
                                Share a Brief
                            </a>
                        </div>
                    </div>
                </section>

                <!-- ============================================
                     TESTIMONIALS PREVIEW
                     ============================================ -->
                <section class="poa-container pb-24 poa-reveal">
                    <div class="text-center mb-8 md:mb-12">
                        <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">TESTIMONIALS</p>
                        <h2 class="poa-hero-heading mt-3 text-2xl md:text-4xl tracking-[0.06em]">Trusted by Industry Leaders</h2>
                    </div>
                    <!-- Mobile: Horizontal Carousel -->
                    <div class="md:hidden overflow-x-auto pb-4 -mx-4 px-4 snap-x snap-mandatory scrollbar-hide" id="testimonialCarousel">
                        <div class="flex gap-4" style="width: max-content;">
                            @foreach([
                                ['name' => 'Amara Obi', 'role' => 'Creative Director', 'company' => 'Vogue Africa', 'quote' => 'The quality of talent and professionalism is unmatched. Our go-to platform for editorial casting.'],
                                ['name' => 'Kwame Asante', 'role' => 'Producer', 'company' => 'Afrobeats Studios', 'quote' => 'Finally, a platform that understands African talent. The privacy-first approach is exactly what we needed.'],
                                ['name' => 'Zara Mensah', 'role' => 'Brand Manager', 'company' => 'Nike Africa', 'quote' => 'Streamlined our casting process entirely. The curated roster saves us weeks of scouting.'],
                            ] as $testimonial)
                            <div class="poa-card p-5 space-y-3 snap-center flex-shrink-0" style="width: 280px;">
                                <div class="flex gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 text-[rgba(212,175,55,0.8)]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-[13px] text-neutral-300 leading-relaxed italic">"{{ $testimonial['quote'] }}"</p>
                                <div class="pt-2 border-t border-white/5">
                                    <div class="text-sm text-white font-medium">{{ $testimonial['name'] }}</div>
                                    <div class="text-[10px] text-neutral-500">{{ $testimonial['role'] }}, {{ $testimonial['company'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Desktop: Grid -->
                    <div class="hidden md:grid gap-6 md:grid-cols-3">
                        @foreach([
                            ['name' => 'Amara Obi', 'role' => 'Creative Director', 'company' => 'Vogue Africa', 'quote' => 'The quality of talent and professionalism is unmatched. Our go-to platform for editorial casting.'],
                            ['name' => 'Kwame Asante', 'role' => 'Producer', 'company' => 'Afrobeats Studios', 'quote' => 'Finally, a platform that understands African talent. The privacy-first approach is exactly what we needed.'],
                            ['name' => 'Zara Mensah', 'role' => 'Brand Manager', 'company' => 'Nike Africa', 'quote' => 'Streamlined our casting process entirely. The curated roster saves us weeks of scouting.'],
                        ] as $testimonial)
                        <div class="poa-card p-6 space-y-4">
                            <div class="flex gap-1">
                                @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-[rgba(212,175,55,0.8)]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-neutral-300 leading-relaxed italic">"{{ $testimonial['quote'] }}"</p>
                            <div class="pt-2 border-t border-white/5">
                                <div class="text-sm text-white font-medium">{{ $testimonial['name'] }}</div>
                                <div class="text-[11px] text-neutral-500">{{ $testimonial['role'] }}, {{ $testimonial['company'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-8">
                        <a href="{{ route('testimonials') }}" class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.8)] hover:text-white transition-colors">
                            View All Testimonials
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </section>
            </main>

            @include('partials.footer')
            @include('partials.whatsapp-button')
        </div>

        @include('partials.chat-widget')
    </body>
</html>