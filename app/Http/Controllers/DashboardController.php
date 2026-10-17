<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with(['layanan', 'produk', 'rating'])->latest()->get();

        return view('dashboard.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        abort_unless($booking->user_id === auth()->id(), 403);
        $booking->load(['layanan', 'produk', 'rating']);

        return view('dashboard.show', compact('booking'));
    }
}
