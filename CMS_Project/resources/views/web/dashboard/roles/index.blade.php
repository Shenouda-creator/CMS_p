@extends('web.dashboard.master')
@section('title', 'Roles')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section" style="background: #f4f6fb;">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card border-0 shadow-lg" style="border-radius: 1.5rem;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                    <h3 class="fw-bold mb-0 text-gradient"
                                        style="background: linear-gradient(90deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="bi bi-shield-lock"></i> Roles & Permissions
                                    </h3>
                                    <a href="{{ route('dashboard.roles.create') }}"
                                        class="btn btn-success rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-plus-circle"></i> Create Role
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 60px;">#</th>
                                                <th>Role Name</th>
                                                <th>Permissions</th>
                                                <th class="text-end" style="width: 180px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $index => $role)
                                                <tr>
                                                    <td>
                                                        <span class="badge bg-gradient"
                                                            style="background: linear-gradient(90deg, #667eea, #764ba2); color: #fff;">
                                                            {{ $index + 1 }}
                                                        </span>
                                                    </td>
                                                    <td class="fw-semibold fs-6">
                                                        <i class="bi bi-person-badge text-primary"></i>
                                                        {{ $role->name }}
                                                    </td>
                                                    <td>
                                                        @forelse ($role->permissions as $permission)
                                                            <span class="badge rounded-pill bg-primary mb-1">{{ $permission->name }}</span>
                                                        @empty
                                                            <span class="text-muted small">No permissions</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-inline-flex gap-2">
                                                            <a href="{{ route('dashboard.roles.edit', $role->id) }}"
                                                                class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                                                <i class="bi bi-pencil"></i> Edit
                                                            </a>
                                                            <form action="{{ route('dashboard.roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
