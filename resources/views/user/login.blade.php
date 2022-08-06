<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bodaboda Association of kenya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.3.1-0/css/bootstrap-grid.min.css" integrity="sha512-NyrvF94auQJYFbBZNKiGXkBCzJoXcpLhVBlMUyUfyDvNwMiB6l5XLBAw+wNFyAg0Jr++YMt7bHAOrRt37/lLDA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            @if (Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{Session::get('success')}}
            </div>
            @endif
           @if (Session::has('errors'))
           <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert">×</button>
             {{Session::get('errors')}}
           </div>

           @endif


            <div class="text-center mt-4 name"> Login In to Your Account</div>
            <form action="{{ url('verify_user') }}" method="post" class="p-3 mt-3">
                @csrf
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> <input type="email" name="email" id="userName" placeholder="Email">
                 </div>
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password">
                 </div>

                    <button type="submit" name="login" class="btn mt-3">Login</button>

            </form>
            <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="{{url('register')}}">Sign up</a> </div>
            <div class="text-center fs-6 mt-3"> <a href="{{url('/')}}">Home</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.3.1-0/js/bootstrap.min.js" integrity="sha512-OUTo0k3tQaY48oUR7082t08hnB63qZ/LmOOUma44cJ8zVFEd/1fpsQQtKOErwbQvUzRiTg1RIxKChJ/yV2Cs7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
