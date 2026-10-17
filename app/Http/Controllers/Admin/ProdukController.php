<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->latest()->paginate(10);

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = KategoriProduk::all();

        return view('admin.produk.form', ['produk' => new Produk, 'kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $kategoris = KategoriProduk::all();

        return view('admin.produk.form', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $this->validated($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'kategori_produk_id' => ['required', 'exists:kategori_produks,id'],
            'nama_produk' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:tersedia,habis'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
