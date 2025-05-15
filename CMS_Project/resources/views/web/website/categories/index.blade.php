@extends('web.website.master')
@section('title', 'Categories')
@section('content')
    <main id="main" class="main">
        <section class="section categories" style="background: #f4f6fb;">
            <div class="container">
                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold mb-1" style="letter-spacing: 1px;">📂 Categories</h1>
                        <p class="text-muted fs-5">Browse and manage your categories</p>
                    </div>
                </div>
                <!-- Search and Create Button -->
                <div class="row mb-4 align-items-center">
                    <div class="col-md-8 mb-2 mb-md-0">
                        <form action="{{ route('web.categories.index') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2 rounded-pill shadow-sm"
                                placeholder="Search categories..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('web.categories.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                            <i class="bi bi-plus-circle"></i> Create New Category
                        </a>
                    </div>
                </div>

                <!-- Categories List -->
                <div class="row gy-4">
                    @forelse ($categories as $category)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-lg h-100"
                                style="border-radius: 1.5rem; transition: box-shadow 0.2s;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-gradient mb-2"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        {{ $category->name }}
                                    </h5>
                                    <div class="mt-auto d-flex justify-content-between gap-2">

                                        <a href="{{ route('web.categories.show', $category->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-eye"></i> View Articles
                                        </a>

                                        <a href="{{ route('web.categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-outline-secondary rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <form action="{{ route('web.categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-pill px-3 shadow-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
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
                                No categories found. <a href="{{ route('web.categories.create') }}"
                                    class="alert-link">Create a new category</a>.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
