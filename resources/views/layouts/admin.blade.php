<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Dashboard') — Admin Ritz Variasi</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stack('styles')
</head>
<body>

<div class="admin-shell">
  <aside class="admin-sidebar">
    <div class="brand">
      <span class="brand-text">RITZ VARIASI<span>Admin Panel</span></span>
    </div>
    <nav class="admin-nav">
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">Produk</a>
      <a href="{{ route('admin.layanan.index') }}" class="{{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">Layanan</a>
      <a href="{{ route('admin.booking.index') }}" class="{{ request()->routeIs('admin.booking.*') ? 'active' : '' }}">Booking</a>
      <a href="{{ route('admin.customer.index') }}" class="{{ request()->routeIs('admin.customer.*') ? 'active' : '' }}">Customer</a>
    </nav>
    <form action="{{ route('admin.logout') }}" method="POST" style="margin-top:30px; padding:0 6px;">
      @csrf
      <button type="submit" class="btn btn-outline btn-sm btn-block">Keluar</button>
    </form>
  </aside>

  <div class="admin-main">
    <div class="admin-topbar">
      <h2 class="mb-0">@yield('page-title', 'Dashboard')</h2>
      <span class="text-muted" style="font-size:.85rem;">Admin Panel</span>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
      <div class="alert alert-error">
        @foreach ($errors->all() as $error)
          {{ $error }}@if(!$loop->last)<br>@endif
        @endforeach
      </div>
    @endif

    @yield('content')
  </div>
</div>

@stack('scripts')
</body>
</html>
