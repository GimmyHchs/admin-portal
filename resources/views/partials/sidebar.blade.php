<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-title">
                Member Manage
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user" aria-hidden="true"></i>Portal Accounts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> User List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
