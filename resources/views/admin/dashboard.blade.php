@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="kpi-row">
  <div class="kpi"><div class="num">{{ $kpi['menunggu'] }}</div><div class="lbl">Menunggu Konfirmasi</div></div>
  <div class="kpi"><div class="num">{{ $kpi['diterima'] }}</div><div class="lbl">Diterima</div></div>
  <div class="kpi"><div class="num">{{ $kpi['dikerjakan'] }}</div><div class="lbl">Sedang Dikerjakan</div></div>
  <div class="kpi"><div class="num">{{ $kpi['selesai'] }}</div><div class="lbl">Selesai</div></div>
</div>

<div class="flex-between" style="margin-bottom:14px;">
  <h3 class="mb-0">Booking Terbaru</h3>
  <a href="{{ route('admin.booking.index') }}" class="btn btn-outline btn-sm">Lihat Semua</a>
</div>

<table>
  <tr>
    <th>Kode</th><th>Customer</th><th>Layanan / Produk</th><th>Tanggal</th><th>Status</th>
  </tr>
  @forelse ($bookingTerbaru as $b)
    @php [$label, $class] = $b->statusLabel(); @endphp
    <tr onclick="window.location='{{ route('admin.booking.show', $b) }}'" style="cursor:pointer;">
      <td>{{ $b->kode_booking }}</td>
      <td>{{ $b->user->name }}</td>
      <td>{{ $b->layanan->nama_layanan ?? $b->produk->nama_produk ?? '-' }}</td>
      <td>{{ $b->tanggal_booking->translatedFormat('d M Y') }}</td>
      <td><span class="badge {{ $class }}">{{ $label }}</span></td>
    </tr>
  @empty
    <tr><td colspan="5" class="text-center text-muted">Belum ada booking masuk.</td></tr>
  @endforelse
</table>
@endsection
