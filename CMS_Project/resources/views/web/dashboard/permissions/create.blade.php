@extends('web.dashboard.master')
@section('title', 'Create Permission')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')
        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg" style="border-radius: 1.5rem;">
                            <div class="card-body p-4">
                                <h3 class="fw-bold mb-4 text-center" style="color: #222;">
                                    <i class="bi bi-key"></i> Create New Permission
                                </h3>
                                <form action="{{ route('dashboard.permissions.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="form-label fw-semibold" style="color: #222;">Permission Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror"
                                            placeholder="Enter permission name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="guard_name" class="form-label fw-semibold" style="color: #222;">Guard Name</label>
                                        <input type="text" name="guard_name" id="guard_name"
                                            class="form-control form-control-lg rounded-pill @error('guard_name') is-invalid @enderror"
                                            placeholder="web" value="{{ old('guard_name', 'web') }}">
                                        @error('guard_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 gap-2">
                                        <a href="{{ route('dashboard.permissions.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                            <i class="bi bi-x-circle"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                            <i class="bi bi-plus-circle"></i> Create Permission
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-muted small" style="color: #222 !important;">Define a new permission for your system.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
