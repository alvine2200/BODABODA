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
                    <a href="#"><i class="la la-dashboard"></i>
                        <span> Dashboard</span> </a>

                </li>

                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li class="submenu">

                    <li><a href="{{url('apply')}}"> <i
                                class="la la-border-all"></i>
                                <span>Apply</span>
                        </a>
                    </li>

                <li class="menu-title">
                    <span>Users</span>
                </li>
                <li class="submenu">

                <li><a href="#"> <i
                            class="la la-border-all"></i>
                            <span>All Users</span>
                    </a>
                </li>

                
                <!--check auth-->
                <li class="menu-title">
                    <span>Transactions</span>
                </li>
                <li class="submenu">

                <li><a href="#"> <i
                            class="la la-border-all"></i>
                            <span>Transactions Records</span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Queries</span>
                </li>
                <li>
                    <a href="#"><i class="fa fa-tasks"></i>
                        <span>All queries</span>
                    </a>
                </li> 
             @else
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="#"><i class="la la-dashboard"></i>
                         <span> Dashboard</span> </a>

                </li>

                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li class="submenu">

                    <li><a href="{{url('apply')}}"> <i
                                class="la la-border-all"></i>
                                <span>Apply</span>
                        </a>
                    </li>
               
                <!--check auth-->
                <li class="menu-title">
                    <span>Transactions</span>
                </li>
                <li class="submenu">

                <li><a href="#"> 
                    <i class="la la-border-all"></i>
                        <span>Transactions Records</span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>Support section</span>
                </li>
                <li>
                    <a href="#"><i class="fa fa-question"></i>
                        <span>Support section</span> 
                    </a>
                </li>

             @endif
             
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
