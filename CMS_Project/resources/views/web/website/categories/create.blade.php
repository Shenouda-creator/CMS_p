@extends('web.website.master')
@section('title', 'Create category')
@section('content')
    <main id="main" class="main">
        <section class="section create-category">
            <div class="container">
                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold">Create New <Cap></Cap>Category</h1>
                        <p class="text-muted">Fill in the details below to create a new category</p>
                    </div>
                </div>
                <!-- category Form -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('web.categories.store') }}" method="POST">
                                    @csrf
                                    <!-- name -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Category Name</label>
                                        <input type="text" name="name" id="title" class="form-control"
                                            placeholder="Enter category name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger"></small>
                                        @enderror
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg">
                                            <i class="bi bi-check-circle me-2"></i>Submit category
                                        </button>
                                        <a href="{{ route('web.categories.index') }}" class="btn btn-secondary btn-lg">
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
