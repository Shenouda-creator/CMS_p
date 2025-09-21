@extends('web.dashboard.master')
@section('title', 'Users')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card border-0 shadow-lg" style="border-radius: 1.5rem; background: linear-gradient(120deg, #e0e7ff 70%, #f8fafc 100%);">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                    <h3 class="fw-bold mb-0 text-gradient"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="bi bi-people"></i> Users Management
                                    </h3>
                                    <a href="{{ route('dashboard.users.create') }}"
                                        class="btn btn-success rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-plus-circle"></i> Create User
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0" style="border-radius: 1rem; overflow: hidden;">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 60px;">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th class="text-end" style="width: 180px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr style="transition: box-shadow 0.2s;">
                                                    <td>
                                                        <span class="badge"
                                                            style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff;">
                                                            {{ $index + 1 }}
                                                        </span>
                                                    </td>
                                                    <td class="fw-semibold fs-6">
                                                        <i class="bi bi-person-circle text-primary"></i>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info text-dark">{{ $user->email }}</span>
                                                    </td>
                                                    <td>
                                                        @forelse ($user->roles as $role)
                                                            <span class="badge rounded-pill bg-primary mb-1">{{ $role->name }}</span>
                                                        @empty
                                                            <span class="text-muted small">No roles</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-inline-flex gap-2">
                                                            <a href="{{ route('dashboard.users.edit',$user->id) }}"
                                                                class="btn btn-outline-warning btn-sm rounded-pill px-3 shadow-sm">
                                                                <i class="bi bi-pencil"></i> Edit
                                                            </a>
                                                            <form action="{{ route('dashboard.users.destroy',$user->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 shadow-sm"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    <i class="bi bi-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    {{ $users->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-muted small">Manage users and their roles with ease and style.</span>
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
        .table tr:hover {
            box-shadow: 0 2px 12px #8f94fb33;
            background: #f8fafc;
        }
        .btn-outline-warning, .btn-outline-danger {
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .btn-outline-warning:hover, .btn-outline-danger:hover {
            box-shadow: 0 2px 8px #764ba255;
            transform: scale(1.05);
        }
    </style>
@endsection
