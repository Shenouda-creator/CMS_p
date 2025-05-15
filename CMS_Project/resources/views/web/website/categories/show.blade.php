@extends('web.website.master')
@section('title', $category->name . ' Articles')
@section('content')
    <main id="main" class="main">
        <section class="section category-articles" style="background: #f4f6fb;">
            <div class="container">

                <!-- Category Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold mb-1" style="letter-spacing: 1px;">
                            <span class="badge bg-gradient px-3 py-2" style="background: linear-gradient(90deg, #667eea, #764ba2); color: #2d2b2b; font-size: 1.5rem;">
                                <i class="bi bi-folder"></i> {{ $category->name }}
                            </span>
                        </h1>
                        <p class="text-muted fs-5">Articles under this category</p>
                    </div>
                </div>

                <!-- Articles List -->
                <div class="row gy-4">
                    @forelse ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-lg h-100" style="border-radius: 1.5rem; transition: box-shadow 0.2s;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-gradient mb-1"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        {{ $article->title }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <i class="bi bi-person"></i> {{ $article->user->name ?? 'Unknown Author' }}
                                        &nbsp;|&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                    </h6>
                                    <p class="card-text text-muted mb-3 flex-grow-1" style="min-height: 60px;">
                                        {{ Str::limit($article->content, 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between gap-2 mt-auto">
                                        <a href="{{ route('web.articles.show', $article->id) }}" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('web.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center shadow-sm" style="border-radius: 1.5rem;">
                                No articles found in this category.
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Back Button -->
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="{{ route('web.categories.index') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-arrow-left-circle me-1"></i> Back to Categories
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
