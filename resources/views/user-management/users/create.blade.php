@extends('layouts.user') {{-- Make sure this matches your layout file --}}
@section('title', 'Create New User')

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
        <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
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
            {{-- Give the form an ID so we can target it with JavaScript --}}
            <form id="createUserForm" action="{{ route('user.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number (Optional)</label>
                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Avatar --}}
                    <div class="col-md-6">
                        <label for="avatar" class="form-label">Avatar (Optional)</label>
                        <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                        @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-12">
                         <label for="address" class="form-label">Address (Optional)</label>
                         <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                         @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Roles Checkboxes --}}
                    <div class="col-12">
                        <label class="form-label">Assign Roles</label>
                        <div class="p-3 border rounded @error('roles') border-danger @enderror">
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role }}" id="role_{{ $loop->index }}" {{ (is_array(old('roles')) && in_array($role, old('roles'))) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="role_{{ $loop->index }}">{{ $role }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('roles')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('user.users.index') }}" class="btn btn-secondary me-2">Cancel</a>

                    {{-- Updated Button HTML --}}
                    <button type="submit" id="submitButton" class="btn btn-primary d-flex align-items-center">
                        <span class="spinner-border spinner-border-sm btn-spinner me-2" role="status" aria-hidden="true"></span>
                        <span class="button-text">Create User</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const userForm = document.getElementById('createUserForm');
    const submitButton = document.getElementById('submitButton');
    const buttonText = submitButton.querySelector('.button-text');
    const spinner = submitButton.querySelector('.btn-spinner');

    userForm.addEventListener('submit', function(event) {
        // Only disable if the form is valid from a browser perspective.
        // This won't catch server-side validation, but it prevents the button
        // from getting stuck if a 'required' field is missed.
        if (userForm.checkValidity()) {
            // Disable the button to prevent multiple submissions
            submitButton.disabled = true;

            // Show the spinner and hide the text
            spinner.style.display = 'inline-block';
            buttonText.textContent = 'Creating...';
        }
    });

    // Optional: Reset button if the user navigates back to this page
    // (e.g., after a validation error that doesn't use the standard Laravel redirect)
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            submitButton.disabled = false;
            spinner.style.display = 'none';
            buttonText.textContent = 'Create User';
        }
    });
</script>
@endpush
