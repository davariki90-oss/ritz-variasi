@extends('layouts.app')
@section('title', 'Produk')

@section('content')
<section class="section">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h1 style="margin-bottom:6px;">Katalog Produk</h1>
        <p>Audio, lighting, dan aksesoris interior/eksterior siap pasang.</p>
      </div>
    </div>

    @forelse ($kategoris as $kategori)
      @if ($kategori->produks->count())
        <h3 style="margin-top:36px; color:var(--orange-400); font-family:var(--font-display);">{{ $kategori->nama_kategori }}</h3>
        <div class="grid grid-4">
          @foreach ($kategori->produks as $item)
            <a href="{{ route('produk.show', $item) }}" class="card">
              <div class="card-media">
                @if ($item->foto)
                  <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_produk }}">
                @else
                  <span>{{ $item->nama_produk }}</span>
                @endif
              </div>
              <div class="card-body">
                <span class="tag">{{ $item->status === 'tersedia' ? 'Tersedia' : 'Stok Habis' }}</span>
                <h3 style="margin:0;">{{ $item->nama_produk }}</h3>
                @if ($item->harga > 0)
                  <div class="card-price">{{ 'Rp' . number_format($item->harga, 0, ',', '.') }}</div>
                @else
                  <div class="card-price" style="font-size:.85rem; color:var(--text-low);">Hubungi untuk info harga</div>
                @endif
              </div>
            </a>
          @endforeach
        </div>
      @endif
    @empty
      <div class="empty-state">Belum ada produk yang tersedia.</div>
    @endforelse
  </div>
</section>
@endsection
