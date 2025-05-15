@extends('web.website.master')
@section('title', 'Edit Profile')
@section('content')
<main id="main" class="main">
    <section class="section" style="background: #f4f6fb;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg" style="border-radius: 2rem;">
                        <div class="card-body p-5">
                            <h2 class="fw-bold mb-4 text-center" style="color: #222;">
                                <i class="bi bi-person-circle"></i> Edit Profile
                            </h2>
                            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PATCH') 
                                <div class="mb-4 text-center position-relative">
                                    <img src="{{ Auth::user()->profile_photo_url ?? asset('dashboard/assets/img/profile-img.jpg') }}"
                                         alt="Profile" class="rounded-circle shadow mb-2"
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    <label for="photo" class="position-absolute start-50 translate-middle-x" style="bottom: -10px; cursor: pointer;">
                                        <span class="btn btn-light border rounded-circle shadow-sm p-2" title="Change Photo">
                                            <i class="bi bi-camera fs-5 text-primary"></i>
                                        </span>
                                        <input type="file" id="photo" name="photo" class="d-none @error('photo') is-invalid @enderror" accept="image/*">
                                    </label>
                                    @error('photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror"
                                        value="{{ old('name', Auth::user()->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-lg rounded-pill @error('email') is-invalid @enderror"
                                        value="{{ old('email', Auth::user()->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">New Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg rounded-pill @error('password') is-invalid @enderror"
                                        placeholder="Leave blank to keep current password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-lg rounded-pill"
                                        placeholder="Confirm new password">
                                </div>
                                <div class="d-flex justify-content-end mt-4 gap-2">
                                    <a href="{{ route('web.profile.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
                                        <i class="bi bi-save"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-muted small" style="color: #222 !important;">Update your profile information and photo.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
