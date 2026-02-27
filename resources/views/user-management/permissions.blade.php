@extends('layouts.user') {{-- Make sure this matches your layout file --}}

@section('title', 'Permissions Management')

{{-- No need to push Tailwind CSS styles --}}

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Permissions Management</h1>
            @can('permissions.sync')
                <form action="{{ route('user.permissions.sync') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success shadow-sm d-flex align-items-center">
                        <i class="fas fa-sync-alt fa-sm text-white-50 me-2"></i>
                        Sync Permissions
                    </button>
                </form>
            @endcan
        </div>

        {{-- Success Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Permissions List Grouped by Category -->
        <div class="row gy-4"> {{-- Using Bootstrap's grid row with vertical gutter spacing --}}
            @forelse($permissions as $group => $permissionList)
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary text-capitalize">{{ $group }} Permissions
                            </h5>
                        </div>
                        <div class="card-body">
                            {{-- Using a List Group for a clean list --}}
                            <div class="list-group">
                                @foreach ($permissionList as $permission)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        {{-- Permission Name --}}
                                        <code>{{ $permission->name }}</code>

                                        {{-- Role Count Badge --}}
                                        <span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis">
                                            {{ $permission->roles_count }}
                                            {{ Str::plural('Role', $permission->roles_count) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">No Permissions Found!</h4>
                        <p>It looks like there are no permissions in the database yet.</p>
                        <hr>
                        <p class="mb-0">Click the 'Sync Permissions' button to populate them from your application's
                            config file.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
