@extends('layouts.admin')
@section('title', 'Kelola Produk')
@section('page-title', 'Kelola Produk')

@section('content')
<div class="flex-between" style="margin-bottom:18px;">
  <p class="mb-0 text-muted">Total {{ $produks->total() }} produk</p>
  <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-sm">+ Tambah Produk</a>
</div>

<table>
  <tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th></th></tr>
  @forelse ($produks as $p)
    <tr>
      <td>{{ $p->nama_produk }}</td>
      <td>{{ $p->kategori->nama_kategori }}</td>
      <td>{{ 'Rp' . number_format($p->harga, 0, ',', '.') }}</td>
      <td>{{ $p->stok }}</td>
      <td><span class="badge {{ $p->status === 'tersedia' ? 'status-accepted' : 'status-rejected' }}">{{ ucfirst($p->status) }}</span></td>
      <td>
        <div class="action-icons">
          <a href="{{ route('admin.produk.edit', $p) }}" class="icon-btn" title="Edit">&#9998;</a>
          <form action="{{ route('admin.produk.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="icon-btn" title="Hapus">&times;</button>
          </form>
        </div>
      </td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center text-muted">Belum ada produk.</td></tr>
  @endforelse
</table>

{{ $produks->links() }}
@endsection
