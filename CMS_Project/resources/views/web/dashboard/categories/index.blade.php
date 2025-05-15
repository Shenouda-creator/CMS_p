@extends('web.dashboard.master')
@section('title', 'Categories')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')
        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-10">
                        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                            <h3 class="fw-bold mb-0 text-gradient"
                                style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                <i class="bi bi-tags"></i> Categories
                            </h3>
                            <a href="{{ route('dashboard.categories.create') }}"
                                class="btn btn-success rounded-pill px-4 shadow-sm">
                                <i class="bi bi-plus-circle"></i> Add Category
                            </a>
                        </div>
                        @if($categories->count())
                            <div class="row g-4">
                                @foreach($categories as $category)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-0 shadow-lg h-100" style="border-radius: 1.5rem;">
                                            <div class="card-body d-flex flex-column">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="badge bg-gradient me-2"
                                                        style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff;">
                                                        <i class="bi bi-tag"></i>
                                                    </span>
                                                    <span class="fw-bold fs-5">{{ $category->name }}</span>
                                                </div>
                                                <div class="text-muted mb-3">
                                                    <i class="bi bi-calendar"></i>
                                                    {{ $category->created_at->format('M d, Y') }}
                                                </div>
                                                <div class="mt-auto d-flex justify-content-end gap-2">
                                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                                        class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info text-center mb-0 rounded-pill py-3">
                                <i class="bi bi-info-circle"></i> No categories found.
                            </div>
                        @endif
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
