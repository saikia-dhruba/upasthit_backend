@extends('layouts.user')

@section('title', 'Error Logs')

@section('content')
    <div class="container py-4">
        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Error Logs</h1>
            <a href="{{ route('user.logs.errors') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-sync fa-sm"></i> Reload
            </a>
        </div>

        {{-- Main content card --}}
        <div class="card shadow-lg">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">System Errors</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">Route</th>
                                <th scope="col">Method</th>
                                <th scope="col">Exception</th>
                                <th scope="col">Message</th>
                                <th scope="col">Device</th>
                                <th scope="col">IP Address</th>
                                <th scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($errorLogs as $log)
                                <tr class="table-danger">
                                    <td>
                                        <span class="badge bg-danger">{{ $log->user_id ? $log->user->name : 0 }}</span>
                                    </td>
                                    <td>
                                        <code class="text-dark">{{ $log->route }}</code>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $log->method }}</span>
                                    </td>
                                    <td>
                                        <small class="text-danger font-weight-bold">{{ class_basename($log->exception) }}</small>
                                    </td>
                                    <td>
                                        <small class="text-dark">{{ Str::limit($log->message, 50) }}</small>
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
                                <tr class="table-light">
                                    <td colspan="8">
                                        <details>
                                            <summary class="cursor-pointer text-muted">Stack Trace</summary>
                                            <pre class="bg-light p-3 rounded mt-2"><code class="text-dark">{{ $log->stack_trace }}</code></pre>
                                        </details>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No error logs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(count($errorLogs) > 0)
                    <div class="d-flex justify-content-center mt-4">
                        {{ $errorLogs->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
