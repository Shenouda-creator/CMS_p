<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav"
                class="nav-content collapse {{ Route::is('dashboard.permissions.*')
                || Route::is('dashboard.roles.*')
                || Route::is('dashboard.users.*')
                ? 'show': '' }} "data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ route('dashboard.permissions.index') }}">
                        <i class="bi bi-circle"></i><span>Permissions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.roles.index') }}">
                        <i class="bi bi-circle"></i><span>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.users.index') }}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#articles-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Articles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="articles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('dashboard.articles.index') }}">
                        <i class="bi bi-circle"></i><span>All Articles</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Articles Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li><!-- End Settings Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-bell"></i>
                <span>Notifications</span>
            </a>
        </li><!-- End Notifications Nav -->



    </ul>

</aside><!-- End Sidebar-->
