@extends('web.dashboard.master')
@section('title', 'Users')
@section('content')
    <main id="main" class="main">
        @include('web.dashboard.layouts.pagetitle')

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List of Roles</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.users.edit',$user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.users.destroy',$user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"> Create User </a>
                </div>
            </div>
        </section>

    </main>
