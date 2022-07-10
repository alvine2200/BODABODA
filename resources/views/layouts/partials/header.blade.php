<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left" style="background:white">
        <a href="#" class="logo">
            <img id="logo_img" src="img/mainlogo.png" height="60" width="40" alt="Logo">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">

    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" style="color: black" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->

        <!-- /Search -->

        <!-- Flag -->

        <!-- /Flag -->

        <!-- Notifications -->

        <!-- /Notifications -->



        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                <span class="status online"></span></span>
                <span>Username here</span>
            </a>

            <div class="dropdown-menu">
                <!--
             @if(isset(Auth::user()->employee))

                <a class="dropdown-item" style=" " href="{{route('employees.show', Auth::user()->employee)}}">My Profile</a>
                @endif
                -->

                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="#" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <p>You are logged in as admin</p>
            </div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<!-- /Header -->
