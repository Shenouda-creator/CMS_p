@extends('web.dashboard.master')
@section('title', 'Home')
@section('content')
    <main id="main" class="main">

        @include('web.dashboard.layouts.pagetitle')
        <section class="section dashboard">
            <div class="row g-4">
                <!-- Posts Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card posts-card border-0 shadow-lg" style="border-radius: 1.5rem;">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Posts <span class="text-muted">| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success text-white shadow" style="width: 56px; height: 56px;">
                                    <i class="bi bi-pencil-square fs-3"></i>
                                </div>
                                <div class="ps-3">
                                    <h3 class="mb-0 fw-bold">{{ $articleCount }}</h3>
                                    <div class="mt-3">
                                        <a href="{{ route('dashboard.articles.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-eye"></i> Show Posts
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Posts Card -->

                <!-- Categories Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card categories-card border-0 shadow-lg" style="border-radius: 1.5rem;">
                        <div class="card-body">
                            <h5 class="card-title">Categories <span class="text-muted">| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning text-white shadow" style="width: 56px; height: 56px;">
                                    <i class="bi bi-tags fs-3"></i>
                                </div>
                                <div class="ps-3">
                                    <h3 class="mb-0 fw-bold">{{ $categoryCount }}</h3>
                                    <div class="mt-3">
                                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 shadow-sm text-warning">
                                            <i class="bi bi-eye"></i> Show Categories
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Categories Card -->

                <!-- Users Card (Admin Only) -->
                @if(auth()->user() && auth()->user()->hasRole('admin'))
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card users-card border-0 shadow-lg" style="border-radius: 1.5rem;">
                        <div class="card-body">
                            <h5 class="card-title">Users <span class="text-muted">| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info text-white shadow" style="width: 56px; height: 56px;">
                                    <i class="bi bi-people fs-3"></i>
                                </div>
                                <div class="ps-3">
                                    <h3 class="mb-0 fw-bold">{{ $userCount }}</h3>
                                    <div class="mt-3">
                                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-outline-info btn-sm rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-eye"></i> Show Users
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- End Users Card (Admin Only) -->

            </div>
        </section>
    </main><!-- End #main -->
@endsection
