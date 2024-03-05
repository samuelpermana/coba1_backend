<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="stylelogin.css">
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
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif

        <h2>Reset Your Password </h2>
        <form action ="{{ route('passwordResetPost.request', ['token' => $token]) }}" method="post">
            @csrf
            <input type="text" hidden value="{{$token}}">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password">
            <!-- <label for="confirm_password" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" name="confirm_password"> -->
            <input type="submit" value="Request Password Reset" class="btn btn-primary w-100 mt-3">
        </form>
    </div>

    
</body>
 
</html>
