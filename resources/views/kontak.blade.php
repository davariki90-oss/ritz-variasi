@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
<section class="section">
  <div class="wrap">
    <h1 style="margin-bottom:6px;">Hubungi Kami</h1>
    <p style="margin-bottom:30px;">Datang langsung, atau hubungi kami dulu untuk konsultasi.</p>

    <div class="grid grid-2">
      <div class="panel">
        <h3>Alamat Bengkel</h3>
        <p>Jl. Raya Syeh Quro No.101, Palumbonsari, Kec. Karawang Tim., Karawang, Jawa Barat 41314</p>
        <div style="aspect-ratio:16/9; margin-top:14px; border:1px solid var(--line);">
          <iframe
            src="https://www.google.com/maps?q=Jl.+Raya+Syeh+Quro+No.101,+Palumbonsari,+Kec.+Karawang+Tim.,+Karawang,+Jawa+Barat+41314&output=embed"
            width="100%" height="100%" style="border:0; display:block;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Raya+Syeh+Quro+No.101,+Palumbonsari,+Kec.+Karawang+Tim.,+Karawang,+Jawa+Barat+41314"
           target="_blank" rel="noopener" class="btn btn-outline btn-sm" style="margin-top:14px;">Buka di Google Maps</a>
      </div>
      <div class="panel">
        <h3>Kontak &amp; Sosial Media</h3>
        <p>WhatsApp: <a href="https://wa.me/6281511626888" target="_blank" rel="noopener" style="color:var(--orange-400);">0815-1162-6888</a></p>
        <p>Facebook: <a href="https://facebook.com/RitzVariasi" target="_blank" rel="noopener" style="color:var(--orange-400);">Ritz Variasi</a></p>
        <p>Instagram: <a href="https://instagram.com/ritzvariasi" target="_blank" rel="noopener" style="color:var(--orange-400);">@ritzvariasi</a></p>
        <p>TikTok: <a href="https://tiktok.com/@ritz.audioshoplighting" target="_blank" rel="noopener" style="color:var(--orange-400);">@ritz.audioshoplighting</a></p>
        <div class="divider"></div>
        <h3>Jam Operasional</h3>
        <p>Senin – Sabtu: 08.00 – 17.00<br>Minggu &amp; Hari Libur: Tutup</p>
      </div>
    </div>
  </div>
</section>
@endsection
