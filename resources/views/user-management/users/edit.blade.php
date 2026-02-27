@extends('layouts.user')
@section('title', 'Edit User')

@push('styles')
    {{-- CSS for the button spinner --}}
    <style>
        .btn-spinner {
            width: 1rem;
            height: 1rem;
            border-width: .2em;
            display: none; /* Hidden by default */
        }
    </style>
@endpush

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User: <span class="fw-bold">{{ $user->name }}</span></h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body p-4">
            <form id="editUserForm" action="{{ route('user.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Username (Read-only) --}}
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username (Generated ID)</label>
                        <input type="text" id="username" class="form-control bg-light" value="{{ $user->username }}" readonly>
                        <div class="form-text">Username cannot be changed.</div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number (Optional)</label>
                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-12">
                         <label for="address" class="form-label">Address (Optional)</label>
                         <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $user->address) }}</textarea>
                         @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Avatar --}}
                    <div class="col-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <div class="d-flex align-items-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current Avatar" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            @endif
                            <div>
                                <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                                <div class="form-text">Leave blank to keep the current avatar.</div>
                                @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Roles Checkboxes --}}
                    <div class="col-12">
                        <label class="form-label">Assign Roles</label>
                        <div class="p-3 border rounded @error('roles') border-danger @enderror">
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role }}" id="role_{{ $loop->index }}"
                                                   {{-- Pre-check the roles the user already has --}}
                                                   {{ in_array($role, $userRoles) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="role_{{ $loop->index }}">{{ $role }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('roles')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Password Update --}}
                    {{-- <div class="col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Leave blank to keep current password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div> --}}
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('user.users.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" id="submitButton" class="btn btn-primary d-flex align-items-center">
                        <span class="spinner-border spinner-border-sm btn-spinner me-2" role="status" aria-hidden="true"></span>
                        <span class="button-text">Update User</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const userForm = document.getElementById('editUserForm');
    const submitButton = document.getElementById('submitButton');
    const buttonText = submitButton.querySelector('.button-text');
    const spinner = submitButton.querySelector('.btn-spinner');

    userForm.addEventListener('submit', function(event) {
        if (userForm.checkValidity()) {
            submitButton.disabled = true;
            spinner.style.display = 'inline-block';
            buttonText.textContent = 'Updating...';
        }
    });

    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            submitButton.disabled = false;
            spinner.style.display = 'none';
            buttonText.textContent = 'Update User';
        }
    });
</script>
@endpush
