<!-- Top Navigation Bar -->
<div class="container">

    <!-- Only visible on smartphones, menu toggle -->
    <ul class="nav navbar-nav">
        <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
    </ul>

    <!-- Logo -->
    <a class="navbar-brand" href="/">
        <img src="/theme/assets/img/logo.png" alt="logo" />
        <strong>ME</strong>LON
    </a>
    <!-- /logo -->

    <!-- Sidebar Toggler -->
    <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
        <i class="icon-reorder"></i>
    </a>
    <!-- /Sidebar Toggler -->

    <!-- Top Left Menu -->
    <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
        <li>
            <a href="{{ route('home') }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }} ">
                Kontak
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}">
                Profil
            </a>
        </li>
        <li>
            <a href="{{ route('change_password') }}">
                Ubah Password
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Dropdown
                <i class="icon-caret-down small"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> Example #1</a></li>
                <li><a href="#"><i class="icon-calendar"></i> Example #2</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-tasks"></i> Example #3</a></li>
            </ul>
        </li>
    </ul>
    <!-- /Top Left Menu -->

    <!-- Top Right Menu -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Notifications -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-warning-sign"></i>
                <span class="badge">5</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li class="title">
                    <p>You have 5 new notifications</p>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="label label-success"><i class="icon-plus"></i></span>
                        <span class="message">New user registration.</span>
                        <span class="time">1 mins</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="label label-danger"><i class="icon-warning-sign"></i></span>
                        <span class="message">High CPU load on cluster #2.</span>
                        <span class="time">5 mins</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="label label-success"><i class="icon-plus"></i></span>
                        <span class="message">New user registration.</span>
                        <span class="time">10 mins</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                        <span class="message">New items are in queue.</span>
                        <span class="time">25 mins</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="label label-warning"><i class="icon-bolt"></i></span>
                        <span class="message">Disk space to 85% full.</span>
                        <span class="time">55 mins</span>
                    </a>
                </li>
                <li class="footer">
                    <a href="javascript:void(0);">View all notifications</a>
                </li>
            </ul>
        </li>

        <!-- Messages -->
        <li class="dropdown hidden-xs hidden-sm">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-envelope"></i>
                <span class="badge">1</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li class="title">
                    <p>You have 3 new messages</p>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="photo"><img src="/theme/assets/img/demo/avatar-1.jpg" alt="" /></span>
								<span class="subject">
									<span class="from">Bob Carter</span>
									<span class="time">Just Now</span>
								</span>
								<span class="text">
									Consetetur sadipscing elitr...
								</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="photo"><img src="/theme/assets/img/demo/avatar-2.jpg" alt="" /></span>
								<span class="subject">
									<span class="from">Jane Doe</span>
									<span class="time">45 mins</span>
								</span>
								<span class="text">
									Sed diam nonumy...
								</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="photo"><img src="/theme/assets/img/demo/avatar-3.jpg" alt="" /></span>
								<span class="subject">
									<span class="from">Patrick Nilson</span>
									<span class="time">6 hours</span>
								</span>
								<span class="text">
									No sea takimata sanctus...
								</span>
                    </a>
                </li>
                <li class="footer">
                    <a href="javascript:void(0);">View all messages</a>
                </li>
            </ul>
        </li>

        <!-- User Login Dropdown -->
        <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
                <i class="icon-male"></i>
                <span class="username">{{ @Auth::user()->name }}</span>
                <i class="icon-caret-down small"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('profile') }}"><i class="icon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="icon-calendar"></i> My Calendar</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="$('#logout-form').submit()"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- /user login dropdown -->
    </ul>
    <!-- /Top Right Menu -->
</div>
<!-- /top navigation bar -->
{!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
{!! Form::close() !!}