<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::orderByRaw("FIELD(status, 'unread', 'read', 'replied')")
            ->orderByDesc('created_at')
            ->paginate(20);

        $unreadCount = ContactMessage::unread()->count();

        return view('admin.contacts.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $contact): View
    {
        if ($contact->status === 'unread') {
            $contact->markAsRead();
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, ContactMessage $contact): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['nullable', 'in:unread,read,replied'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        if (isset($validated['status'])) {
            $contact->status = $validated['status'];
            if ($validated['status'] === 'read' && !$contact->read_at) {
                $contact->read_at = now();
            }
            if ($validated['status'] === 'replied' && !$contact->replied_at) {
                $contact->replied_at = now();
            }
        }

        if (isset($validated['admin_notes'])) {
            $contact->admin_notes = $validated['admin_notes'];
        }

        $contact->save();

        return redirect()->route('admin.contacts.show', $contact)->with('status', 'Message updated.');
    }

    public function destroy(ContactMessage $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('status', 'Message deleted.');
    }
}
