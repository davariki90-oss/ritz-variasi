<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Ritz Variasi Karawang') — Audio, Lighting &amp; Accessories</title>
<meta name="description" content="Ritz Variasi Karawang — bengkel variasi mobil: audio, lighting, kaca film, interior, eksterior &amp; custom modifikasi. Booking online, tanpa antre.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Tambahan Ikon FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@stack('styles')
</head>
<body>

<header class="navbar">
  <div class="wrap">
    <a href="{{ route('home') }}" class="brand">
      <img src="{{ asset('images/logo-ritz-baru.png') }}" alt="Logo Ritz Variasi" style="height: 40px; width: auto; margin-bottom: 10px;">
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

<footer class="modern-footer">
    <div class="wrap">
        <div class="footer-main">
            <!-- Kolom 1: Brand & Sosmed -->
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="brand" style="margin-bottom: 16px;">
                    <img src="{{ asset('images/logo-ritz-baru.png') }}" alt="Logo Ritz Variasi" style="height: 50px; width: auto; margin-bottom: 12px;" onerror="this.style.display='none'">
                    <span class="brand-text">RITZ VARIASI</span>
                </a>
                <p>Bengkel variasi mobil terpercaya di Karawang. Audio, Lighting, Kaca Film, Interior, & Custom Modifikasi.</p>
                
                <div class="footer-socials">
                    <a href="https://wa.me/6281511626888" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://facebook.com/RitzVariasi" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://instagram.com/ritzvariasi" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://tiktok.com/@ritz.audioshoplighting" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('layanan.index') }}">Layanan</a></li>
                    <li><a href="{{ route('produk.index') }}">Produk</a></li>
                    <li><a href="{{ route('portofolio.index') }}">Portofolio</a></li>
                    <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                    <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Layanan (Shortcut) -->
            <div class="footer-links">
                <h4>Layanan Kami</h4>
                <ul>
                    <li><a href="#">Audio & Sound System</a></li>
                    <li><a href="#">Lampu & Lighting</a></li>
                    <li><a href="#">Kaca Film</a></li>
                    <li><a href="#">Interior & Eksterior</a></li>
                    <li><a href="#">Custom Modifikasi</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak Singkat -->
            <div class="footer-contact">
                <h4>Hubungi Kami</h4>
                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Jl. Raya Syekh Quro No.101, Palumbonsari, Karawang.</span>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>0815-1162-6888</span>
                </div>
                <a href="https://wa.me/6281511626888" class="btn-footer-wa" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i> Chat Admin
                </a>
            </div>
        </div>

        <!-- Bagian Bawah (Copyright) -->
        <div class="footer-bottom">
            <div class="footer-copy">
                <span>&copy; {{ date('Y') }} Ritz Variasi Karawang. All rights reserved.</span>
                <span class="legal-links">
                    <a href="/kebijakan-privasi">Kebijakan Privasi</a>
                    <span class="separator">•</span>
                    <a href="/syarat-ketentuan">Syarat & Ketentuan</a>
                </span>
            </div>
            <a href="{{ route('admin.login') }}" title="Admin Area" class="admin-lock">
                <i class="fa-solid fa-lock"></i>
            </a>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281511626888?text=Halo%20Ritz%20Variasi,%20saya%20mau%20tanya-tanya%20soal%20modifikasi%20mobil." class="floating-wa" target="_blank" rel="noopener" title="Chat WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<script>
  document.getElementById('navToggle')?.addEventListener('click', function () {
    document.getElementById('navLinks').classList.toggle('open');
  });
</script>
@stack('scripts')
</body>
</html>
