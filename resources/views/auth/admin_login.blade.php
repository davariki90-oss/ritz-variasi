<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin — Ritz Variasi</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-auth-shell">
  <div class="form-card notch">
    <div class="text-center" style="margin-bottom:20px;">
      <span class="brand-text">RITZ VARIASI<span>Admin Panel</span></span>
    </div>
    <h2 class="text-center">Login Admin</h2>

    @if ($errors->any())
      <div class="alert alert-error">
        @foreach ($errors->all() as $error)
          {{ $error }}@if(!$loop->last)<br>@endif
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}" style="margin-top:18px;">
      @csrf
      <div class="field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Masuk sebagai Admin</button>
    </form>

    <p class="text-center" style="margin-top:20px;"><a href="{{ route('home') }}" style="color:var(--text-low); font-size:.82rem;">&larr; Kembali ke website</a></p>
  </div>
</div>

</body>
</html>
