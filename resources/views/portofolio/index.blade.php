@extends('layouts.app')
@section('title', 'Portofolio')

@section('content')
<section class="section">
  <div class="wrap">
    <h1 style="margin-bottom:6px;">Portofolio Pengerjaan</h1>
    <p style="margin-bottom:30px;">Hasil kerja kami — sebelum dan sesudah dikerjakan.</p>

    @forelse ($portofolios as $item)
      <div class="panel" style="margin-bottom:20px; padding:0;">
        <div class="ba">
          <div>
            <span>SEBELUM</span>
            @if ($item->foto_sebelum)
              <img src="{{ asset('storage/' . $item->foto_sebelum) }}" alt="Sebelum - {{ $item->judul }}">
            @endif
          </div>
          <div>
            <span>SESUDAH</span>
            @if ($item->foto_sesudah)
              <img src="{{ asset('storage/' . $item->foto_sesudah) }}" alt="Sesudah - {{ $item->judul }}">
            @endif
          </div>
        </div>
        <div style="padding:20px;">
          @if ($item->kategori)<span class="tag">{{ $item->kategori->nama_kategori }}</span>@endif
          <h3>{{ $item->judul }}</h3>
          <p>{{ $item->deskripsi }}</p>
        </div>
      </div>
    @empty
      <div class="empty-state">Belum ada portofolio yang ditampilkan.</div>
    @endforelse

    {{ $portofolios->links() }}
  </div>
</section>
@endsection
