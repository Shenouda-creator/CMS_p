@extends('web.dashboard.master')
@section('title', 'Edit Role')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-lg" style="border-radius: 2rem; background: linear-gradient(120deg, #f8fafc 70%, #e0e7ff 100%);">
                            <div class="card-body p-5">
                                <h2 class="fw-bold mb-4 text-center" style="letter-spacing: 1px; color: #222;">
                                    <span>
                                        <i class="bi bi-shield-lock"></i> Edit Role
                                    </span>
                                </h2>
                                <form action="{{ route('dashboard.roles.update', $role->id) }}" method="POST" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="name" class="form-label fw-semibold" style="color: #222;">Role Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror"
                                            placeholder="Enter role name" value="{{ old('name', $role->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if(isset($permissions) && $permissions->count())
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #222;">Permissions</label>
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm{{ $permission->id }}"
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="perm{{ $permission->id }}" style="color: #222;">
                                                            <span class="badge bg-gradient" style="background: linear-gradient(90deg, #e0e7ff, #c7d2fe); color: #222;">
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
                            <span class="text-muted small" style="color: #222 !important;">Update the role name and permissions as needed.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
