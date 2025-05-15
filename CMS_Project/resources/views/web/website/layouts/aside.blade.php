<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('web.home') }}">
                <i class="bi bi-grid"></i>
                <span>S-blog</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#articles-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Articles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="articles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('web.articles.index') }}">
                        <i class="bi bi-circle"></i><span>All Articles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.categories.index') }}">
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

    </ul>

</aside><!-- End Sidebar-->
