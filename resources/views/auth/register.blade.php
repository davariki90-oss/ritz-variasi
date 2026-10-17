@extends('layouts.app')
@section('title', 'Daftar Akun')

@section('content')
<section class="section">
  <div class="wrap">
    <div class="form-card notch">
      <h2 class="text-center">Buat Akun Baru</h2>
      <p class="text-center" style="margin-bottom:26px;">Sudah punya akun? <a href="{{ route('login') }}" style="color:var(--orange-400);">Masuk di sini</a></p>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="field">
          <label for="name">Nama Lengkap</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="field">
          <label for="no_hp">No. HP / WhatsApp</label>
          <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
        </div>
        <div class="field-row">
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div class="hint">Minimal 6 karakter</div>
          </div>
          <div class="field">
            <label for="password_confirmation">Ulangi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
      </form>
    </div>
  </div>
</section>
@endsection
