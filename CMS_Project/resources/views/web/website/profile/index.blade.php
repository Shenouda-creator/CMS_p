@extends('web.website.master')
@section('title', 'My Profile')
@section('content')
<main id="main" class="main">
    <section class="section" style="background: #f4f6fb;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Profile Card -->
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 2rem;">
                        <div class="card-body p-5">
                            <div class="d-flex flex-column align-items-center mb-4">
                                <div class="position-relative mb-2">
                                    <img src="{{ Auth::user()->profile_photo_url ?? asset('dashboard/assets/img/profile-img.jpg') }}"
                                         alt="Profile" class="rounded-circle shadow"
                                         style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #8f94fb;">
                                    <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-gradient rounded-circle"
                                          style="background: linear-gradient(90deg,#4e54c8,#8f94fb);">
                                        <i class="bi bi-stars text-white"></i>
                                    </span>
                                </div>
                                <h2 class="fw-bold mb-1 text-gradient"
                                    style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    {{ Auth::user()->name }}
                                </h2>
                                <span class="text-muted mb-2">{{ Auth::user()->email }}</span>
                                <span class="badge mb-2 px-3 py-2" style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff; font-size: 1rem;">
                                    {{ Auth::user()->roles->pluck('name')->join(', ') ?: 'User' }}
                                </span>
                            </div>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-event text-primary fs-4 me-3"></i>
                                        <div>
                                            <div class="fw-semibold">Joined</div>
                                            <div class="text-muted small">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-envelope text-success fs-4 me-3"></i>
                                        <div>
                                            <div class="fw-semibold">Email</div>
                                            <div class="text-muted small">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                                <a href="{{ route('web.profile.edit',Auth::user()->id )}}" class="btn btn-outline-primary rounded-pill px-4 mb-2">
                                    <i class="bi bi-pencil"></i> Edit Profile
                                </a>
                                <a href="#" class="btn btn-outline-warning rounded-pill px-4 mb-2">
                                    <i class="bi bi-key"></i> Change Password
                                </a>
                            </div>
                            <div class="text-center mt-4 mb-5">
                                <span class="text-muted small">Keep your profile information up to date for better experience.</span>
                            </div>
                            <!-- User Articles Section -->
                            <h4 class="fw-bold mb-4 text-gradient text-center"
                                style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                <i class="bi bi-pencil-square"></i> My Articles
                            </h4>
                            @if($articles->count())
                                <div class="row g-4">
                                    @foreach($articles as $article)
                                        <div class="col-12">
                                            <div class="card shadow-sm border-0 facebook-post" style="border-radius: 1.5rem;">
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
                                                    <h5 class="fw-bold mb-2 text-gradient"
                                                        style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
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
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    {{ $articles->links('pagination::bootstrap-5') }}
                                </div>
                            @else
                                <div class="alert alert-info text-center mt-4 rounded-pill">
                                    <i class="bi bi-info-circle"></i> You have not written any articles yet.
                                </div>
                            @endif
                            {{-- End User Articles --}}
                        </div>
                    </div>
                </div>
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
    .facebook-post {
        transition: box-shadow 0.3s, transform 0.2s;
    }
    .facebook-post:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 32px rgba(78,84,200,0.18);
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
