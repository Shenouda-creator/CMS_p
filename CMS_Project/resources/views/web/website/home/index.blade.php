<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .topbar {
            background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%);
            color: white;
            padding: 12px 0;
        }

        .site-title {
            text-align: center;
            padding: 48px 0 16px;
        }

        .site-title h1 {
            font-size: 3rem;
            font-weight: bold;
            letter-spacing: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-categories {
            background-color: #f1f5f9;
            padding: 12px 0;
            text-align: center;
        }

        .nav-categories a {
            margin: 0 12px;
            font-weight: 500;
            color: #4e54c8;
            text-decoration: none;
            transition: color 0.2s;
        }

        .nav-categories a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .welcome-hero {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border-radius: 1.5rem;
            padding: 40px 30px;
            margin-bottom: 32px;
            text-align: center;
            box-shadow: 0 4px 24px rgba(102, 126, 234, 0.08);
        }

        .article-card {
            border-radius: 1.5rem;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.08);
            transition: box-shadow 0.2s;
            background: #fff;
        }

        .article-card:hover {
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.15);
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: bold;
            background: linear-gradient(90deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-box {
            background-color: white;
            padding: 18px;
            margin-bottom: 24px;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .tag-badge {
            margin: 5px 5px 0 0;
        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center px-4">
        <div>
            <span class="fw-bold fs-5">VEL CMS</span>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->hasRole('admin')||Auth::user()->hasRole('editor'))
                        <a href="{{ route('dashboard.home') }}" class="btn btn-primary btn-sm me-2">Dashboard</a>
                        @else
                            <a href="{{ route('web.home') }}" class="btn btn-primary btn-sm me-2">Home</a>
                    @endif

                    <
                @else
                    <a href="{{ route('login') }}" class="btn btn-success btn-sm me-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
                    @endif
                @endauth
            @endif
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="20" /></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" width="20" class="ms-2" /></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" width="20" class="ms-2" /></a>
        </div>
    </div>

    <!-- Site Title -->
    <div class="site-title">
        <h1>VEL</h1>
        <p class="text-muted fs-5">Welcome to our content platform. Discover, read, and share amazing articles!</p>
    </div>
    <!-- Welcome Hero Section -->
    <div class="container mt-4">
        <div class="welcome-hero mb-5">
            <h2 class="fw-bold mb-3">Welcome to VEL CMS 👋</h2>
            <p class="fs-5 mb-0">Your gateway to insightful articles, trending topics, and top writers. Start exploring now!</p>
        </div>
        <div class="row">
            <!-- Left: Featured & Recent Articles -->
            <div class="col-md-8">
                <h4 class="mb-4 fw-bold">Latest Articles</h4>
                <div class="row g-4">
                    @forelse($articles as $article)
                        <div class="col-md-6">
                            <div class="article-card p-3 h-100 d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-folder"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                    </span>
                                </div>
                                <div class="article-title mb-1">{{ $article->title }}</div>
                                <div class="text-muted small mb-2">
                                    <i class="bi bi-person"></i> {{ $article->user->name ?? 'Unknown Author' }}
                                    &nbsp;|&nbsp;
                                    <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                </div>
                                <div class="mb-2 flex-grow-1">
                                    {{ Str::limit($article->content, 80) }}
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('web.articles.show', $article->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center rounded-pill">No articles published yet.</div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="col-md-4">
                <div class="sidebar-box">
                    <h5>About Us</h5>
                    <p>Discover a world of knowledge and inspiration. Our platform connects readers with top writers and trending topics every day.</p>
                </div>
                <div class="sidebar-box">
                    <h5>Tags</h5>

                </div>
                <div class="sidebar-box">

                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
