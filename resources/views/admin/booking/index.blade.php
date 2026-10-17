@extends('layouts.admin')
@section('title', 'Kelola Booking')
@section('page-title', 'Kelola Booking')

@section('content')
<div class="flex" style="margin-bottom:18px; flex-wrap:wrap;">
  <a href="{{ route('admin.booking.index') }}" class="btn btn-sm {{ request('status') ? 'btn-outline' : 'btn-primary' }}">Semua</a>
  <a href="{{ route('admin.booking.index', ['status' => 'menunggu_konfirmasi']) }}" class="btn btn-sm {{ request('status') === 'menunggu_konfirmasi' ? 'btn-primary' : 'btn-outline' }}">Menunggu</a>
  <a href="{{ route('admin.booking.index', ['status' => 'diterima']) }}" class="btn btn-sm {{ request('status') === 'diterima' ? 'btn-primary' : 'btn-outline' }}">Diterima</a>
  <a href="{{ route('admin.booking.index', ['status' => 'dikerjakan']) }}" class="btn btn-sm {{ request('status') === 'dikerjakan' ? 'btn-primary' : 'btn-outline' }}">Dikerjakan</a>
  <a href="{{ route('admin.booking.index', ['status' => 'selesai']) }}" class="btn btn-sm {{ request('status') === 'selesai' ? 'btn-primary' : 'btn-outline' }}">Selesai</a>
  <a href="{{ route('admin.booking.index', ['status' => 'ditolak']) }}" class="btn btn-sm {{ request('status') === 'ditolak' ? 'btn-primary' : 'btn-outline' }}">Ditolak</a>
</div>

<table>
  <tr><th>Kode</th><th>Customer</th><th>Layanan / Produk</th><th>Jadwal</th><th>Status</th><th></th></tr>
  @forelse ($bookings as $b)
    @php [$label, $class] = $b->statusLabel(); @endphp
    <tr>
      <td>{{ $b->kode_booking }}</td>
      <td>{{ $b->user->name }}<br><span class="text-muted" style="font-size:.78rem;">{{ $b->no_hp }}</span></td>
      <td>{{ $b->layanan->nama_layanan ?? $b->produk->nama_produk ?? '-' }}</td>
      <td>{{ $b->tanggal_booking->translatedFormat('d M Y') }} &middot; {{ \Illuminate\Support\Carbon::parse($b->jam_booking)->format('H:i') }}</td>
      <td><span class="badge {{ $class }}">{{ $label }}</span></td>
      <td><a href="{{ route('admin.booking.show', $b) }}" class="btn btn-outline btn-sm">Detail</a></td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center text-muted">Tidak ada booking.</td></tr>
  @endforelse
</table>

{{ $bookings->links() }}
@endsection
