@extends('web.website.master')
@section('title', 'Edit Category')
@section('content')
    <main id="main" class="main">
        <section class="section edit-category">
            <div class="container">
                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold">Edit Category</h1>
                        <p class="text-muted">Update the details below to edit the category</p>
                    </div>
                </div>

                <!-- Category Form -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('web.categories.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Use PUT method for updating -->

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Category Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg">
                                            <i class="bi bi-check-circle me-2"></i>Update Category
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
