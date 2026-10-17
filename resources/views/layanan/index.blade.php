@extends('layouts.app')
@section('title', 'Layanan')

@section('content')
<section class="section">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h1 style="margin-bottom:6px;">Layanan Kami</h1>
        <p>Alarm, audio, head unit, central lock, kaca film, dan lainnya.</p>
      </div>
    </div>

    @forelse ($kategoris as $kategori)
      @if ($kategori->layanans->count())
        <h3 style="margin-top:36px; color:var(--orange-400); font-family:var(--font-display);">{{ $kategori->nama_kategori }}</h3>
        <div>
          @foreach ($kategori->layanans as $item)
            <a href="{{ route('layanan.show', $item) }}" class="service-row">
              <div class="service-icon">{{ mb_substr($item->nama_layanan, 0, 1) }}</div>
              <div>
                <h3>{{ $item->nama_layanan }}</h3>
                <p>{{ Str::limit($item->deskripsi, 90) }}</p>
              </div>
              <div class="price">
                @if ($item->harga_mulai > 0)
                  {{ 'Rp' . number_format($item->harga_mulai, 0, ',', '.') }}
                  <small>{{ $item->estimasi_waktu }}</small>
                @else
                  <span style="font-size:.82rem; color:var(--text-low);">Hubungi untuk harga</span>
                @endif
              </div>
            </a>
          @endforeach
        </div>
      @endif
    @empty
      <div class="empty-state">Belum ada layanan yang tersedia.</div>
    @endforelse
  </div>
</section>
@endsection
