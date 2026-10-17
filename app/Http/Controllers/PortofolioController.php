<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::latest()->paginate(9);

        return view('portofolio.index', compact('portofolios'));
    }
}
