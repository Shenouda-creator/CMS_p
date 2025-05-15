@extends('web.dashboard.master')
@section('title', 'Profile')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section profile" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-lg" style="border-radius: 2rem; background: linear-gradient(120deg, #f8fafc 70%, #e0e7ff 100%);">
                            <div class="card-body p-5">
                                <div class="d-flex align-items-center mb-4 flex-column flex-md-row text-center text-md-start">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=667eea&color=fff&size=128' }}"
                                        alt="Profile Photo" class="rounded-circle shadow"
                                        style="width: 110px; height: 110px; object-fit: cover; border: 4px solid #fff;">
                                    <div class="ms-md-4 mt-3 mt-md-0">
                                        <h2 class="fw-bold mb-1" style="letter-spacing: 1px;">{{ Auth::user()->name }}</h2>
                                        <span class="badge px-3 py-2 mb-2" style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff; font-size: 1rem;">
                                            <i class="bi bi-person-badge"></i> {{ Auth::user()->role ?? 'Admin' }}
                                        </span>
                                        <div class="text-muted mt-2 fs-6"><i class="bi bi-envelope"></i> {{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-muted">Username</label>
                                        <div class="fw-semibold fs-5">{{ Auth::user()->username ?? '-' }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Joined</label>
                                        <div class="fw-semibold fs-5">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-muted">Phone</label>
                                        <div class="fw-semibold fs-5">{{ Auth::user()->phone ?? '-' }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Status</label>
                                        <div>
                                            @if (Auth::user()->email_verified_at)
                                                <span class="badge bg-success px-3 py-2">Verified</span>
                                            @else
                                                <span class="badge bg-warning text-dark px-3 py-2">Not Verified</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Extra: User Stats -->
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-muted">Total Posts</label>
                                        <div class="fw-semibold fs-5">
                                            {{ Auth::user()->articles()->count() }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Total Comments</label>
                                        <div class="fw-semibold fs-5">
                                            {{ Auth::user()->comments()->count() }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Extra: Bio -->
                                <div class="mb-3">
                                    <label class="form-label text-muted">Bio</label>
                                    <div class="fw-normal fs-6" style="min-height: 32px;">
                                        {{ Auth::user()->bio ?? 'No bio added yet.' }}
                                    </div>
                                </div>

                                <!-- Social Links (if available) -->
                                @if(Auth::user()->twitter || Auth::user()->facebook || Auth::user()->linkedin)
                                <div class="mb-3">
                                    <label class="form-label text-muted">Social</label>
                                    <div>
                                        @if(Auth::user()->twitter)
                                            <a href="{{ Auth::user()->twitter }}" target="_blank" class="me-2 text-primary"><i class="bi bi-twitter"></i></a>
                                        @endif
                                        @if(Auth::user()->facebook)
                                            <a href="{{ Auth::user()->facebook }}" target="_blank" class="me-2 text-primary"><i class="bi bi-facebook"></i></a>
                                        @endif
                                        @if(Auth::user()->linkedin)
                                            <a href="{{ Auth::user()->linkedin }}" target="_blank" class="me-2 text-primary"><i class="bi bi-linkedin"></i></a>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="d-flex justify-content-end mt-4 gap-2 flex-wrap">
                                    <a href="" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-pencil-square me-1"></i> Edit Profile
                                    </a>
                                    <a href="" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-key me-1"></i> Change Password
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-muted small">Last updated: {{ Auth::user()->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

