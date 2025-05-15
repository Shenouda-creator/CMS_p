@extends('web.dashboard.master')
@section('title', $article->title)
@section('content')
    <main id="main" class="main">
        <section class="section article-show" style="background: #f4f6fb;">
            <div class="container">

                <!-- Article Title & Meta -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold mb-2" style="letter-spacing: 1px; background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            {{ $article->title }}
                        </h1>
                        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-2">
                            <span class="badge bg-gradient" style="background: linear-gradient(90deg, #667eea, #764ba2); color: #0f0f0f;">
                                <i class="bi bi-person"></i>
                                <span style="color: #111;">{{ $article->user->name ?? 'Unknown Author' }}</span>
                            </span>
                            <span class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $article->created_at->format('F d, Y') }}
                            </span>
                            @if($article->category)
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-folder"></i> {{ $article->category->name }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="card border-0 shadow-lg mb-4" style="border-radius: 1.5rem;">
                            <div class="card-body px-4 py-4">
                                <div class="article-content fs-5" style="line-height: 1.8;">
                                    {!! nl2br(e($article->content)) !!}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('web.articles.index') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back to Articles
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
