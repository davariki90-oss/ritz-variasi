<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Ritz Variasi Karawang') — Audio, Lighting &amp; Accessories</title>
<meta name="description" content="Ritz Variasi Karawang — bengkel variasi mobil: audio, lighting, kaca film, interior, eksterior &amp; custom modifikasi. Booking online, tanpa antre.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stack('styles')
</head>
<body>

<header class="navbar">
  <div class="wrap">
    <a href="{{ route('home') }}" class="brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo Ritz Variasi" onerror="this.style.display='none'">
      <span class="brand-text">RITZ VARIASI<span>Audio, Lighting &amp; Accessories — Karawang</span></span>
    </a>

    <nav class="nav-links" id="navLinks">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
      <a href="{{ route('layanan.index') }}" class="{{ request()->routeIs('layanan.*') ? 'active' : '' }}">Layanan</a>
      <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a>
      <a href="{{ route('portofolio.index') }}" class="{{ request()->routeIs('portofolio.*') ? 'active' : '' }}">Portofolio</a>
      <a href="{{ route('artikel.index') }}" class="{{ request()->routeIs('artikel.*') ? 'active' : '' }}">Artikel</a>
      <a href="{{ route('kontak.index') }}" class="{{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a>
      @auth
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard*') ? 'active' : '' }}">Booking Saya</a>
      @endauth
    </nav>

    <div class="nav-actions">
      @auth
        <span class="nav-user">Hai, {{ Str::before(auth()->user()->name, ' ') }}</span>
        <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm"><span class="btn-label">Booking</span></a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
          @csrf
          <button type="submit" class="btn btn-outline btn-sm">Keluar</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline btn-sm">Masuk</a>
        <a href="{{ route('register') }}" class="btn btn-primary btn-sm"><span class="btn-label">Daftar</span></a>
      @endauth
      <button class="nav-toggle" id="navToggle" aria-label="Buka menu">&#9776;</button>
    </div>
  </div>
</header>

<main>
  @if (session('success'))
    <div class="wrap" style="padding-top:24px;">
      <div class="alert alert-success">{{ session('success') }}</div>
    </div>
  @endif
  @if ($errors->any())
    <div class="wrap" style="padding-top:24px;">
      <div class="alert alert-error">
        @foreach ($errors->all() as $error)
          {{ $error }}@if(!$loop->last)<br>@endif
        @endforeach
      </div>
    </div>
  @endif

  @yield('content')
</main>

<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div>
        <span class="brand-text">RITZ VARIASI</span>
        <p style="margin-top:12px; font-size:.85rem;">Bengkel variasi mobil terpercaya di Karawang — audio, lighting, kaca film, interior, eksterior, hingga custom modifikasi.</p>
      </div>
      <div>
        <h4>Navigasi</h4>
        <ul>
          <li><a href="{{ route('layanan.index') }}">Layanan</a></li>
          <li><a href="{{ route('produk.index') }}">Produk</a></li>
          <li><a href="{{ route('portofolio.index') }}">Portofolio</a></li>
          <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
        </ul>
      </div>
      <div>
        <h4>Sosial Media</h4>
        <ul>
          <li><a href="https://wa.me/6281511626888" target="_blank" rel="noopener">WhatsApp — 0815-1162-6888</a></li>
          <li><a href="https://facebook.com/RitzVariasi" target="_blank" rel="noopener">Facebook — Ritz Variasi</a></li>
          <li><a href="https://instagram.com/ritzvariasi" target="_blank" rel="noopener">Instagram — @ritzvariasi</a></li>
          <li><a href="https://tiktok.com/@ritz.audioshoplighting" target="_blank" rel="noopener">TikTok — @ritz.audioshoplighting</a></li>
        </ul>
      </div>
      <div>
        <h4>Jam Operasional</h4>
        <ul>
          <li style="color:var(--text-mid); font-size:.85rem;">Senin – Sabtu: 08.00 – 17.00</li>
          <li style="color:var(--text-mid); font-size:.85rem;">Minggu &amp; Libur: Tutup</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; {{ date('Y') }} Ritz Variasi Karawang. Semua hak dilindungi.</span>
      <span><a href="{{ route('admin.login') }}" style="color:var(--text-low); font-size:.75rem;">Admin</a></span>
    </div>
  </div>
</footer>

<script>
  document.getElementById('navToggle')?.addEventListener('click', function () {
    document.getElementById('navLinks').classList.toggle('open');
  });
</script>
@stack('scripts')
</body>
</html>
