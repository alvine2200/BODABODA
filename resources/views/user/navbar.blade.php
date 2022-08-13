 <!--header starts-->
	<header>

		<a href="{{url('/')}}"  class="logo"><img src="images/bak logo.png" alt="logo"><p>BAK</p></a>

		<nav class="navbar">
			<a class="active" href="{{ url('/')}}">home</a>
            <a href="{{url('verify')}}">Verify Riders</a>
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

	     <div class="icons">
			<em class="fas fa-bars" id="menu-bars"></em>
		</div>

	</header>
 <!--header ends-->

    <!--search form starts-->
    <form action="" method="post" id="search-form">
        <input type="search" placeholder="search here..." id="search-box" name="">
        <label for="search-box" class="fas fa-search"></label>
        <em class="fas fa-times" id="close"></em>
    </form>
    <!--search form ends-->



