@extends('layouts.app')
@section('title', 'Booking Saya')

@section('content')
<section class="section">
  <div class="wrap">
    <h1 style="margin-bottom:6px;">Booking Saya</h1>
    <p style="margin-bottom:26px;">Riwayat dan status booking kamu di Ritz Variasi.</p>

    @forelse ($bookings as $booking)
      @php [$label, $class] = $booking->statusLabel(); @endphp
      <a href="{{ route('dashboard.show', $booking) }}" class="panel" style="display:block; margin-bottom:14px;">
        <div class="flex-between">
          <div>
            <div class="text-muted" style="font-size:.78rem;">{{ $booking->kode_booking }} &middot; {{ $booking->tanggal_booking->translatedFormat('d F Y') }}</div>
            <h3 style="margin:4px 0 0;">{{ $booking->layanan->nama_layanan ?? $booking->produk->nama_produk ?? 'Booking' }}</h3>
          </div>
          <span class="badge {{ $class }}">{{ $label }}</span>
        </div>
      </a>
    @empty
      <div class="empty-state">
        Kamu belum pernah booking. <a href="{{ route('booking.create') }}" style="color:var(--orange-400);">Booking sekarang</a>.
      </div>
    @endforelse
  </div>
</section>
@endsection
