@extends('web.dashboard.master')
@section('title', 'Edit Role')
@section('content')
<main id="main" class="main">
    @include('web.dashboard.layouts.pagetitle')
    <section class="section" style="background: #f4f6fb;">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg" style="border-radius: 2rem; background: linear-gradient(120deg, #e0e7ff 70%, #f8fafc 100%);">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <span class="d-inline-block mb-2" style="background: linear-gradient(90deg,#4e54c8,#8f94fb); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-shield-lock fs-2 text-white"></i>
                                </span>
                                <h2 class="fw-bold mb-2 text-gradient" style="background: linear-gradient(90deg,#4e54c8,#8f94fb); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 1px;">
                                    Edit Role
                                </h2>
                                <p class="text-muted mb-0">Update the role name and assign permissions below.</p>
                            </div>
                            <form action="{{ route('dashboard.roles.update', $role->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold text-gradient">Role Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror"
                                        placeholder="Enter role name" value="{{ old('name', $role->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if(isset($permissions) && $permissions->count())
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-gradient">Permissions</label>
                                    <div class="row g-2">
                                        @foreach($permissions as $permission)
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-check mb-2 p-2 rounded shadow-sm" style="background: #f4f6fb;">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm{{ $permission->id }}"
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="perm{{ $permission->id }}">
                                                        <span class="badge" style="background: linear-gradient(90deg, #8f94fb, #c7d2fe); color: #222; font-size: 1rem;">
                                                            {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif
                                <div class="d-flex justify-content-end mt-4 gap-2">
                                    <a href="{{ route('dashboard.roles.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                        <i class="bi bi-save"></i> Update Role
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-muted small">Role management made easy and beautiful.</span>
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
    .form-check-input:checked {
        background-color: #4e54c8;
        border-color: #4e54c8;
    }
    .form-check-input {
        transition: box-shadow 0.2s;
    }
    .form-check-input:focus {
        box-shadow: 0 0 0 2px #8f94fb55;
    }
    .card {
        transition: box-shadow 0.3s, transform 0.2s;
    }
    .card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 12px 32px rgba(78,84,200,0.18);
    }
</style>
@endsection
