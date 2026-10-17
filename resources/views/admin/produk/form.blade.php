@extends('layouts.admin')
@section('title', $produk->exists ? 'Edit Produk' : 'Tambah Produk')
@section('page-title', $produk->exists ? 'Edit Produk' : 'Tambah Produk')

@section('content')
<form method="POST" action="{{ $produk->exists ? route('admin.produk.update', $produk) : route('admin.produk.store') }}" enctype="multipart/form-data" class="panel" style="max-width:560px;">
  @csrf
  @if ($produk->exists) @method('PUT') @endif

  <div class="field">
    <label for="nama_produk">Nama Produk</label>
    <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
  </div>

  <div class="field">
    <label for="kategori_produk_id">Kategori</label>
    <select id="kategori_produk_id" name="kategori_produk_id" required>
      @foreach ($kategoris as $k)
        <option value="{{ $k->id }}" @selected(old('kategori_produk_id', $produk->kategori_produk_id) == $k->id)>{{ $k->nama_kategori }}</option>
      @endforeach
    </select>
  </div>

  <div class="field">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
  </div>

  <div class="field-row">
    <div class="field">
      <label for="harga">Harga (Rp)</label>
      <input type="number" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" required>
    </div>
    <div class="field">
      <label for="stok">Stok</label>
      <input type="number" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" min="0" required>
    </div>
  </div>

  <div class="field">
    <label for="status">Status</label>
    <select id="status" name="status" required>
      <option value="tersedia" @selected(old('status', $produk->status) === 'tersedia')>Tersedia</option>
      <option value="habis" @selected(old('status', $produk->status) === 'habis')>Habis</option>
    </select>
  </div>

  <div class="field">
    <label for="foto">Foto Produk</label>
    <input type="file" id="foto" name="foto" accept="image/*">
    @if ($produk->foto)
      <div class="hint">Foto saat ini: {{ $produk->foto }} (upload baru untuk mengganti)</div>
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{ route('admin.produk.index') }}" class="btn btn-outline">Batal</a>
</form>
@endsection
