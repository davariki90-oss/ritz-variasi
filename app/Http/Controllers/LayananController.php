<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $kategoris = KategoriLayanan::with(['layanans' => fn ($q) => $q->aktif()])->get();

        return view('layanan.index', compact('kategoris'));
    }

    public function show(Layanan $layanan)
    {
        return view('layanan.show', compact('layanan'));
    }
}
