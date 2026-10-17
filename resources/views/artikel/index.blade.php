@extends('layouts.app')
@section('title', 'Artikel')

@section('content')
<section class="section">
  <div class="wrap">
    <h1 style="margin-bottom:6px;">Artikel &amp; Informasi</h1>
    <p style="margin-bottom:30px;">Tips perawatan, tips modifikasi, dan informasi produk.</p>

    <div class="grid grid-3">
      @forelse ($artikels as $item)
        <a href="{{ route('artikel.show', $item) }}" class="card">
          <div class="card-media">
            @if ($item->foto)
              <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}">
            @else
              <span>Artikel</span>
            @endif
          </div>
          <div class="card-body">
            <h3 style="margin:0;">{{ $item->judul }}</h3>
            <p style="font-size:.88rem;">{{ $item->ringkasan }}</p>
            <div class="text-muted" style="font-size:.78rem; margin-top:auto;">{{ $item->created_at->translatedFormat('d F Y') }}</div>
          </div>
        </a>
      @empty
        <div class="empty-state">Belum ada artikel.</div>
      @endforelse
    </div>

    {{ $artikels->links() }}
  </div>
</section>
@endsection
