<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="stylelogin.css" rel="stylesheet">
    <link type="image/x-icon" href="img/coba23.ico" rel="icon">
    <link type="image/x-icon" href="img/coba23.ico" rel="shortcut icon">
    <title>Login Page | Senat FH</title>
  </head>

  <body>

    <div class="container" id="container">
      <span class="blur"></span>
      <span class="blur"></span>
      <div class="form-container sign-in">
        <form method="POST" action="{{ route("login-users") }}">
          @csrf
          <h1>Sign In</h1>
          <div class="social-icons"></div>
          <span>or use your email password</span>
          <input name="email" type="email" value="{{ old("email") }}" placeholder="Email" required />
          <input name="password" type="password" placeholder="Password" minlength="8" required>
          @error("email")
            <span class="error">{{ $message }}</span>
          @enderror
          @error("password")
            <span class="error">{{ $message }}</span>
          @enderror
          <a href="{{ route("password.request") }}">Forget Your Password?</a>
          <button type="submit">Sign In</button>
          @if (session("status"))
            <span class="error">{{ session("status") }}</span>
          @endif
        </form>
      </div>

      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-right">
            <div class="img">
              <img src="/img/coba12.png">
            </div>
            <h1>Welcome Admin</h1>
            <p>Enter your personal details to use all of site features</p>
          </div>
        </div>
      </div>
    </div>

  </body>

</html>
