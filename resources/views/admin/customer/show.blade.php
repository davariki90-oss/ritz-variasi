@extends('layouts.admin')
@section('title', 'Detail Customer')
@section('page-title', 'Detail Customer')

@section('content')
<div class="panel" style="margin-bottom:20px;">
  <h3>{{ $customer->name }}</h3>
  <p class="mb-0">{{ $customer->email }} &middot; {{ $customer->no_hp }}</p>
  <p class="text-muted">Bergabung {{ $customer->created_at->translatedFormat('d F Y') }}</p>
</div>

<h3 style="margin-bottom:14px;">Riwayat Booking</h3>
<table>
  <tr><th>Kode</th><th>Layanan / Produk</th><th>Tanggal</th><th>Status</th></tr>
  @forelse ($customer->bookings as $b)
    @php [$label, $class] = $b->statusLabel(); @endphp
    <tr>
      <td>{{ $b->kode_booking }}</td>
      <td>{{ $b->layanan->nama_layanan ?? $b->produk->nama_produk ?? '-' }}</td>
      <td>{{ $b->tanggal_booking->translatedFormat('d M Y') }}</td>
      <td><span class="badge {{ $class }}">{{ $label }}</span></td>
    </tr>
  @empty
    <tr><td colspan="4" class="text-center text-muted">Belum pernah booking.</td></tr>
  @endforelse
</table>

<a href="{{ route('admin.customer.index') }}" class="btn btn-outline" style="margin-top:20px;">Kembali</a>
@endsection
