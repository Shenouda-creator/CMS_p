@extends('web.dashboard.master')
@section('title', 'Create User')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')
        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-lg" style="border-radius: 2rem;">
                            <div class="card-body p-5">
                                <h2 class="fw-bold mb-4 text-center" style="color: #222;">
                                    <i class="bi bi-person-plus"></i> Create New User
                                </h2>
                                <form action="{{ route('dashboard.users.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg rounded-pill"
                                            placeholder="Enter user name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg rounded-pill"
                                            placeholder="Enter email address" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg rounded-pill"
                                            placeholder="Enter password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control form-control-lg rounded-pill"
                                            placeholder="Confirm password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="role" class="form-label fw-semibold">Role</label>
                                        <select name="role" id="role" class="form-select rounded-pill">
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 gap-2">
                                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                            <i class="bi bi-x-circle"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                            <i class="bi bi-plus-circle"></i> Create User
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-muted small" style="color: #222 !important;">Fill user details and assign a role.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
