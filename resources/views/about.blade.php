<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About · Pillars &amp; Pride of Afrika</title>
        <meta name="description" content="Learn about Pillars & Pride of Afrika - Africa's premier modeling and talent management agency.">

        @include('partials.favicon')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-grain" aria-hidden="true"></div>

        <div class="relative min-h-screen">
            <div class="pointer-events-none fixed inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,_rgba(212,175,55,0.12),_transparent_50%)]"></div>
            </div>

            @include('partials.header')

            <main class="relative z-10">
                <!-- Hero Section with Full-Width Image -->
                <section class="relative min-h-[60vh] md:min-h-[70vh] flex items-center overflow-hidden">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img 
                            src="https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=1920" 
                            alt="African Models" 
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-transparent"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/50"></div>
                    </div>
                    
                    <!-- Hero Content -->
                    <div class="relative z-10 poa-container py-20">
                        <div class="max-w-2xl space-y-6" data-reveal>
                            <p class="poa-id-font text-[10px] tracking-[0.4em] text-[rgba(212,175,55,0.9)]">ABOUT THE AGENCY</p>
                            <h1 class="poa-hero-heading text-4xl md:text-5xl lg:text-6xl tracking-tight text-white leading-tight">
                                Pillars &amp; Pride<br/>
                                <span class="text-[rgba(212,175,55,0.95)]">of Afrika</span>
                            </h1>
                            <p class="text-lg text-neutral-300 leading-relaxed max-w-xl">
                                Africa's premier modeling and talent management agency, built from the heart of the continent for the world.
                            </p>
                            <div class="flex items-center gap-6 pt-4">
                                <div class="text-center">
                                    <div class="poa-hero-heading text-3xl text-[rgba(212,175,55,0.95)]">500+</div>
                                    <div class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400 mt-1">TALENTS</div>
                                </div>
                                <div class="w-px h-12 bg-white/20"></div>
                                <div class="text-center">
                                    <div class="poa-hero-heading text-3xl text-[rgba(212,175,55,0.95)]">12</div>
                                    <div class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400 mt-1">COUNTRIES</div>
                                </div>
                                <div class="w-px h-12 bg-white/20"></div>
                                <div class="text-center">
                                    <div class="poa-hero-heading text-3xl text-[rgba(212,175,55,0.95)]">10+</div>
                                    <div class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400 mt-1">YEARS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Story Section -->
                <section class="py-20 poa-container">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <!-- Image Grid -->
                        <div class="grid grid-cols-2 gap-4" data-reveal>
                            <div class="space-y-4">
                                <div class="aspect-[3/4] rounded-2xl overflow-hidden">
                                    <img src="https://images.pexels.com/photos/2681751/pexels-photo-2681751.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Model" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
                                </div>
                                <div class="aspect-square rounded-2xl overflow-hidden">
                                    <img src="https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Model" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
                                </div>
                            </div>
                            <div class="space-y-4 pt-8">
                                <div class="aspect-square rounded-2xl overflow-hidden">
                                    <img src="https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Model" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
                                </div>
                                <div class="aspect-[3/4] rounded-2xl overflow-hidden">
                                    <img src="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Model" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Story Content -->
                        <div class="space-y-8" data-reveal>
                            <div>
                                <p class="poa-id-font text-[10px] tracking-[0.4em] text-[rgba(212,175,55,0.9)] mb-4">OUR STORY</p>
                                <h2 class="poa-hero-heading text-3xl md:text-4xl text-white mb-6">Dreams Made Reality</h2>
                                <div class="space-y-4 text-neutral-300 leading-relaxed">
                                    <p>
                                        We bring to reality the dreams of aspiring models. You don't have to be extra-skinny, extra-tall or super sexy… 
                                        perhaps there's really no single criteria for "an ideal model" because there's a place just for you and you alone 
                                        in the modeling world.
                                    </p>
                                    <p>
                                        We encourage aspiring models and talents of all age groups—baby model, child model, teenage model and adult model. 
                                        The advertising and fashion world needs you.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="poa-card p-5">
                                    <div class="w-10 h-10 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center mb-3">
                                        <svg class="w-5 h-5 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-[rgba(212,175,55,0.8)] mb-1">AGE RANGE</p>
                                    <p class="text-sm text-neutral-200">Baby · Child · Teen · Adult</p>
                                </div>
                                <div class="poa-card p-5">
                                    <div class="w-10 h-10 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center mb-3">
                                        <svg class="w-5 h-5 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4V2m10 2V2M5 6h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2zm0 4h14"/>
                                        </svg>
                                    </div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-[rgba(212,175,55,0.8)] mb-1">COVERAGE</p>
                                    <p class="text-sm text-neutral-200">Print · TV · Runway · Events</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- What We Do - Full Width -->
                <section class="py-20 bg-gradient-to-b from-transparent via-[rgba(212,175,55,0.03)] to-transparent">
                    <div class="poa-container">
                        <div class="text-center max-w-3xl mx-auto mb-16" data-reveal>
                            <p class="poa-id-font text-[10px] tracking-[0.4em] text-[rgba(212,175,55,0.9)] mb-4">WHAT WE DO</p>
                            <h2 class="poa-hero-heading text-3xl md:text-4xl text-white mb-6">Full-Service Talent Management</h2>
                            <p class="text-neutral-400">
                                We represent models, actors, hostesses and children for print work, conventions, commercials, 
                                television, film, runway, music videos, and special events.
                            </p>
                        </div>
                        
                        <!-- Services Grid -->
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal>
                            <div class="poa-card p-6 text-center group hover:border-[rgba(212,175,55,0.4)] transition-all duration-300">
                                <div class="w-16 h-16 rounded-full bg-[rgba(212,175,55,0.1)] flex items-center justify-center mx-auto mb-4 group-hover:bg-[rgba(212,175,55,0.2)] transition-colors">
                                    <svg class="w-7 h-7 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h3 class="poa-hero-heading text-lg text-white mb-2">Print &amp; Editorial</h3>
                                <p class="text-sm text-neutral-400">Magazine shoots, advertising campaigns, and editorial features</p>
                            </div>
                            
                            <div class="poa-card p-6 text-center group hover:border-[rgba(212,175,55,0.4)] transition-all duration-300">
                                <div class="w-16 h-16 rounded-full bg-[rgba(212,175,55,0.1)] flex items-center justify-center mx-auto mb-4 group-hover:bg-[rgba(212,175,55,0.2)] transition-colors">
                                    <svg class="w-7 h-7 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h3 class="poa-hero-heading text-lg text-white mb-2">TV &amp; Film</h3>
                                <p class="text-sm text-neutral-400">Commercials, television shows, and feature film productions</p>
                            </div>
                            
                            <div class="poa-card p-6 text-center group hover:border-[rgba(212,175,55,0.4)] transition-all duration-300">
                                <div class="w-16 h-16 rounded-full bg-[rgba(212,175,55,0.1)] flex items-center justify-center mx-auto mb-4 group-hover:bg-[rgba(212,175,55,0.2)] transition-colors">
                                    <svg class="w-7 h-7 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <h3 class="poa-hero-heading text-lg text-white mb-2">Runway &amp; Fashion</h3>
                                <p class="text-sm text-neutral-400">Fashion weeks, runway shows, and designer presentations</p>
                            </div>
                            
                            <div class="poa-card p-6 text-center group hover:border-[rgba(212,175,55,0.4)] transition-all duration-300">
                                <div class="w-16 h-16 rounded-full bg-[rgba(212,175,55,0.1)] flex items-center justify-center mx-auto mb-4 group-hover:bg-[rgba(212,175,55,0.2)] transition-colors">
                                    <svg class="w-7 h-7 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h3 class="poa-hero-heading text-lg text-white mb-2">Events &amp; Hosting</h3>
                                <p class="text-sm text-neutral-400">Corporate events, trade shows, and special occasions</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Vision, Mission, Purpose -->
                <section class="py-20 poa-container">
                    <div class="grid lg:grid-cols-3 gap-8" data-reveal>
                        <div class="poa-card p-8 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[rgba(212,175,55,0.05)] rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-700"></div>
                            <div class="relative">
                                <div class="w-12 h-12 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center mb-5">
                                    <svg class="w-6 h-6 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                                <p class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(212,175,55,0.9)] mb-3">VISION</p>
                                <p class="text-lg text-white leading-relaxed">A modeling agency from the heart of Africa that is the standard for, and pride to all.</p>
                            </div>
                        </div>
                        
                        <div class="poa-card p-8 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[rgba(212,175,55,0.05)] rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-700"></div>
                            <div class="relative">
                                <div class="w-12 h-12 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center mb-5">
                                    <svg class="w-6 h-6 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <p class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(212,175,55,0.9)] mb-3">MISSION</p>
                                <p class="text-lg text-white leading-relaxed">To bring out the best in each model in order to produce and to be the best.</p>
                            </div>
                        </div>
                        
                        <div class="poa-card p-8 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[rgba(212,175,55,0.05)] rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-700"></div>
                            <div class="relative">
                                <div class="w-12 h-12 rounded-full bg-[rgba(212,175,55,0.15)] flex items-center justify-center mb-5">
                                    <svg class="w-6 h-6 text-[rgba(212,175,55,0.9)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <p class="poa-id-font text-[10px] tracking-[0.3em] text-[rgba(212,175,55,0.9)] mb-3">PURPOSE</p>
                                <p class="text-lg text-white leading-relaxed">Raising intelligent models who would positively stand out in every way.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Why Choose Us -->
                <section class="py-20 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20">
                        <img src="https://images.pexels.com/photos/3622614/pexels-photo-3622614.jpeg?auto=compress&cs=tinysrgb&w=1920" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/95 to-black"></div>
                    
                    <div class="relative z-10 poa-container">
                        <div class="grid lg:grid-cols-2 gap-12 items-center">
                            <div data-reveal>
                                <p class="poa-id-font text-[10px] tracking-[0.4em] text-[rgba(212,175,55,0.9)] mb-4">WHY CHOOSE US</p>
                                <h2 class="poa-hero-heading text-3xl md:text-4xl text-white mb-6">Excellence in Every Detail</h2>
                                <p class="text-neutral-300 mb-8 leading-relaxed">
                                    We have the expertise and motivation to develop a carefully selected and constantly monitored roster in each market. 
                                    Every person we provide is known to us, has successfully completed our selection process and training.
                                </p>
                                
                                <div class="space-y-4">
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-full bg-[rgba(212,175,55,0.2)] flex items-center justify-center flex-shrink-0 mt-1">
                                            <svg class="w-4 h-4 text-[rgba(212,175,55,0.9)]" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-1">Rigorous Selection Process</h4>
                                            <p class="text-sm text-neutral-400">Every talent is carefully evaluated and trained before representation</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-full bg-[rgba(212,175,55,0.2)] flex items-center justify-center flex-shrink-0 mt-1">
                                            <svg class="w-4 h-4 text-[rgba(212,175,55,0.9)]" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-1">Professional Development</h4>
                                            <p class="text-sm text-neutral-400">Ongoing training and career guidance for all our talents</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="w-8 h-8 rounded-full bg-[rgba(212,175,55,0.2)] flex items-center justify-center flex-shrink-0 mt-1">
                                            <svg class="w-4 h-4 text-[rgba(212,175,55,0.9)]" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-1">Competitive Pricing</h4>
                                            <p class="text-sm text-neutral-400">Quality talent at rates that work for your budget</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4" data-reveal>
                                <div class="poa-card p-6 text-center">
                                    <div class="poa-hero-heading text-4xl text-[rgba(212,175,55,0.95)] mb-2">24h</div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400">RESPONSE TIME</p>
                                </div>
                                <div class="poa-card p-6 text-center">
                                    <div class="poa-hero-heading text-4xl text-[rgba(212,175,55,0.95)] mb-2">98%</div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400">CLIENT SATISFACTION</p>
                                </div>
                                <div class="poa-card p-6 text-center">
                                    <div class="poa-hero-heading text-4xl text-[rgba(212,175,55,0.95)] mb-2">200+</div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400">BRAND PARTNERS</p>
                                </div>
                                <div class="poa-card p-6 text-center">
                                    <div class="poa-hero-heading text-4xl text-[rgba(212,175,55,0.95)] mb-2">5K+</div>
                                    <p class="poa-id-font text-[9px] tracking-[0.2em] text-neutral-400">BOOKINGS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CTA Section -->
                <section class="py-20 poa-container">
                    <div class="poa-card p-10 md:p-16 text-center relative overflow-hidden" data-reveal>
                        <div class="absolute inset-0 bg-gradient-to-br from-[rgba(212,175,55,0.1)] to-transparent"></div>
                        <div class="relative z-10">
                            <h2 class="poa-hero-heading text-3xl md:text-4xl text-white mb-4">Ready to Join Our Roster?</h2>
                            <p class="text-neutral-400 max-w-xl mx-auto mb-8">
                                Whether you're an aspiring model or an established talent, we'd love to hear from you. 
                                Take the first step towards your modeling career today.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                                <a href="{{ route('join.create') }}" class="inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-4 text-[11px] font-medium uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] transition-all duration-300 hover:bg-[rgba(212,175,55,0.3)]">
                                    Apply Now
                                </a>
                                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 px-8 py-4 text-[11px] uppercase tracking-[0.28em] text-neutral-300 transition-all duration-300 hover:border-[rgba(212,175,55,0.5)]">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            @include('partials.footer')
            @include('partials.whatsapp-button')
        </div>

        @include('partials.chat-widget')
    </body>
</html>
