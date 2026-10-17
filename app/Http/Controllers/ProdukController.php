<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $kategoris = KategoriProduk::with('produks')->get();

        return view('produk.index', compact('kategoris'));
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }
}
