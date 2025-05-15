@extends('web.website.master')
@section('title', 'Home')
@section('content')
    <main id="main" class="main">

        {{-- @include('web.website.layouts.pagetitle') --}}
        <section class="section dashboard">
            <div class="container">
                <!-- Welcome Message -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-primary text-center shadow" role="alert"
                            style="background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%); color: #fff; border-radius: 1rem;">
                            <h4 class="alert-heading mb-2">Welcome, <span
                                    class="text-capitalize">{{ Auth::user()->name }}</span>!</h4>
                            <p class="mb-0">We’re glad to have you here. Manage your posts and share your stories with the
                                world!</p>
                        </div>
                    </div>
                </div>

                <!-- Articles Row (Roff Cards) -->
                <div class="row gy-4 mb-5">
                    @forelse ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-lg border-0 h-100"
                                style="transition: transform 0.2s; border-radius: 1rem;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary fw-bold">{{ $article->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <i class="bi bi-folder"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                        &nbsp;|&nbsp;
                                        <i class="bi bi-person"></i> {{ $article->user->name ?? 'Unknown Author' }}
                                        &nbsp;|&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                    </h6>
                                    <p class="card-text text-muted mb-3" style="min-height: 60px;">
                                        {{ Str::limit($article->content, 100) }}
                                    </p>
                                    <div class="mt-auto d-flex justify-content-between gap-2">
                                        <a href="{{ route('web.articles.show', $article->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                            onclick="toggleCommentSection({{ $article->id }})">
                                            <i class="bi bi-chat-dots"></i> Comments
                                        </button>
                                    </div>
                                    <!-- Comments Section (hidden by default) -->
                                    <div class="mt-3 d-none" id="comments-section-{{ $article->id }}" style="max-height: 220px; overflow-y: auto;">
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
                                        <!-- Toggleable Comment Form -->
                                        <form action="{{ route('web.comments.store') }}" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                                            <div class="mb-2">
                                                <textarea name="content" class="form-control" rows="2" placeholder="Write your comment..."></textarea>
                                                @error('content')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm rounded-pill px-4">Post Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center shadow-sm" style="border-radius: 1rem;">
                                No articles found. <a href="{{ route('web.articles.create') }}" class="alert-link">Create a
                                    new article</a>.
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Action Buttons -->
                <div class="row g-3 justify-content-center mb-5">
                    <div class="col-auto">
                        <a href="{{ route('web.articles.create') }}"
                            class="btn btn-success btn-lg px-4 shadow rounded-pill">
                            <i class="bi bi-plus-circle me-2"></i>Create New Post
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('web.articles.index') }}"
                            class="btn btn-outline-primary btn-lg px-4 shadow rounded-pill">
                            <i class="bi bi-list-ul me-2"></i>View All Posts
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function toggleCommentSection(articleId) {
            const section = document.getElementById('comments-section-' + articleId);
            section.classList.toggle('d-none');
        }
    </script>
@endsection
