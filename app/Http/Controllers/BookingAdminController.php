<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\View\View;

class BookingAdminController extends Controller
{
    public function index(): View
    {
        $bookings = Booking::with('talent')
            ->latest()
            ->paginate(15);

        return view('admin.bookings.index', [
            'bookings' => $bookings,
        ]);
    }
}
