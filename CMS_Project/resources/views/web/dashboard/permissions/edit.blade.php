@extends('web.dashboard.master')
@section('title', 'Edit Permission')
@section('content')
<main id="main" class="main">
    @include('web.dashboard.layouts.pagetitle')
    <section class="section" style="background: #f4f6fb;">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg" style="border-radius: 2rem; background: linear-gradient(120deg, #e0e7ff 70%, #f8fafc 100%);">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <span class="d-inline-block mb-2" style="background: linear-gradient(90deg,#4e54c8,#8f94fb); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-key fs-2 text-white"></i>
                                </span>
                                <h3 class="fw-bold mb-2 text-gradient" style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 1px;">
                                    Edit Permission
                                </h3>
                                <p class="text-muted mb-0">Update permission details below.</p>
                            </div>
                            <form action="{{ route('dashboard.permissions.update',$permission->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PATCH')
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold text-gradient">Permission Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror"
                                        placeholder="Enter permission name" value="{{ $permission->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="guard_name" class="form-label fw-semibold text-gradient">Guard Name</label>
                                    <input type="text" name="guard_name" id="guard_name"
                                        class="form-control form-control-lg rounded-pill @error('guard_name') is-invalid @enderror"
                                        placeholder="web" value="{{ $permission->guard_name }}">
                                    @error('guard_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end mt-4 gap-2">
                                    <a href="{{ route('dashboard.permissions.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                        <i class="bi bi-save"></i> Update Permission
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-muted small">Manage permissions easily and securely.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>
    .text-gradient {
        background: linear-gradient(90deg,#4e54c8,#8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .card {
        transition: box-shadow 0.3s, transform 0.2s;
    }
    .card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 12px 32px rgba(78,84,200,0.18);
    }
    .form-control:focus {
        box-shadow: 0 0 0 2px #8f94fb55;
        border-color: #8f94fb;
    }
    .btn-primary {
        background: linear-gradient(90deg,#4e54c8,#8f94fb);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg,#8f94fb,#4e54c8);
    }
</style>
@endsection
