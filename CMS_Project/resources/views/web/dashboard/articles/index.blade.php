@extends('web.dashboard.master')
@section('title', 'Articles')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section articles" style="background: #f4f6fb;">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold mb-1 text-gradient"
                            style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 1px;">
                            📝 All Articles
                        </h1>
                        <p class="text-muted fs-5">Browse, edit, or manage all articles in the system</p>
                    </div>
                </div>
                <!-- Search and Create Button -->
                <div class="row mb-4 align-items-center">
                    <div class="col-md-8 mb-2 mb-md-0">
                        <form action="{{ route('dashboard.articles.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2 rounded-pill shadow-sm" placeholder="Search articles..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('dashboard.articles.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                            <i class="bi bi-plus-circle"></i> Create New Article
                        </a>
                    </div>
                </div>

                <!-- Articles List -->
                <div class="row gy-4">
                    @forelse ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-lg h-100 article-card" style="border-radius: 1.5rem; transition: box-shadow 0.3s, transform 0.2s;">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ $article->user->profile_photo_url ?? asset('dashboard/assets/img/profile-img.jpg') }}"
                                            alt="User" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <span class="fw-bold text-primary">{{ $article->user->name ?? 'Unknown Author' }}</span>
                                            <div class="small text-muted">
                                                <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                                &nbsp;|&nbsp;
                                                <i class="bi bi-folder"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title fw-bold text-gradient mb-1"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        {{ $article->title }}
                                    </h5>
                                    <p class="card-text text-muted mb-3 flex-grow-1" style="min-height: 60px;">
                                        {{ Str::limit($article->content, 120) }}
                                    </p>
                                    @if($article->image)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid rounded" style="max-height: 220px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between gap-2 mt-auto mb-2">
                                        <a href="{{ route('dashboard.articles.show', $article->id) }}" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('dashboard.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 shadow-sm"
                                                onclick="return confirm('Are you sure you want to delete this article?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Comments Section -->
                                    <div class="mt-2">
                                        <h6 class="fw-bold mb-2"><i class="bi bi-chat-left-text"></i> Comments</h6>
                                        @forelse($article->comments as $comment)
                                            <div class="mb-2 p-2 rounded bg-light border">
                                                <div class="small text-muted mb-1">
                                                    <i class="bi bi-person-circle"></i>
                                                    {{ $comment->user->name ?? 'Unknown User' }}
                                                    <span class="mx-1">•</span>
                                                    <span class="text-secondary">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="fw-normal">{{ $comment->content }}</div>
                                            </div>
                                        @empty
                                            <div class="text-muted small mb-2">No comments yet.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center shadow-sm" style="border-radius: 1.5rem;">
                                No articles found. <a href="{{ route('dashboard.articles.create') }}" class="alert-link">Create a new article</a>.
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    </main>
    <style>
        .text-gradient {
            background: linear-gradient(90deg,#4e54c8,#8f94fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .article-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 12px 32px rgba(78,84,200,0.18);
        }
        .btn-outline-secondary, .btn-outline-danger {
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .btn-outline-secondary:hover, .btn-outline-danger:hover {
            box-shadow: 0 2px 8px #764ba255;
            transform: scale(1.05);
        }
        .btn-primary {
            background: linear-gradient(90deg,#4e54c8,#8f94fb);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg,#8f94fb,#4e54c8);
        }
    </style>
@endsection
