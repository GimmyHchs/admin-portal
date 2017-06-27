<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Something</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Something</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Something</a>
        </li>
    </ul>

    <!-- right items -->
    <ul class="nav navbar-nav ml-auto" style="margin-right:10px;">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="fa fa-bell" aria-hidden="true"></i><span class="badge badge-pill badge-danger">5</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="d-md-down-none">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>

                <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages</a>
                <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks</a>

                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>

                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                <div class="divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
    <!-- right items -->
</header>
