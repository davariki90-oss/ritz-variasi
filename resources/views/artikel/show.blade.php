@extends('layouts.app')
@section('title', $artikel->judul)

@section('content')
<section class="section">
  <div class="wrap" style="max-width:760px;">
    <div class="eyebrow">{{ $artikel->created_at->translatedFormat('d F Y') }} &middot; {{ $artikel->penulis }}</div>
    <h1>{{ $artikel->judul }}</h1>

    <div class="card-media" style="margin-bottom:24px; aspect-ratio:16/7;">
      @if ($artikel->foto)
        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}">
      @else
        <span>Foto artikel</span>
      @endif
    </div>

    <div style="max-width:none; color:var(--text-mid); line-height:1.8;">
      {!! nl2br(e($artikel->isi)) !!}
    </div>

    <a href="{{ route('artikel.index') }}" class="btn btn-outline" style="margin-top:30px;">Kembali ke Artikel</a>
  </div>
</section>
@endsection
