<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Produk;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $kpi = [
            'menunggu' => Booking::where('status', 'menunggu_konfirmasi')->count(),
            'diterima' => Booking::where('status', 'diterima')->count(),
            'dikerjakan' => Booking::where('status', 'dikerjakan')->count(),
            'selesai' => Booking::where('status', 'selesai')->count(),
        ];

        $bookingTerbaru = Booking::with(['user', 'layanan', 'produk'])->latest()->take(8)->get();
        $totalCustomer = User::count();
        $produkHabis = Produk::where('status', 'habis')->count();

        return view('admin.dashboard', compact('kpi', 'bookingTerbaru', 'totalCustomer', 'produkHabis'));
    }
}
