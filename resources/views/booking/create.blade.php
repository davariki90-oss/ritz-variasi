@extends('layouts.app')
@section('title', 'Booking')

@section('content')
<section class="section">
  <div class="wrap" style="max-width:720px;">
    <h1 style="margin-bottom:6px;">Booking Layanan</h1>
    <p style="margin-bottom:20px;">Isi data di bawah ini, tim kami akan konfirmasi jadwalnya.</p>

    <div class="steps">
      <span class="step done">1. Pilih Layanan</span>
      <span class="step active">2. Data &amp; Jadwal</span>
      <span class="step">3. Konfirmasi Admin</span>
    </div>

    <form method="POST" action="{{ route('booking.store') }}" class="panel">
      @csrf

      <div class="field">
        <label for="layanan_id">Pilih Layanan</label>
        <select id="layanan_id" name="layanan_id">
          <option value="">— Tidak pilih layanan —</option>
          @foreach ($layanans as $l)
            <option value="{{ $l->id }}" @selected(old('layanan_id', $layananTerpilih?->id) == $l->id)>
              {{ $l->nama_layanan }} (mulai {{ 'Rp' . number_format($l->harga_mulai, 0, ',', '.') }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="field">
        <label for="produk_id">Pilih Produk (opsional, kalau mau beli/pasang produk tertentu)</label>
        <select id="produk_id" name="produk_id">
          <option value="">— Tidak pilih produk —</option>
          @foreach ($produks as $p)
            <option value="{{ $p->id }}" @selected(old('produk_id', $produkTerpilih?->id) == $p->id)>
              {{ $p->nama_produk }} ({{ 'Rp' . number_format($p->harga, 0, ',', '.') }})
            </option>
          @endforeach
        </select>
        <div class="hint">Pilih minimal salah satu: layanan atau produk.</div>
      </div>

      <div class="divider"></div>

      <div class="field-row">
        <div class="field">
          <label for="nama_pemesan">Nama Pemesan</label>
          <input type="text" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', auth()->user()->name) }}" required>
        </div>
        <div class="field">
          <label for="no_hp">No. HP</label>
          <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}" required>
        </div>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="merk_mobil">Merk Mobil</label>
          <input type="text" id="merk_mobil" name="merk_mobil" placeholder="Honda, Toyota, dll" value="{{ old('merk_mobil') }}" required>
        </div>
        <div class="field">
          <label for="tipe_mobil">Tipe Mobil</label>
          <input type="text" id="tipe_mobil" name="tipe_mobil" placeholder="Brio, Avanza, dll" value="{{ old('tipe_mobil') }}" required>
        </div>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="tahun_mobil">Tahun Mobil</label>
          <input type="text" id="tahun_mobil" name="tahun_mobil" maxlength="4" placeholder="2021" value="{{ old('tahun_mobil') }}" required>
        </div>
        <div class="field">
          <label for="plat_nomor">Plat Nomor</label>
          <input type="text" id="plat_nomor" name="plat_nomor" placeholder="B 1234 ABC" value="{{ old('plat_nomor') }}" required>
        </div>
      </div>

      <div class="divider"></div>

      <div class="field-row">
        <div class="field">
          <label for="tanggal_booking">Tanggal</label>
          <input type="date" id="tanggal_booking" name="tanggal_booking" min="{{ date('Y-m-d') }}" value="{{ old('tanggal_booking') }}" required>
        </div>
        <div class="field">
          <label for="jam_booking">Jam</label>
          <input type="time" id="jam_booking" name="jam_booking" value="{{ old('jam_booking') }}" required>
        </div>
      </div>

      <div class="field">
        <label for="catatan">Catatan Tambahan (opsional)</label>
        <textarea id="catatan" name="catatan">{{ old('catatan') }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Kirim Permintaan Booking</button>
    </form>
  </div>
</section>
@endsection
