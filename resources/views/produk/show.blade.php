@extends('layouts.app')
@section('title', $produk->nama_produk)

@section('content')
<section class="section">
  <div class="wrap" style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:start;">
    <div class="card-media" style="aspect-ratio:1/1;">
      @if ($produk->foto)
        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}">
      @else
        <span>Foto produk</span>
      @endif
    </div>
    <div>
      <div class="eyebrow">{{ $produk->kategori->nama_kategori }}</div>
      <h1>{{ $produk->nama_produk }}</h1>

      @if ($produk->harga > 0)
        <div class="card-price" style="font-size:1.6rem; margin-bottom:16px;">{{ 'Rp' . number_format($produk->harga, 0, ',', '.') }}</div>
      @else
        <div class="text-muted" style="margin-bottom:16px;">Harga belum tercantum — hubungi kami untuk info harga terbaru.</div>
      @endif

      <p style="max-width:none;">{{ $produk->deskripsi }}</p>

      <div class="flex" style="margin-bottom:22px;">
        <span class="badge {{ $produk->status === 'tersedia' ? 'status-accepted' : 'status-rejected' }}">
          {{ $produk->status === 'tersedia' ? 'Stok Tersedia' : 'Stok Habis' }}
        </span>
      </div>

      @if ($produk->status === 'tersedia')
        <a href="{{ route('booking.create') }}?produk={{ $produk->id }}" class="btn btn-primary">Konsultasi &amp; Booking</a>
      @else
        <button class="btn btn-primary" disabled>Stok Habis</button>
      @endif
      <a href="https://wa.me/6281511626888" target="_blank" rel="noopener" class="btn btn-outline">Tanya via WhatsApp</a>
      <a href="{{ route('produk.index') }}" class="btn btn-outline">Kembali ke Produk</a>
    </div>
  </div>
</section>
@endsection
