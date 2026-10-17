<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'layanan', 'produk']);

        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        $bookings = $query->latest()->paginate(12)->withQueryString();

        return view('admin.booking.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'layanan', 'produk', 'rating']);

        return view('admin.booking.show', compact('booking'));
    }

    public function terima(Booking $booking)
    {
        abort_unless($booking->status === 'menunggu_konfirmasi', 400, 'Booking ini sudah diproses sebelumnya.');

        $booking->update(['status' => 'diterima']);

        return back()->with('success', 'Booking ' . $booking->kode_booking . ' diterima.');
    }

    public function tolak(Request $request, Booking $booking)
    {
        abort_unless($booking->status === 'menunggu_konfirmasi', 400, 'Booking ini sudah diproses sebelumnya.');

        $data = $request->validate([
            'alasan_tolak' => ['required', 'string', 'max:255'],
        ]);

        $booking->update([
            'status' => 'ditolak',
            'alasan_tolak' => $data['alasan_tolak'],
        ]);

        return back()->with('success', 'Booking ' . $booking->kode_booking . ' ditolak.');
    }

    /**
     * Update status pengerjaan: diterima -> dikerjakan -> selesai.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => ['required', 'in:dikerjakan,selesai'],
        ]);

        $urutan = ['diterima', 'dikerjakan', 'selesai'];
        $posisiSekarang = array_search($booking->status, $urutan);
        $posisiBaru = array_search($data['status'], $urutan);

        abort_if($posisiBaru === false || $posisiSekarang === false || $posisiBaru < $posisiSekarang, 400, 'Perubahan status tidak valid.');

        $booking->update(['status' => $data['status']]);

        return back()->with('success', 'Status booking ' . $booking->kode_booking . ' diupdate menjadi "' . $booking->statusLabel()[0] . '".');
    }
}
