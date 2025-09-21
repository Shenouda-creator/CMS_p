@extends('web.website.master')
@section('title', 'Home')
@section('content')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="container">
            <!-- Welcome Message -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert text-center shadow position-relative overflow-hidden" role="alert"
                        style="background: linear-gradient(90deg, #1a0f57 0%, #497884 100%); color: #fff; border-radius: 2rem; border: none; box-shadow: 0 8px 32px rgba(31,38,135,0.12);">
                        <div class="d-flex flex-column align-items-center justify-content-center py-4">
                            <div class="mb-2"
                                style="background: rgba(255,255,255,0.18); border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 16px rgba(78,84,200,0.12);">
                                <i class="bi bi-stars fs-1" style="color: #fff;"></i>
                            </div>
                            <h2 class="alert-heading mb-1 fw-bold" style="font-size: 2.3rem; letter-spacing: 1px; background: linear-gradient(90deg,#fff,#ffe066); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                Welcome, <span class="text-warning text-capitalize">{{ Auth::user()->name }}</span>!
                            </h2>
                            <p class="mb-0" style="font-size: 1.15rem;">
                                Glad to see you! Manage your posts and share your stories with the world.
                            </p>
                        </div>
                        <span class="position-absolute top-0 end-0 opacity-25"
                            style="font-size: 5rem; pointer-events: none;">
                            <i class="bi bi-quote"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Facebook-like Articles Feed -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7">
                    @forelse ($articles as $article)
                        <div class="card shadow-sm border-0 mb-4 facebook-post" style="border-radius: 1.5rem;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ $article->user->profile_photo_url ?? asset('dashboard/assets/img/profile-img.jpg') }}"
                                         alt="User" class="rounded-circle me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                    <div>
                                        <span class="fw-bold text-primary">{{ $article->user->name ?? 'Unknown Author' }}</span>
                                        <div class="small text-muted">
                                            <i class="bi bi-calendar"></i> {{ $article->created_at->diffForHumans() }}
                                            &nbsp;|&nbsp;
                                            <i class="bi bi-folder"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-2 text-gradient" style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    {{ $article->title }}
                                </h5>
                                <p class="card-text mb-3" style="font-size: 1.1rem;">
                                    {{ Str::limit($article->content, 220) }}
                                </p>
                                @if($article->image)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid rounded" style="max-height: 320px; object-fit: cover;">
                                    </div>
                                @endif
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <!-- Like Button -->
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-light border rounded-pill px-3 py-1 like-btn" style="transition: background 0.2s;">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            <span>{{ $article->likes_count ?? 0 }}</span>
                                        </button>
                                    </form>
                                    <!-- View Button -->
                                    <a href="{{ route('web.articles.show', $article->id) }}"
                                        class="btn btn-outline-primary rounded-pill px-3 py-1">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <!-- Comments Button -->
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-3 py-1"
                                        onclick="toggleCommentSection({{ $article->id }})">
                                        <i class="bi bi-chat-dots"></i> Comments
                                    </button>
                                </div>
                                <!-- Comments Section (hidden by default) -->
                                <div class="mt-3 d-none" id="comments-section-{{ $article->id }}"
                                    style="max-height: 220px; overflow-y: auto;">
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
                    @empty
                        <div class="alert alert-warning text-center shadow-sm" style="border-radius: 1rem;">
                            No articles found. <a href="{{ route('web.articles.create') }}" class="alert-link">Create a new article</a>.
                        </div>
                    @endforelse
                </div>
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
<style>
    .facebook-post {
        transition: box-shadow 0.3s, transform 0.2s;
    }
    .facebook-post:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 32px rgba(78,84,200,0.18);
    }
    .text-gradient {
        background: linear-gradient(90deg,#4e54c8,#8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .like-btn:active, .like-btn:focus {
        background: #e0e7ff !important;
    }
</style>
<script>
    function toggleCommentSection(articleId) {
        const section = document.getElementById('comments-section-' + articleId);
        section.classList.toggle('d-none');
    }
</script>
@endsection
