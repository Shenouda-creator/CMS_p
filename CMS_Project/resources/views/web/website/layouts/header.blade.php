<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center shadow-sm"
    style="background: linear-gradient(90deg, #f8fafc 80%, #e0e7ff 100%);">
    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                weekday: 'long',
                month: 'long',
                day: 'numeric'
            };
            const date = now.toLocaleDateString(undefined, options);
            const time = now.toLocaleTimeString();
            document.getElementById('live-date').textContent = date;
            document.getElementById('live-time').textContent = time;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>

    <div class="d-flex justify-content-between align-items-center w-100">
        <a href="{{ route('dashboard.home') }}" class="logo d-flex align-items-center me-3">
            <img src="{{ asset('dashboard/assets/img/logo.png') }}" alt="" style="height: 40px;">
            <span class="d-none d-lg-block fw-bold fs-4 ms-2" style="color: #667eea;">{{ env('APP_NAME') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn d-lg-none ms-2"></i>

        <div class="live-clock ms-auto me-4 d-none d-md-block">
            <span id="live-date" class="fw-semibold text-primary"></span>
            <span class="mx-2 text-muted">|</span>
            <span id="live-time" class="fw-semibold text-primary"></span>
        </div>

        <div class="search-bar me-3 d-none d-md-block">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" class="form-control rounded-pill shadow-sm"
                    style="min-width: 180px;" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search" class="btn btn-link text-primary"><i
                        class="bi bi-search"></i></button>
            </form>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center mb-0">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <!-- Notification Icon -->
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link nav-icon position-relative" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.7rem;" id="notification-badge">
                            {{ auth()->user()->unreadNotifications->count() }}
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications shadow">
                        <li class="dropdown-header">
                            You have {{ auth()->user()->unreadNotifications->count() }} new notifications
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li class="notification-item" id="notification-{{ $notification->id }}"
                                onclick="markAsRead({{ $notification->id }})">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h6>New Comment</h6>
                                    <p>{{ $notification->data['message'] }}</p>
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                </div>
                            </li>
                        @endforeach

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="#">View all notifications</a>
                        </li>
                    </ul>
                </li>

                <script>
                    function markAsRead(notificationId) {
                        axios.post('/notifications/' + notificationId + '/read')
                            .then(response => {
                                const notificationElement = document.getElementById('notification-' + notificationId);
                                notificationElement.style.display = 'none';
                                const unreadCount = document.querySelectorAll('.notification-item').length - 1;
                                const badge = document.getElementById('notification-badge');
                                badge.textContent = unreadCount;
                                if (unreadCount === 0) {
                                    badge.style.display = 'none';
                                }
                            })
                            .catch(error => {
                                console.error('Error marking notification as read', error);
                            });
                    }
                </script>
                <!-- End Notification Icon -->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0"
                        href="{{ route('web.profile.index') }}" data-bs-toggle="dropdown">
                        <img src="{{ asset('dashboard/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle border border-2 border-primary shadow-sm"
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-md-block dropdown-toggle ps-2 fw-semibold text-dark">
                            {{ Auth::user()->name ?? 'User' }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile shadow">
                        <li class="dropdown-header text-center">
                            <img src="{{ asset('dashboard/assets/img/profile-img.jpg') }}" alt="Profile"
                                class="rounded-circle mb-2" style="width: 60px; height: 60px;">
                            <h6 class="mb-0">{{ Auth::user()->name ?? 'User' }}</h6>
                            <span class="text-muted small">{{ Auth::user()->email ?? '' }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('web.profile.index') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
