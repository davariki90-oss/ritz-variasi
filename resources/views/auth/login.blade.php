@extends('layouts.app')
@section('title', 'Masuk')

@section('content')
<section class="section">
  <div class="wrap">
    <div class="form-card notch">
      <h2 class="text-center">Masuk ke Akun</h2>
      <p class="text-center" style="margin-bottom:26px;">Belum punya akun? <a href="{{ route('register') }}" style="color:var(--orange-400);">Daftar di sini</a></p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="field" style="display:flex; align-items:center; gap:8px;">
          <input type="checkbox" id="remember" name="remember" style="width:auto;">
          <label for="remember" style="margin:0;">Ingat saya</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>
    </div>
  </div>
</section>
@endsection
