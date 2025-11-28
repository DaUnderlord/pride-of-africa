<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Messages · Admin · Pillars & Pride of Afrika</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-black text-white">
        <div class="poa-container py-8">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <p class="poa-id-font text-[11px] tracking-[0.32em] text-[rgba(245,230,179,0.85)]">CONTACT MESSAGES</p>
                    <h1 class="poa-hero-heading text-2xl tracking-[0.1em]">Inbox</h1>
                    @if($unreadCount > 0)
                        <p class="mt-1 text-[12px] text-neutral-400">{{ $unreadCount }} unread message{{ $unreadCount > 1 ? 's' : '' }}</p>
                    @endif
                </div>
                <a href="{{ route('admin.dashboard') }}" class="text-[11px] uppercase tracking-[0.26em] text-neutral-400 hover:text-neutral-100">
                    ← Dashboard
                </a>
            </header>

            @if(session('status'))
                <div class="mb-6 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-[13px] text-emerald-200">
                    {{ session('status') }}
                </div>
            @endif

            <section class="poa-card overflow-hidden">
                <table class="min-w-full text-left text-[12px] text-neutral-200">
                    <thead class="bg-white/5 text-[11px] uppercase tracking-[0.22em] text-neutral-400">
                        <tr>
                            <th class="px-4 py-3">Ref</th>
                            <th class="px-4 py-3">From</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                            <tr class="border-t border-white/5 {{ $message->status === 'unread' ? 'bg-[rgba(212,175,55,0.03)]' : '' }}">
                                <td class="px-4 py-3 align-top">
                                    <span class="poa-id-font text-[11px] tracking-[0.24em] text-[rgba(245,230,179,0.95)]">
                                        MSG-{{ str_pad((string) $message->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[12px] text-neutral-100 {{ $message->status === 'unread' ? 'font-medium' : '' }}">{{ $message->name }}</div>
                                    <div class="text-[11px] text-neutral-500">{{ $message->email }}</div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="text-[12px] text-neutral-200">{{ $message->subject ?: 'General Enquiry' }}</div>
                                    <div class="text-[11px] text-neutral-500 line-clamp-1">{{ Str::limit($message->message, 60) }}</div>
                                </td>
                                <td class="px-4 py-3 align-top">
                                    @php
                                        $statusStyles = [
                                            'unread' => 'border-[rgba(212,175,55,0.8)] text-[rgba(245,230,179,0.95)] bg-[rgba(212,175,55,0.1)]',
                                            'read' => 'border-sky-400/60 text-sky-200',
                                            'replied' => 'border-emerald-400/60 text-emerald-200',
                                        ];
                                    @endphp
                                    <span class="inline-flex rounded-full border px-2 py-0.5 text-[10px] uppercase tracking-[0.2em] {{ $statusStyles[$message->status] ?? '' }}">
                                        {{ $message->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-top text-[11px] text-neutral-500">
                                    {{ $message->created_at->format('M j, Y') }}<br />
                                    {{ $message->created_at->format('H:i') }}
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.contacts.show', $message) }}" class="text-[11px] text-[rgba(245,230,179,0.9)] hover:text-white">View</a>
                                        <form method="POST" action="{{ route('admin.contacts.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[11px] text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-[12px] text-neutral-400">
                                    No messages yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($messages->hasPages())
                    <div class="border-t border-white/5 bg-black/70 px-4 py-3">
                        {{ $messages->links() }}
                    </div>
                @endif
            </section>
        </div>
    </body>
</html>
