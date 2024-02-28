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

    <div class="container" id="container">
        
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

        <h2>Forgot Your Password ? </h2>
        <p>Enter email to request password reset</p>
        <form action ="{{ route('passwordPost.request') }}" method="post">
            @csrf
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <input type="submit" value="Request Password Reset" class="btn btn-primary w-100 mt-3">
        </form>
    </div>

    
</body>
 
</html>
