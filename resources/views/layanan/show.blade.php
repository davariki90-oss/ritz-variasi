@extends('layouts.app')
@section('title', $layanan->nama_layanan)

@section('content')
<section class="section">
  <div class="wrap" style="max-width:820px;">
    <div class="eyebrow">{{ $layanan->kategori->nama_kategori }}</div>
    <h1>{{ $layanan->nama_layanan }}</h1>

    <div class="card-media" style="margin-bottom:24px; aspect-ratio:16/7;">
      @if ($layanan->foto)
        <img src="{{ asset('storage/' . $layanan->foto) }}" alt="{{ $layanan->nama_layanan }}">
      @else
        <span>Foto layanan</span>
      @endif
    </div>

    <p style="max-width:none;">{{ $layanan->deskripsi }}</p>

    <div class="grid grid-2" style="margin:28px 0;">
      <div class="panel">
        <div class="text-muted" style="font-size:.8rem;">Estimasi Pengerjaan</div>
        <h3 style="margin-top:6px;">{{ $layanan->estimasi_waktu ?? 'Hubungi kami' }}</h3>
      </div>
      <div class="panel">
        <div class="text-muted" style="font-size:.8rem;">Harga</div>
        @if ($layanan->harga_mulai > 0)
          <h3 style="margin-top:6px; color:var(--orange-400);">Mulai {{ 'Rp' . number_format($layanan->harga_mulai, 0, ',', '.') }}</h3>
        @else
          <h3 style="margin-top:6px;">Hubungi untuk info harga</h3>
        @endif
      </div>
    </div>

    <a href="{{ route('booking.create', $layanan) }}" class="btn btn-primary">Booking Layanan Ini</a>
    <a href="https://wa.me/6281511626888" target="_blank" rel="noopener" class="btn btn-outline">Tanya via WhatsApp</a>
    <a href="{{ route('layanan.index') }}" class="btn btn-outline">Kembali ke Layanan</a>
  </div>
</section>
@endsection
