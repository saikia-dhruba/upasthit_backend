@extends('layouts.user')

@section('title', 'Activity Logs')

@section('content')
    <div class="container py-4">
        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Activity Logs</h1>
            <a href="{{ route('user.logs.activity') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-sync fa-sm"></i> Reload
            </a>
        </div>

        {{-- Main content card --}}
        <div class="card shadow-lg">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Activity Logs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Route</th>
                                <th scope="col">Method</th>
                                <th scope="col">Device</th>
                                <th scope="col">IP Address</th>
                                <th scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activityLogs as $log)
                                <tr>
                                    <td>
                                        <span class="badge bg-info">{{ $log->user_id ? $log->user->name : 'Guest' }}</span>
                                    </td>
                                    <td>
                                        <code class="text-dark">{{ $log->route }}</code>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $log->method === 'GET' ? 'primary' : ($log->method === 'POST' ? 'success' : ($log->method === 'PUT' ? 'warning' : 'danger')) }}">{{ $log->method }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $log->device_type === 'mobile' ? 'success' : ($log->device_type === 'tablet' ? 'warning' : 'primary') }}">
                                            {{ ucfirst($log->device_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $log->ip }}</small>
                                    </td>
                                    <td>
                                        {{ $log->created_at->format('M d, Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        No activity logs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(count($activityLogs) > 0)
                    <div class="d-flex justify-content-center mt-4">
                        {{ $activityLogs->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
