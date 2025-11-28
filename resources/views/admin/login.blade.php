<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Login · Pillars &amp; Pride of Africa</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="flex min-h-screen items-center justify-center">
            <div class="poa-card w-full max-w-md p-8 text-sm text-neutral-200">
                <h1 class="poa-hero-heading mb-4 text-xl tracking-[0.12em]">Admin access</h1>
                <p class="mb-6 text-[13px] text-neutral-400">
                    Enter the admin password configured in the environment to view internal dashboards.
                </p>

                <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="mb-1 block text-[11px] uppercase tracking-[0.26em] text-neutral-400">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-full border border-white/15 bg-black/70 px-4 py-2 text-[13px] text-neutral-100 focus:border-[rgba(212,175,55,0.8)] focus:outline-none"
                            required
                        />
                        @error('password')
                            <p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-4 py-2 text-[11px] uppercase tracking-[0.3em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)] hover:text-white"
                    >
                        Enter dashboard
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
