 <!--header starts-->

	<header>

		<a href="{{url('/')}}"  class="logo"><img src="images/bak logo.png"><p>BAK</p></a>

		<nav class="navbar">
			<a class="active" href="{{ url('/')}}">home</a>
            <a href="{{url('about')}}">About Us</a>
			<a href="{{url('contact')}}">Contact Us</a>
			<a href="{{url('login')}}">Login</a>
			<a href="{{url('register')}}">Register</a>
		</nav>

        @if (Session::has('success'))
            <div style="color:green;" class="sucess">
                {{Session::get('success')}}
            </div>
        @endif
        
        <span class="error">
            @if ($errors->any())
            <div style="margin-left:50px; font-size:16px; color:red;"  class="alert alert-danger">
                
                    @foreach ($errors->all() as $message)
                        <span style="color:red">{{ $message }}, Not submitted</span>
                    @endforeach
                
            </div>
           @endif
       </span>


       <!-- <a href="#"><i class="fas fa-bars"></i></a> -->

	     <div class="icons">
			<i class="fas fa-bars" id="menu-bars"></i>
			<i class="fas fa-search" id="search-icon"></i>
		</div>

	</header>
 <!--header ends-->

    <!--search form starts-->
    <form action="" method="post" id="search-form">
        <input type="search" placeholder="search here..." id="search-box" name="">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!--search form ends-->



