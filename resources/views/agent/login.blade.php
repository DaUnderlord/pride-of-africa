<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agent Login · Pillars &amp; Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(212,175,55,0.18),_transparent_55%),_#000000] text-white">
        <div class="relative min-h-screen flex items-center justify-center">
            <div class="poa-card w-full max-w-md p-6 text-sm text-neutral-200">
                <div class="mb-6 flex items-center gap-3">
                    <div class="h-9">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Pillars &amp; Pride of Afrika" class="h-9 w-auto object-contain" />
                    </div>
                    <div class="leading-tight">
                        <div class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.9)]">ACCREDITED AGENT LOGIN</div>
                        <div class="mt-1 text-[10px] uppercase tracking-[0.26em] text-neutral-400">Access your portfolio</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('agent.login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                        @error('email')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.28em] text-neutral-400">Password</label>
                        <input type="password" name="password" class="w-full rounded-md border border-white/10 bg-black/40 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" required />
                        @error('password')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.26em]">
                        <a href="{{ route('agents.apply') }}" class="text-neutral-400 hover:text-neutral-100">Request access</a>
                        <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[rgba(245,230,179,0.98)] hover:bg-[rgba(212,175,55,0.28)]">Login</button>
                    </div>
                </form>

                @if ($errors->any() && ! $errors->has('email'))
                    <p class="mt-4 text-xs text-red-400">{{ $errors->first() }}</p>
                @endif
            </div>
        </div>
    </body>
</html>
