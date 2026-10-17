<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriLayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('kategori')->latest()->paginate(10);

        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $kategoris = KategoriLayanan::all();

        return view('admin.layanan.form', ['layanan' => new Layanan, 'kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        $kategoris = KategoriLayanan::all();

        return view('admin.layanan.form', compact('layanan', 'kategoris'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diupdate.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'kategori_layanan_id' => ['required', 'exists:kategori_layanans,id'],
            'nama_layanan' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'estimasi_waktu' => ['nullable', 'string', 'max:50'],
            'harga_mulai' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
