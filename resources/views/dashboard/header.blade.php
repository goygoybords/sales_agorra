<!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="{{ url('/dashboard') }}" class="logo">
                <div class="logo1">
                    <img src="{{ URL::asset('img/logo.png') }}">
                </div>
            </a>
            <!-- <div class="nav notify-row" id="top_menu"></div> -->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li><input type="text" class="form-control search" placeholder="Search"></li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ URL::asset('img/avatar1_small.jpg') }} ">
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->