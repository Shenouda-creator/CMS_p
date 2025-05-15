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
                        <h1 class="fw-bold mb-1" style="letter-spacing: 1px;">📝 All Articles</h1>
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
                            <div class="card border-0 shadow-lg h-100" style="border-radius: 1.5rem; transition: box-shadow 0.2s;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-gradient mb-1"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        {{ $article->title }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <i class="bi bi-folder"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                        &nbsp;|&nbsp;
                                        <i class="bi bi-person"></i> {{ $article->user->name ?? 'Unknown Author' }}
                                        &nbsp;|&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                                    </h6>
                                    <p class="card-text text-muted mb-3 flex-grow-1" style="min-height: 60px;">
                                        {{ Str::limit($article->content, 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between gap-2 mt-auto">
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
            </div>
        </section>
    </main><!-- End #main -->
@endsection
