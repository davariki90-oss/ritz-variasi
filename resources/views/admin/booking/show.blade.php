@extends('layouts.admin')
@section('title', 'Detail Booking ' . $booking->kode_booking)
@section('page-title', 'Detail Booking')

@section('content')
@php [$label, $class] = $booking->statusLabel(); @endphp

<div class="flex-between" style="margin-bottom:20px;">
  <h3 class="mb-0">{{ $booking->kode_booking }}</h3>
  <span class="badge {{ $class }}">{{ $label }}</span>
</div>

<div class="grid grid-2" style="align-items:start;">
  <div class="panel">
    <h3>Data Customer</h3>
    <p class="mb-0">{{ $booking->nama_pemesan }}</p>
    <p class="mb-0 text-muted">{{ $booking->no_hp }} &middot; {{ $booking->user->email }}</p>

    <div class="divider"></div>

    <h3>Kendaraan</h3>
    <p class="mb-0">{{ $booking->merk_mobil }} {{ $booking->tipe_mobil }} ({{ $booking->tahun_mobil }})</p>
    <p class="mb-0 text-muted">Plat: {{ $booking->plat_nomor }}</p>

    <div class="divider"></div>

    <h3>Layanan / Produk</h3>
    <p class="mb-0">{{ $booking->layanan->nama_layanan ?? '-' }}@if($booking->produk) &middot; {{ $booking->produk->nama_produk }} @endif</p>

    <div class="divider"></div>

    <h3>Jadwal</h3>
    <p class="mb-0">{{ $booking->tanggal_booking->translatedFormat('d F Y') }} &middot; {{ \Illuminate\Support\Carbon::parse($booking->jam_booking)->format('H:i') }}</p>

    @if ($booking->catatan)
      <div class="divider"></div>
      <h3>Catatan Customer</h3>
      <p class="mb-0">{{ $booking->catatan }}</p>
    @endif
  </div>

  <div class="panel">
    <h3>Aksi</h3>

    @if ($booking->status === 'menunggu_konfirmasi')
      <form action="{{ route('admin.booking.terima', $booking) }}" method="POST" style="margin-bottom:12px;">
        @csrf
        <button type="submit" class="btn btn-primary btn-block">Terima Booking</button>
      </form>

      <form action="{{ route('admin.booking.tolak', $booking) }}" method="POST">
        @csrf
        <div class="field">
          <label for="alasan_tolak">Alasan Tolak</label>
          <textarea id="alasan_tolak" name="alasan_tolak" placeholder="Contoh: jadwal penuh, mohon pilih tanggal lain" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger btn-block">Tolak Booking</button>
      </form>

    @elseif ($booking->status === 'diterima')
      <p class="text-muted">Booking diterima. Setelah customer datang dan pengerjaan dimulai, update status di bawah.</p>
      <form action="{{ route('admin.booking.status', $booking) }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="dikerjakan">
        <button type="submit" class="btn btn-primary btn-block">Mulai Pengerjaan</button>
      </form>

    @elseif ($booking->status === 'dikerjakan')
      <p class="text-muted">Sedang dikerjakan. Tandai selesai setelah mobil selesai dikerjakan.</p>
      <form action="{{ route('admin.booking.status', $booking) }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="selesai">
        <button type="submit" class="btn btn-primary btn-block">Tandai Selesai</button>
      </form>

    @elseif ($booking->status === 'selesai')
      <p class="text-muted">Booking sudah selesai.</p>
      @if ($booking->rating)
        <div class="divider"></div>
        <h3>Rating dari Customer</h3>
        @for ($i = 1; $i <= 5; $i++)
          <span class="star {{ $i > $booking->rating->bintang ? 'off' : '' }}">&#9733;</span>
        @endfor
        <p style="margin-top:8px;">{{ $booking->rating->ulasan }}</p>
      @else
        <p class="text-muted">Customer belum memberi rating.</p>
      @endif

    @elseif ($booking->status === 'ditolak')
      <p class="text-muted">Booking ditolak.</p>
      <p><strong>Alasan:</strong> {{ $booking->alasan_tolak }}</p>
    @endif
  </div>
</div>

<a href="{{ route('admin.booking.index') }}" class="btn btn-outline" style="margin-top:20px;">Kembali ke Daftar Booking</a>
@endsection
