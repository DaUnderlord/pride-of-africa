<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact · Pillars &amp; Pride of Afrika</title>
        <meta name="description" content="Get in touch with Pillars & Pride of Afrika. Contact us for bookings, partnerships, or general enquiries.">

        @include('partials.favicon')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endif
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-grain" aria-hidden="true"></div>

        <div class="relative min-h-screen">
            <div class="pointer-events-none fixed inset-0" aria-hidden="true">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,_rgba(212,175,55,0.12),_transparent_50%)]"></div>
            </div>

            @include('partials.header')

            <main class="poa-container py-10 space-y-10 text-sm text-neutral-200">
                <!-- Hero Section -->
                <section class="space-y-4 max-w-3xl" data-reveal>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">GET IN TOUCH</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">We'd love to hear from you.</h1>
                    <p class="text-sm leading-relaxed text-neutral-300">
                        Whether you're a brand looking for talent, an aspiring model, or have a general enquiry, 
                        reach out to us using the form below or through our contact details.
                    </p>
                </section>

                <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                    <!-- Contact Form -->
                    <section class="poa-card p-6" data-reveal>
                        <p class="poa-id-font mb-4 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">SEND US A MESSAGE</p>
                        
                        @if (session('status') === 'message_sent')
                            <div class="mb-6 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-[13px] text-emerald-200">
                                <p class="font-medium">Thank you for your message!</p>
                                <p class="mt-1 text-emerald-300/80">We've received your enquiry and will respond within 24-48 hours. Reference: 
                                    <span class="poa-id-font tracking-[0.2em]">MSG-{{ str_pad((string) session('message_id'), 4, '0', STR_PAD_LEFT) }}</span>
                                </p>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-[13px] text-red-200">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                            @csrf

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Your Name *</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        value="{{ old('name') }}" 
                                        required 
                                        class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2.5 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        placeholder="John Doe"
                                    />
                                </div>
                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Email Address *</label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required 
                                        class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2.5 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        placeholder="john@example.com"
                                    />
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Phone Number</label>
                                    <input 
                                        type="text" 
                                        name="phone" 
                                        value="{{ old('phone') }}" 
                                        class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2.5 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                        placeholder="+234 XXX XXX XXXX"
                                    />
                                </div>
                                <div>
                                    <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Subject</label>
                                    <select 
                                        name="subject" 
                                        class="w-full rounded-full border border-white/10 bg-black/60 px-4 py-2.5 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                    >
                                        <option value="">Select a subject</option>
                                        <option value="Booking Enquiry" @selected(old('subject') === 'Booking Enquiry')>Booking Enquiry</option>
                                        <option value="Model Application" @selected(old('subject') === 'Model Application')>Model Application</option>
                                        <option value="Partnership" @selected(old('subject') === 'Partnership')>Partnership Opportunity</option>
                                        <option value="Press & Media" @selected(old('subject') === 'Press & Media')>Press & Media</option>
                                        <option value="General Enquiry" @selected(old('subject') === 'General Enquiry')>General Enquiry</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Your Message *</label>
                                <textarea 
                                    name="message" 
                                    rows="5" 
                                    required
                                    minlength="10"
                                    class="w-full rounded-2xl border border-white/10 bg-black/60 px-4 py-3 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                                    placeholder="Tell us how we can help you..."
                                >{{ old('message') }}</textarea>
                            </div>

                            @if(config('services.recaptcha.site_key'))
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-theme="dark"></div>
                            @endif

                            <div class="flex items-center justify-between gap-4 pt-2">
                                <p class="text-[11px] text-neutral-500">* Required fields</p>
                                <button 
                                    type="submit" 
                                    class="inline-flex items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-8 py-3 text-[10px] uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)] hover:text-white"
                                >
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </section>

                    <!-- Contact Info & Map -->
                    <div class="space-y-6">
                        <section class="poa-card p-6" data-reveal>
                            <p class="poa-id-font mb-4 text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">CONTACT DETAILS</p>
                            <div class="space-y-4 text-[13px]">
                                <div class="flex items-start gap-3">
                                    <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[rgba(212,175,55,0.15)] text-[rgba(245,230,179,0.9)]">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Office Address</p>
                                        <p class="text-neutral-400">Investment House, 1st Floor<br />CMS Bus Stop, Lagos Island<br />Lagos State, Nigeria</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[rgba(212,175,55,0.15)] text-[rgba(245,230,179,0.9)]">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Phone</p>
                                        <p class="text-neutral-400">
                                            <a href="tel:+2347084955556" class="hover:text-[rgba(245,230,179,0.9)] transition">+234 708 495 5556</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[#25D366]/20 text-[#25D366]">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">WhatsApp</p>
                                        <p class="text-neutral-400">
                                            <a href="https://wa.me/2347084955556" target="_blank" class="hover:text-[#25D366] transition">+234 708 495 5556</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-[rgba(212,175,55,0.15)] text-[rgba(245,230,179,0.9)]">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Email</p>
                                        <p class="text-neutral-400">
                                            <a href="mailto:info@prideofafrika.com" class="hover:text-[rgba(245,230,179,0.9)] transition">info@prideofafrika.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Google Map -->
                        <section class="poa-card overflow-hidden" data-reveal>
                            <div class="relative aspect-[4/3] w-full">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7285890744787!2d3.3885!3d6.4541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sCMS%20Bus%20Stop%2C%20Lagos%20Island!5e0!3m2!1sen!2sng!4v1700000000000!5m2!1sen!2sng"
                                    width="100%" 
                                    height="100%" 
                                    style="border:0; position:absolute; inset:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade"
                                    class="grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500"
                                ></iframe>
                            </div>
                            <div class="border-t border-white/5 bg-black/60 px-4 py-3 text-center">
                                <a 
                                    href="https://maps.google.com/?q=CMS+Bus+Stop+Lagos+Island+Nigeria" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-[11px] uppercase tracking-[0.24em] text-[rgba(245,230,179,0.9)] hover:text-white transition"
                                >
                                    Get Directions →
                                </a>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Security Notice -->
                <section class="poa-card p-6" data-reveal>
                    <div class="flex items-start gap-4">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-amber-500/10 text-amber-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <p class="poa-id-font mb-2 text-[11px] tracking-[0.32em] text-amber-400">SECURITY NOTICE</p>
                            <p class="text-[13px] leading-relaxed text-neutral-300">
                                Pillars & Pride of Afrika never sends emails from free email addresses such as Hotmail, Yahoo, or AOL. 
                                We do not have scouts or employees that use Yahoo or MSN profiles to scout for models, and we will never 
                                use chat rooms to talk to you about modeling for our agency. If you have been contacted by anyone claiming 
                                to work for our agency and you are unsure, please contact us immediately using the official details above.
                            </p>
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
