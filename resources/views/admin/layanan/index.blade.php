@extends('layouts.admin')
@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')

@section('content')
<div class="flex-between" style="margin-bottom:18px;">
  <p class="mb-0 text-muted">Total {{ $layanans->total() }} layanan</p>
  <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary btn-sm">+ Tambah Layanan</a>
</div>

<table>
  <tr><th>Layanan</th><th>Kategori</th><th>Harga Mulai</th><th>Estimasi</th><th>Status</th><th></th></tr>
  @forelse ($layanans as $l)
    <tr>
      <td>{{ $l->nama_layanan }}</td>
      <td>{{ $l->kategori->nama_kategori }}</td>
      <td>{{ 'Rp' . number_format($l->harga_mulai, 0, ',', '.') }}</td>
      <td>{{ $l->estimasi_waktu }}</td>
      <td><span class="badge {{ $l->status === 'aktif' ? 'status-accepted' : 'status-rejected' }}">{{ ucfirst($l->status) }}</span></td>
      <td>
        <div class="action-icons">
          <a href="{{ route('admin.layanan.edit', $l) }}" class="icon-btn" title="Edit">&#9998;</a>
          <form action="{{ route('admin.layanan.destroy', $l) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="icon-btn" title="Hapus">&times;</button>
          </form>
        </div>
      </td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center text-muted">Belum ada layanan.</td></tr>
  @endforelse
</table>

{{ $layanans->links() }}
@endsection
