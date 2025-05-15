@extends('web.website.master')
@section('title', 'Edit Article')
@section('content')
    <main id="main" class="main">
        <section class="section edit-article">
            <div class="container">
                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold">Edit Article</h1>
                        <p class="text-muted">Update the details below to edit the article</p>
                    </div>
                </div>

                <!-- Article Form -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('web.articles.update', $article->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Article Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter article title" value="{{ old('title', $article->title) }}" required>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="category" class="form-label fw-bold">Category</label>
                                        <select name="category_id" id="category" class="form-select" required>
                                            <option value="" disabled>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Content -->
                                    <div class="mb-3">
                                        <label for="content" class="form-label fw-bold">Content</label>
                                        <textarea name="content" id="content" rows="6" class="form-control"
                                            placeholder="Write your article content here..." required>{{ old('content', $article->content) }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg">
                                            <i class="bi bi-check-circle me-2"></i>Update Article
                                        </button>
                                        <a href="{{ route('web.articles.index') }}" class="btn btn-secondary btn-lg">
                                            <i class="bi bi-arrow-left-circle me-2"></i>Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
