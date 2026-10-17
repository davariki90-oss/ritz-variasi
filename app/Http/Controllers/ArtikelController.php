<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(6);

        return view('artikel.index', compact('artikels'));
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }
}
