<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Message Details · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8 max-w-3xl">
            <header class="mb-6">
                <a href="{{ route('admin.contacts.index') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">← Back to Messages</a>
                <div class="mt-4 flex items-center justify-between">
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Message Details</h1>
                    <span class="poa-id-font text-[11px] tracking-[0.24em] text-[rgba(245,230,179,0.95)]">
                        MSG-{{ str_pad((string) $contact->id, 4, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
            </header>

            @if(session('status'))
                <div class="mb-6 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-[13px] text-emerald-200">
                    {{ session('status') }}
                </div>
            @endif

            <div class="space-y-6">
                <!-- Message Info -->
                <section class="poa-card p-6">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <p class="text-[11px] uppercase tracking-[0.24em] text-neutral-500">From</p>
                            <p class="mt-1 text-sm text-white">{{ $contact->name }}</p>
                            <p class="text-[13px] text-neutral-400">{{ $contact->email }}</p>
                            @if($contact->phone)
                                <p class="text-[13px] text-neutral-400">{{ $contact->phone }}</p>
                            @endif
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-[0.24em] text-neutral-500">Received</p>
                            <p class="mt-1 text-sm text-white">{{ $contact->created_at->format('F j, Y \a\t H:i') }}</p>
                            @if($contact->read_at)
                                <p class="text-[13px] text-neutral-400">Read: {{ $contact->read_at->format('M j, Y H:i') }}</p>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- Message Content -->
                <section class="poa-card p-6">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-neutral-500">Subject</p>
                    <h2 class="mt-1 text-base text-white">{{ $contact->subject ?: 'General Enquiry' }}</h2>
                    
                    <p class="mt-6 text-[11px] uppercase tracking-[0.24em] text-neutral-500">Message</p>
                    <div class="mt-2 text-sm leading-relaxed text-neutral-200 whitespace-pre-wrap">{{ $contact->message }}</div>
                </section>

                <!-- Admin Actions -->
                <section class="poa-card p-6">
                    <form method="POST" action="{{ route('admin.contacts.update', $contact) }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.24em] text-neutral-500">Status</label>
                            <select name="status" class="w-48 rounded-md border border-white/10 bg-black/60 px-3 py-2 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none">
                                <option value="unread" @selected($contact->status === 'unread')>Unread</option>
                                <option value="read" @selected($contact->status === 'read')>Read</option>
                                <option value="replied" @selected($contact->status === 'replied')>Replied</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-[11px] uppercase tracking-[0.24em] text-neutral-500">Admin Notes</label>
                            <textarea name="admin_notes" rows="3" class="w-full rounded-md border border-white/10 bg-black/60 px-4 py-3 text-sm text-white focus:border-[rgba(212,175,55,0.8)] focus:outline-none" placeholder="Internal notes...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject ?: 'Your Enquiry') }}" class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-5 py-2 text-[11px] uppercase tracking-[0.24em] text-neutral-200 hover:bg-white/10">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Reply via Email
                            </a>
                            <button type="submit" class="rounded-full border border-[rgba(212,175,55,0.9)] bg-[rgba(212,175,55,0.15)] px-6 py-2 text-[11px] uppercase tracking-[0.26em] text-[rgba(245,230,179,0.98)] transition hover:bg-[rgba(212,175,55,0.28)]">
                                Update
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </body>
</html>
