<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BodaBoda Association of Kenya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    
    <div class="container">
        <div class="wrapper">
            <div class="text-center mt-4 name"> Are you a rider? Register today!</div>
            <form action="{{ url('login_user') }}" method="post" class="p-3 mt-3">
                @csrf
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="fullname" id="userName" placeholder="Fullname">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="username" id="userName" placeholder="Username">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="email" name="email" id="userName" placeholder="email">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="id_number" id="userName" placeholder="National id number">
                 </div>
                 
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="county" id="userName" placeholder="County">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="subcounty" id="userName" placeholder="Subcounty">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="location" id="userName" placeholder="location">
                 </div>
                 <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="input" name="village" id="userName" placeholder="Village">
                 </div>
                <!-- <div class="form-field d-flex align-items-center">
                     <span class="fas fa-envelope"></span> 
                     <input type="file" name="avatar" id="userName" placeholder="Avatar">
                 </div>
                          -->
                <div class="form-field d-flex align-items-center">
                     <span class="fas fa-key"></span> 
                     <input type="password" name="password" id="pwd" placeholder="Password">
                 </div>

                    <button type="submit" name="login" class="btn mt-3">Register</button>

            </form>
            <div class="text-center fs-6">  <a href="{{url('login')}}">Sign in</a> </div>
        </div>
    </div>

</body>
</html>
