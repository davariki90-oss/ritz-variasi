@extends('layouts.app')
@section('title', 'Detail Booking ' . $booking->kode_booking)

@section('content')
<section class="section">
  <div class="wrap" style="max-width:680px;">
    @php [$label, $class] = $booking->statusLabel(); @endphp

    <div class="flex-between" style="margin-bottom:8px;">
      <h1 style="margin:0;">{{ $booking->kode_booking }}</h1>
      <span class="badge {{ $class }}">{{ $label }}</span>
    </div>
    <p style="margin-bottom:26px;">Dibuat {{ $booking->created_at->translatedFormat('d F Y, H:i') }}</p>

    @if ($booking->status === 'ditolak' && $booking->alasan_tolak)
      <div class="alert alert-error">Alasan ditolak: {{ $booking->alasan_tolak }}</div>
    @endif

    <div class="panel" style="margin-bottom:20px;">
      <h3>Layanan / Produk</h3>
      <p>{{ $booking->layanan->nama_layanan ?? '-' }}@if($booking->produk) &middot; {{ $booking->produk->nama_produk }} @endif</p>

      <div class="divider"></div>

      <h3>Data Kendaraan</h3>
      <div class="grid grid-2" style="gap:12px;">
        <p class="mb-0">Merk: {{ $booking->merk_mobil }}</p>
        <p class="mb-0">Tipe: {{ $booking->tipe_mobil }}</p>
        <p class="mb-0">Tahun: {{ $booking->tahun_mobil }}</p>
        <p class="mb-0">Plat: {{ $booking->plat_nomor }}</p>
      </div>

      <div class="divider"></div>

      <h3>Jadwal</h3>
      <p>{{ $booking->tanggal_booking->translatedFormat('d F Y') }} &middot; {{ \Illuminate\Support\Carbon::parse($booking->jam_booking)->format('H:i') }}</p>

      @if ($booking->catatan)
        <div class="divider"></div>
        <h3>Catatan</h3>
        <p>{{ $booking->catatan }}</p>
      @endif
    </div>

    @if ($booking->status === 'selesai')
      <div class="panel">
        <h3>{{ $booking->rating ? 'Ulasan Kamu' : 'Beri Rating & Ulasan' }}</h3>

        @if ($booking->rating)
          <div style="margin-bottom:8px;">
            @for ($i = 1; $i <= 5; $i++)
              <span class="star {{ $i > $booking->rating->bintang ? 'off' : '' }}">&#9733;</span>
            @endfor
          </div>
          <p>{{ $booking->rating->ulasan }}</p>
        @else
          <form method="POST" action="{{ route('rating.store', $booking) }}">
            @csrf
            <div class="field">
              <label for="bintang">Bintang</label>
              <select id="bintang" name="bintang" required>
                <option value="">Pilih bintang</option>
                @for ($i = 5; $i >= 1; $i--)
                  <option value="{{ $i }}">{{ $i }} bintang</option>
                @endfor
              </select>
            </div>
            <div class="field">
              <label for="ulasan">Ulasan (opsional)</label>
              <textarea id="ulasan" name="ulasan" placeholder="Ceritakan pengalaman kamu..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
          </form>
        @endif
      </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-outline" style="margin-top:20px;">Kembali ke Booking Saya</a>
  </div>
</section>
@endsection
