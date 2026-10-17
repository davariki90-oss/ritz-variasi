<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(?Layanan $layanan = null, Request $request)
    {
        $layanans = Layanan::aktif()->get();
        $produks = Produk::tersedia()->get();

        $produkTerpilih = null;
        if ($request->filled('produk')) {
            $produkTerpilih = Produk::find($request->query('produk'));
        }

        return view('booking.create', [
            'layanans' => $layanans,
            'produks' => $produks,
            'layananTerpilih' => $layanan,
            'produkTerpilih' => $produkTerpilih,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'layanan_id' => ['nullable', 'exists:layanans,id'],
            'produk_id' => ['nullable', 'exists:produks,id'],
            'nama_pemesan' => ['required', 'string', 'max:100'],
            'no_hp' => ['required', 'string', 'max:20'],
            'merk_mobil' => ['required', 'string', 'max:50'],
            'tipe_mobil' => ['required', 'string', 'max:50'],
            'tahun_mobil' => ['required', 'digits:4'],
            'plat_nomor' => ['required', 'string', 'max:20'],
            'tanggal_booking' => ['required', 'date', 'after_or_equal:today'],
            'jam_booking' => ['required'],
            'catatan' => ['nullable', 'string'],
        ]);

        if (empty($data['layanan_id']) && empty($data['produk_id'])) {
            return back()->withErrors(['layanan_id' => 'Pilih minimal satu layanan atau produk.'])->withInput();
        }

        $data['kode_booking'] = Booking::generateKode();
        $data['user_id'] = auth()->id();
        $data['status'] = 'menunggu_konfirmasi';

        $booking = Booking::create($data);

        return redirect()->route('dashboard.show', $booking)
            ->with('success', 'Booking berhasil dikirim! Kode booking kamu: ' . $booking->kode_booking . '. Tunggu konfirmasi dari admin.');
    }
}
