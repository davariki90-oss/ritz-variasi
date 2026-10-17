@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="hero">
  <div class="wrap">
    <div>
      <div class="eyebrow">BENGKEL VARIASI MOBIL KARAWANG</div>
      <h1>Variasi mobil kamu,<br>booking tanpa antre.</h1>
      <p>Audio, lighting, kaca film, interior, sampai custom modifikasi — pesan jadwal servis langsung dari HP, pantau statusnya, dan datang tepat waktu ke bengkel.</p>
      <div class="flex" style="margin-top:26px;">
        <a href="{{ route('booking.create') }}" class="btn btn-primary">Booking Sekarang</a>
        <a href="{{ route('layanan.index') }}" class="btn btn-outline">Lihat Layanan</a>
      </div>
    </div>
    <div class="hero-panel notch">
      <div class="eyebrow" style="margin-bottom:14px;">PORTOFOLIO TERBARU</div>
      <div class="grid grid-2" style="gap:10px;">
        @forelse ($portofolio->take(2) as $item)
          <div class="card-media" style="aspect-ratio:4/3;">
            @if ($item->foto_sesudah)
              <img src="{{ asset('storage/' . $item->foto_sesudah) }}" alt="{{ $item->judul }}">
            @else
              <span>{{ $item->judul }}</span>
            @endif
          </div>
        @empty
          <div class="card-media">Belum ada portofolio</div>
          <div class="card-media">Belum ada portofolio</div>
        @endforelse
      </div>
      <div class="stat-row">
        <div><div class="stat-num">500+</div><div class="stat-label">Mobil dikerjakan</div></div>
        <div><div class="stat-num">4.8</div><div class="stat-label">Rating rata-rata</div></div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h2>Layanan unggulan</h2>
        <p>Layanan yang paling sering dipesan customer kami.</p>
      </div>
      <a href="{{ route('layanan.index') }}" class="btn btn-outline btn-sm">Semua Layanan</a>
    </div>
    <div class="grid grid-4">
      @foreach ($layanan as $item)
        <a href="{{ route('layanan.show', $item) }}" class="panel">
          <div class="service-icon" style="margin-bottom:14px;">{{ mb_substr($item->nama_layanan, 0, 1) }}</div>
          <h3>{{ $item->nama_layanan }}</h3>
          @if ($item->harga_mulai > 0)
            <p style="font-size:.85rem;">Mulai {{ 'Rp' . number_format($item->harga_mulai, 0, ',', '.') }}</p>
          @else
            <p style="font-size:.85rem;">Hubungi untuk info harga</p>
          @endif
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h2>Produk pilihan</h2>
        <p>Audio, lighting, dan aksesoris siap pasang.</p>
      </div>
      <a href="{{ route('produk.index') }}" class="btn btn-outline btn-sm">Semua Produk</a>
    </div>
    <div class="grid grid-4">
      @foreach ($produk as $item)
        <a href="{{ route('produk.show', $item) }}" class="card">
          <div class="card-media">
            @if ($item->foto)
              <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_produk }}">
            @else
              <span>{{ $item->nama_produk }}</span>
            @endif
          </div>
          <div class="card-body">
            <span class="tag">{{ $item->kategori->nama_kategori }}</span>
            <h3 style="margin:0;">{{ $item->nama_produk }}</h3>
            @if ($item->harga > 0)
              <div class="card-price">{{ 'Rp' . number_format($item->harga, 0, ',', '.') }}</div>
            @else
              <div class="card-price" style="font-size:.85rem; color:var(--text-low);">Hubungi untuk info harga</div>
            @endif
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap text-center">
    <h2>Siap upgrade tampilan &amp; kenyamanan mobil kamu?</h2>
    <p style="margin:0 auto 24px;">Booking online sekarang, konsultasi gratis sebelum pengerjaan.</p>
    <a href="{{ route('booking.create') }}" class="btn btn-primary">Booking Sekarang</a>
  </div>
</section>
@endsection
