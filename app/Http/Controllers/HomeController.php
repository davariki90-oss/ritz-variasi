<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $layanan = Layanan::aktif()->latest()->take(4)->get();
        $produk = Produk::tersedia()->latest()->take(4)->get();
        $portofolio = Portofolio::latest()->take(3)->get();

        return view('home', compact('layanan', 'produk', 'portofolio'));
    }
}
