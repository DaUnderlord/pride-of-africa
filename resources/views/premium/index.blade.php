<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Premium Services · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.18),_transparent_55%),_#000000] text-white">
        <div class="relative min-h-screen">
            @include('partials.header')

            <main class="poa-container py-10 space-y-12">
                <!-- Hero Section -->
                <section class="text-center space-y-4 max-w-3xl mx-auto" data-reveal>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">PREMIUM SERVICES</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em] sm:text-3xl">Elevate your visibility. Accelerate your career.</h1>
                    <p class="text-sm leading-relaxed text-neutral-300">
                        Choose from our premium packages designed to give your profile maximum exposure 
                        to brands, agencies, and producers across Africa and beyond.
                    </p>
                </section>

                <!-- Pricing Cards -->
                <section class="grid gap-6 md:grid-cols-3" data-reveal>
                    <!-- Basic -->
                    <div class="poa-card p-6 flex flex-col">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-neutral-400">BASIC</p>
                            <h2 class="poa-hero-heading text-xl tracking-[0.08em]">Standard Listing</h2>
                            <div class="flex items-baseline gap-1">
                                <span class="text-3xl font-light text-white">Free</span>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-[13px] text-neutral-300 flex-1">
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Profile listing in directory</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Up to 4 portfolio images</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Basic measurements & bio</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Booking enquiry form</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-neutral-600">✗</span>
                                <span class="text-neutral-500">Featured placement</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <a href="{{ route('join.create') }}" class="block w-full rounded-full border border-white/20 bg-white/5 py-3 text-center text-[11px] uppercase tracking-[0.26em] text-neutral-200 transition hover:bg-white/10">
                                Apply Now
                            </a>
                        </div>
                    </div>

                    <!-- Featured - Highlighted -->
                    <div class="poa-card p-6 flex flex-col border-[rgba(212,175,55,0.5)] bg-[rgba(212,175,55,0.05)] relative">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                            <span class="rounded-full bg-[rgba(212,175,55,0.9)] px-4 py-1 text-[10px] uppercase tracking-[0.24em] text-black font-medium">
                                Most Popular
                            </span>
                        </div>
                        <div class="space-y-2 pt-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">FEATURED</p>
                            <h2 class="poa-hero-heading text-xl tracking-[0.08em]">Premium Listing</h2>
                            <div class="flex items-baseline gap-1">
                                <span class="text-3xl font-light text-white">₦25,000</span>
                                <span class="text-sm text-neutral-400">/month</span>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-[13px] text-neutral-300 flex-1">
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Everything in Basic</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span><strong>Featured</strong> placement on homepage</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Up to 12 portfolio images</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Priority in search results</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Verified badge on profile</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <button 
                                type="button" 
                                onclick="initiatePayment('featured', 25000)"
                                class="block w-full rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.2)] py-3 text-center text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.35)]"
                            >
                                Subscribe Now
                            </button>
                        </div>
                    </div>

                    <!-- Elite -->
                    <div class="poa-card p-6 flex flex-col">
                        <div class="space-y-2">
                            <p class="poa-id-font text-[11px] tracking-[0.32em] text-neutral-400">ELITE</p>
                            <h2 class="poa-hero-heading text-xl tracking-[0.08em]">VIP Package</h2>
                            <div class="flex items-baseline gap-1">
                                <span class="text-3xl font-light text-white">₦75,000</span>
                                <span class="text-sm text-neutral-400">/month</span>
                            </div>
                        </div>
                        <ul class="mt-6 space-y-3 text-[13px] text-neutral-300 flex-1">
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Everything in Featured</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Unlimited portfolio images</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Video portfolio support</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Direct brand introductions</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[rgba(212,175,55,0.9)]">✓</span>
                                <span>Personal career consultation</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <button 
                                type="button" 
                                onclick="initiatePayment('elite', 75000)"
                                class="block w-full rounded-full border border-white/20 bg-white/5 py-3 text-center text-[11px] uppercase tracking-[0.26em] text-neutral-200 transition hover:bg-white/10"
                            >
                                Subscribe Now
                            </button>
                        </div>
                    </div>
                </section>

                <!-- FAQ Section -->
                <section class="max-w-2xl mx-auto space-y-6" data-reveal>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)] text-center">FREQUENTLY ASKED QUESTIONS</p>
                    
                    <div class="space-y-4">
                        <div class="poa-card p-5">
                            <h3 class="text-sm font-medium text-white">How does payment work?</h3>
                            <p class="mt-2 text-[13px] text-neutral-400">We accept payments via Paystack (card payments, bank transfer, USSD) and Flutterwave. All transactions are secure and encrypted.</p>
                        </div>
                        <div class="poa-card p-5">
                            <h3 class="text-sm font-medium text-white">Can I cancel my subscription?</h3>
                            <p class="mt-2 text-[13px] text-neutral-400">Yes, you can cancel anytime. Your premium features will remain active until the end of your billing period.</p>
                        </div>
                        <div class="poa-card p-5">
                            <h3 class="text-sm font-medium text-white">What happens after I subscribe?</h3>
                            <p class="mt-2 text-[13px] text-neutral-400">Once payment is confirmed, your profile will be upgraded within 24 hours. You'll receive an email with next steps.</p>
                        </div>
                    </div>
                </section>

                <!-- Contact CTA -->
                <section class="poa-card p-8 text-center" data-reveal>
                    <p class="text-sm text-neutral-300">Have questions about our premium services?</p>
                    <a href="{{ route('contact') }}" class="mt-3 inline-flex items-center gap-2 text-[rgba(245,230,179,0.9)] hover:text-white transition text-sm">
                        Contact our team →
                    </a>
                </section>
            </main>

            @include('partials.footer')
            @include('partials.whatsapp-button')
        </div>

        @if(config('services.paystack.public_key'))
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
            function initiatePayment(plan, amount) {
                // For demo purposes - in production, you'd create a transaction server-side first
                const email = prompt('Enter your email address to continue:');
                if (!email) return;

                const handler = PaystackPop.setup({
                    key: '{{ config('services.paystack.public_key') }}',
                    email: email,
                    amount: amount * 100, // Paystack expects amount in kobo
                    currency: 'NGN',
                    ref: 'POA-' + Math.floor((Math.random() * 1000000000) + 1),
                    metadata: {
                        plan: plan,
                        custom_fields: [
                            {
                                display_name: "Plan",
                                variable_name: "plan",
                                value: plan
                            }
                        ]
                    },
                    callback: function(response) {
                        alert('Payment successful! Reference: ' + response.reference + '\n\nOur team will upgrade your account within 24 hours.');
                        // In production: verify payment server-side and activate subscription
                    },
                    onClose: function() {
                        console.log('Payment window closed');
                    }
                });
                handler.openIframe();
            }
        </script>
        @else
        <script>
            function initiatePayment(plan, amount) {
                alert('Payment gateway not configured. Please contact us directly to subscribe to the ' + plan + ' plan.');
                window.location.href = '{{ route('contact') }}';
            }
        </script>
        @endif

        @include('partials.chat-widget')
    </body>
</html>
