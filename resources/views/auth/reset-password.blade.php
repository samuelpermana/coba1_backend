<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="stylelogin.css" rel="stylesheet">
    <link type="image/x-icon" href="img/coba23.ico" rel="icon">
    <link type="image/x-icon" href="img/coba23.ico" rel="shortcut icon">
    <title>Forgot Password | Senat FH</title>
  </head>

  <body>

    <div class="container-reset" id="container">

      <div class="form">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @if (session()->has("status"))
          <div class="alert alert-success">
            {{ session()->get("status") }}
          </div>
        @endif

        <h2>Reset Your Password </h2>
        <form action ="{{ route("passwordResetPost.request", ["token" => $token]) }}" method="post">
          @csrf
          <input type="text" value="{{ $token }}" hidden>
          <label class="form-label" for="email">Email</label>
          <input class="form-control" name="email" type="email">
          <label class="form-label" for="new_password">New Password</label>
          <input class="form-control" name="new_password" type="password">
          <!-- <label class="form-label" for="confirm_password">Confirm New Password</label>
            <input class="form-control" name="confirm_password" type="password"> -->
          <input class="btn btn-primary w-100 mt-3" type="submit" value="Request Password Reset">
        </form>
      </div>

  </body>

</html>
