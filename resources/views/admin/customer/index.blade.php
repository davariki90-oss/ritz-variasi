@extends('layouts.admin')
@section('title', 'Data Customer')
@section('page-title', 'Data Customer')

@section('content')
<table>
  <tr><th>Nama</th><th>Email</th><th>No. HP</th><th>Total Booking</th><th>Bergabung</th><th></th></tr>
  @forelse ($customers as $c)
    <tr>
      <td>{{ $c->name }}</td>
      <td>{{ $c->email }}</td>
      <td>{{ $c->no_hp }}</td>
      <td>{{ $c->bookings_count }}</td>
      <td>{{ $c->created_at->translatedFormat('d M Y') }}</td>
      <td><a href="{{ route('admin.customer.show', $c) }}" class="btn btn-outline btn-sm">Detail</a></td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center text-muted">Belum ada customer terdaftar.</td></tr>
  @endforelse
</table>

{{ $customers->links() }}
@endsection
