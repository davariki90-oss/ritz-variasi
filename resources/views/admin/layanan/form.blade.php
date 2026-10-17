@extends('layouts.admin')
@section('title', $layanan->exists ? 'Edit Layanan' : 'Tambah Layanan')
@section('page-title', $layanan->exists ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<form method="POST" action="{{ $layanan->exists ? route('admin.layanan.update', $layanan) : route('admin.layanan.store') }}" enctype="multipart/form-data" class="panel" style="max-width:560px;">
  @csrf
  @if ($layanan->exists) @method('PUT') @endif

  <div class="field">
    <label for="nama_layanan">Nama Layanan</label>
    <input type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
  </div>

  <div class="field">
    <label for="kategori_layanan_id">Kategori</label>
    <select id="kategori_layanan_id" name="kategori_layanan_id" required>
      @foreach ($kategoris as $k)
        <option value="{{ $k->id }}" @selected(old('kategori_layanan_id', $layanan->kategori_layanan_id) == $k->id)>{{ $k->nama_kategori }}</option>
      @endforeach
    </select>
  </div>

  <div class="field">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
  </div>

  <div class="field-row">
    <div class="field">
      <label for="harga_mulai">Harga Mulai (Rp)</label>
      <input type="number" id="harga_mulai" name="harga_mulai" value="{{ old('harga_mulai', $layanan->harga_mulai) }}" min="0" required>
    </div>
    <div class="field">
      <label for="estimasi_waktu">Estimasi Waktu</label>
      <input type="text" id="estimasi_waktu" name="estimasi_waktu" placeholder="2-3 jam" value="{{ old('estimasi_waktu', $layanan->estimasi_waktu) }}">
    </div>
  </div>

  <div class="field">
    <label for="status">Status</label>
    <select id="status" name="status" required>
      <option value="aktif" @selected(old('status', $layanan->status) === 'aktif')>Aktif</option>
      <option value="nonaktif" @selected(old('status', $layanan->status) === 'nonaktif')>Nonaktif</option>
    </select>
  </div>

  <div class="field">
    <label for="foto">Foto Layanan</label>
    <input type="file" id="foto" name="foto" accept="image/*">
    @if ($layanan->foto)
      <div class="hint">Foto saat ini: {{ $layanan->foto }} (upload baru untuk mengganti)</div>
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">Batal</a>
</form>
@endsection
