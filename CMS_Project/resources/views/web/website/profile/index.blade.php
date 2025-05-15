@extends('web.website.master')
@section('title', 'My Profile')
@section('content')
<main id="main" class="main">
    <section class="section" style="background: #f4f6fb;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 2rem;">
                        <div class="card-body p-5">
                            <div class="d-flex flex-column align-items-center mb-4">
                                <img src="{{ asset('dashboard/assets/img/profile-img.jpg') }}"
                                     alt="Profile" class="rounded-circle shadow mb-3"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                                <h2 class="fw-bold mb-1" style="color: #222;">
                                    {{ Auth::user()->name }}
                                </h2>
                                <span class="text-muted mb-2">{{ Auth::user()->email }}</span>
                                <span class="badge bg-gradient mb-2" style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff;">
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
                            {{-- User Articles --}}
                            <h4 class="fw-bold mb-4 text-primary text-center"><i class="bi bi-pencil-square"></i> My Articles</h4>
                            @if($articles->count())
                                <div class="row g-4">
                                    @foreach($articles as $article)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card shadow border-0 h-100" style="border-radius: 1rem;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title text-primary fw-bold">{{ $article->title }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                                    </h6>
                                                    <p class="card-text text-muted mb-3" style="min-height: 60px;">
                                                        {{ Str::limit($article->content, 80) }}
                                                    </p>
                                                    <div class="mt-auto">
                                                        <a href="{{ route('web.articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>
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
@endsection
