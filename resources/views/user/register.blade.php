<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BodaBoda Association of Kenya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
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
            @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="text-center mt-4 name"> Are you a rider? Register today!</div>
            <form action="/post_user" method="post" class="p-3 mt-3">
                @csrf
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-person"></span>
                     <input type="text" name="fullname" id="fullname" placeholder="Fullname">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-person"></span>
                     <input type="text" name="username" id="username" placeholder="Username">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span>
                     <input type="email" name="email" id="email" placeholder="email">
                 </div>
                 <div class="form-field d-flex align-items-center">
                    <span class="fas fa-phone"></span>
                    <input type="number" name="phone" id="phone" placeholder="Phone Number">
                </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fa-solid fa-id-card"></span>
                     <input type="number" name="id_number" id="id_number" placeholder="National id number">
                 </div>

                 <div class="form-field d-flex align-items-center">
                     <span class="fa-solid fa-earth-africa"></span>
                     <input type="input" name="county" id="county" placeholder="County">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fa-solid fa-earth-africa"></span>
                     <input type="input" name="subcounty" id="subcounty" placeholder="Subcounty">
                 </div>
                 <div class="form-field d-flex align-items-center">
                    <span class="fa-solid fa-earth-africa"></span>
                    <input type="input" name="district" id="district" placeholder="District">
                </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fa-solid fa-earth-africa"></span>
                     <input type="input" name="location" id="location" placeholder="location">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-home"></span>
                     <input type="input" name="village" id="village" placeholder="Village">
                 </div>
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-key"></span>
                     <input type="password" name="password" id="pwd" placeholder="Password">
                 </div>
                 <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password_confirmation" id="pwd_confm" placeholder="Password Confirmation">
                 </div>

                    <button type="submit"  class="btn mt-3">Register</button>

            </form>
            <div class="text-center fs-6">  <a href="{{url('login')}}">Sign in</a> or  <a href="{{url('/')}}">Home</a> </div>

        </div>
    </div>

</body>
</html>
