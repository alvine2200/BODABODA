<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

             @if (Auth::user()->is_admin == true)
                    <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{url('dashboard')}}"><em class="la la-dashboard"></em>
                        <span> Dashboard</span> </a>

                </li>

                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li class="submenu">

                    <li><a href="{{url('applications')}}">
                        <em class="la la-border-all"></em>
                                <span>Apply</span>
                        </a>
                    </li>

                <li class="menu-title">
                    <span>Users</span>
                </li>
                <li class="submenu">

                <li><a href="{{url('users_index')}}">
                    <em class="la la-users"></em>
                            <span>Users</span>
                    </a>
                </li>


                <!--check auth-->
                <li class="menu-title">
                    <span>Transactions</span>
                </li>
                <li class="submenu">

                <li><a href="{{url('transactions')}}"> <em class="fa fa-briefcase"></em>
                            <span>Transactions </span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Forums</span>
                </li>
                <li>
                    <a href="{{url('forums')}}"><em class="la la-comment"></em>
                        <span>Forums </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('view_forums')}}"><em class="la la-comment"></em>
                        <span>View Forums </span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Support</span>
                </li>
                <li>
                    <a href="{{url('support')}}"><em class="fa fa-tasks"></em>
                        <span>Support</span>
                    </a>
                </li>
                <li class="menu-title">
                    <span>Settings</span>
                </li>
                <li>
                    <a href="{{url('profile')}}"><em class="la la-user"></em>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('logout')}}"><em class="la la-lock"></em>
                        <span>Log Out</span>
                    </a>
                </li>
             @else


                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{url('dashboard')}}"><em class="la la-dashboard"></em>
                         <span> Dashboard</span> </a>

                </li>

                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li class="submenu">

                    <li><a href="{{url('apply')}}"> <em class="la la-border-all"></em>
                                <span>Apply</span>
                        </a>
                    </li>

                <!--check auth-->
                <li class="menu-title">
                    <span>Transactions</span>
                </li>
                <li class="submenu">

                <li><a href="{{url('transactions')}}"><em class="fa fa-briefcase"></em>
                        <span>Transactions</span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Forums</span>
                </li>

                <li>
                    <a href="{{url('forums')}}"><em class="la la-comment"></em>
                        <span>Forums </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('view_forums')}}"><em class="la la-comment"></em>
                        <span>View Forums </span>
                    </a>
                </li>


                <li class="menu-title">
                    <span>Support</span>
                </li>
                <li>
                    <a href="{{url('support')}}"><em class="fa fa-question"></em>
                        <span>Support</span>
                    </a>
                </li>
                <li class="menu-title">
                    <span>Settings</span>
                </li>
                <li>
                    <a href="{{url('profile')}}"><em class="la la-user"></em>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('logout')}}"><em class="la la-lock"></em>
                        <span>Log Out</span>
                    </a>
                </li>

             @endif

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
