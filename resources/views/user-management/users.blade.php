@extends('layouts.user') {{-- Assuming your main layout is app.blade.php --}}
@section('title', 'Users Management')

{{-- You no longer need to push Tailwind CSS. Ensure Bootstrap 5 CSS is linked in your main layout. --}}

@section('content')
<div class="container py-4"> {{-- Using Bootstrap's container and padding --}}

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users Management</h1>
        @can('users.create')
            <a href="{{ route('user.users.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add New User
            </a>
        @endcan
    </div>

    {{-- Main content card --}}
    <div class="card shadow-lg">
        <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">User List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Joined On</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- You can add an avatar here if you have one --}}
                                    <div>
                                        <div class="fw-bold">{{ $user->name }}</div>
                                        <div class="text-muted">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @forelse($user->roles as $role)
                                    {{-- Using Bootstrap Badges --}}
                                    <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis me-1">{{ $role->name }}</span>
                                @empty
                                    <span class="text-muted">No Roles</span>
                                @endforelse
                            </td>
                            <td>
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                @can('users.edit')
                                    {{-- Using Bootstrap Buttons --}}
                                    <a href="{{ route('user.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                                @endcan
                                @can('users.delete')
                                    <form action="{{ route('user.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
