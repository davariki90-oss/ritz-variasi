<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        abort_unless($booking->user_id === auth()->id(), 403);
        abort_unless($booking->status === 'selesai', 400, 'Booking belum selesai, belum bisa diberi rating.');

        $data = $request->validate([
            'bintang' => ['required', 'integer', 'min:1', 'max:5'],
            'ulasan' => ['nullable', 'string', 'max:1000'],
        ]);

        Rating::updateOrCreate(
            ['booking_id' => $booking->id],
            [
                'user_id' => auth()->id(),
                'bintang' => $data['bintang'],
                'ulasan' => $data['ulasan'] ?? null,
            ]
        );

        return back()->with('success', 'Terima kasih atas ulasannya!');
    }
}
