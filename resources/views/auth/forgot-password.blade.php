<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">  
    <link href="stylelogin.css" rel="stylesheet">
    <link type="image/x-icon" href="img/coba23.ico" rel="icon">
    <link type="image/x-icon" href="img/coba23.ico" rel="shortcut icon">
    <title>Forgot Password | Senat FH</title>
  </head>

  <body>

    <div class="container" id="container">

      <div class="form">

        <h2 class="forgot">Forgot Your Password ? </h2>
        <p class="enter">Enter email to request password reset</p>
        <form action ="{{ route("passwordPost.request") }}" method="post">
          @csrf
          <label class="email" class="form-label" for="email">Email</label>
          <input class="form-control" name="email" type="email">
          <input class="btn btn-primary w-100 mt-3" type="submit" value="Request Password Reset">
          @if ($errors->any())
            <div class="email">
              @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          @endif
          @if (session()->has("status"))
            <div class="email">
              {{ session()->get("status") }}
            </div>
          @endif
        </form>
      </div>

  </body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      @if(session('success'))
        iziToast.success({
          title: 'Success',
          message: '{{ session('success') }}',
          position: 'topRight'
        });
      @endif

      @if(session('error'))
        iziToast.error({
          title: 'Error',
          message: '{{ session('error') }}',
          position: 'topRight'
        });
      @endif
    });
  </script>
