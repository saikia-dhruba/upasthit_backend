@extends('layouts.user')

@section('title', 'Roles Management')

@push('styles')
    {{-- CSS for the modal save button spinner --}}
    <style>
        .btn-spinner {
            width: 1rem;
            height: 1rem;
            border-width: .2em;
            display: none;
            /* Hidden by default */
        }

        .modal-body-scrollable {
            /* vh = viewport height units. 80vh is 80% of the screen height. */
            /* calc() subtracts space for the modal header and footer. */
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles Management</h1>
            @can('roles.create')
                <button type="button" onclick="openAddModal()" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Add New Role
                </button>
            @endcan
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif

        <!-- Roles Table Card -->
        <div class="card shadow-lg">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Role List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Role Name</th>
                                <th>Users</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="fw-bold">{{ $role->name }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td><span
                                            class="badge rounded-pill bg-success-subtle text-success-emphasis">{{ $role->permissions_count }}</span>
                                    </td>
                                    <td>
                                        @can('roles.edit')
                                            <button
                                                onclick='openEditModal({{ $role->toJson() }}, {{ json_encode($role->permissions->pluck('name')) }})'
                                                class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                                        @endcan
                                        @can('roles.delete')
                                            <form action="{{ route('user.roles.destroy', $role->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this role?');">
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


    <!-- Add/Edit Role Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">

        {{-- ===================== THIS IS THE LINE TO CHANGE ===================== --}}
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            {{-- ==================================================================== --}}

            <div class="modal-content">
                <form id="roleForm" method="POST" action="">
                    @csrf
                    <div id="method-field"></div> {{-- For PUT method --}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">Add New Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-scrollable">
                        <!-- Role Name Input -->
                        <div class="mb-4">
                            <label for="roleName" class="form-label">Role Name</label>
                            <input type="text" id="roleName" name="name" class="form-control" required>
                        </div>

                        <!-- Permissions Checkboxes -->
                        <h6 class="mb-3">Permissions</h6>
                        <div class="row g-3">
                            @foreach ($permissions as $group => $permissionList)
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="form-check d-flex justify-content-between mb-2 border-bottom pb-2">
                                            <label class="form-check-label fw-bold text-primary"
                                                for="group_{{ $loop->index }}">{{ Str::title($group) }}</g>
                                                <input type="checkbox" onchange="toggleGroup(this)" class="form-check-input"
                                                    id="group_{{ $loop->index }}">
                                        </div>
                                        <div class="permission-group">
                                            @foreach ($permissionList as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" name="permissions[]"
                                                        value="{{ $permission->name }}"
                                                        class="form-check-input permission-checkbox"
                                                        id="perm_{{ $permission->id }}">
                                                    <label class="form-check-label"
                                                        for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="saveRoleButton" class="btn btn-primary d-flex align-items-center">
                            <span class="spinner-border spinner-border-sm btn-spinner me-2" role="status"
                                aria-hidden="true"></span>
                            <span class="button-text">Save Role</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- The JavaScript does not need to change for this feature --}}
    <script>
        const roleModalEl = document.getElementById('roleModal');
        const roleModal = new bootstrap.Modal(roleModalEl);
        const roleForm = document.getElementById('roleForm');
        const modalTitle = document.getElementById('roleModalLabel');
        const roleNameInput = document.getElementById('roleName');
        const methodField = document.getElementById('method-field');
        const checkboxes = document.querySelectorAll('.permission-checkbox');
        const saveButton = document.getElementById('saveRoleButton');
        const saveButtonText = saveButton.querySelector('.button-text');
        const saveButtonSpinner = saveButton.querySelector('.btn-spinner');

        function openAddModal() {
            roleForm.reset();
            modalTitle.textContent = 'Add New Role';
            roleForm.action = "{{ route('user.roles.store') }}";
            methodField.innerHTML = '';
            checkboxes.forEach(cb => cb.checked = false);
            roleModal.show();
        }

        function openEditModal(role, assignedPermissions) {
            roleForm.reset();
            modalTitle.textContent = 'Edit Role: ' + role.name;
            roleNameInput.value = role.name;
            let urlTemplate = "{{ route('user.roles.update', 'PLACEHOLDER') }}";
            let finalUrl = urlTemplate.replace('PLACEHOLDER', role.id);
            roleForm.action = finalUrl;
            methodField.innerHTML = `<input type="hidden" name="_method" value="PUT">`;
            checkboxes.forEach(cb => {
                cb.checked = assignedPermissions.includes(cb.value);
            });
            roleModal.show();
        }

        function closeModal() {
            roleModal.hide();
        }

        function toggleGroup(groupCheckbox) {
            const permissionCheckboxes = groupCheckbox.closest('.border').querySelectorAll('.permission-checkbox');
            permissionCheckboxes.forEach(cb => cb.checked = groupCheckbox.checked);
        }

        roleForm.addEventListener('submit', function(event) {
            if (roleForm.checkValidity()) {
                saveButton.disabled = true;
                saveButtonSpinner.style.display = 'inline-block';
                saveButtonText.textContent = 'Saving...';
            }
        });

        roleModalEl.addEventListener('hidden.bs.modal', function() {
            saveButton.disabled = false;
            saveButtonSpinner.style.display = 'none';
            saveButtonText.textContent = 'Save Role';
        });
    </script>
@endpush
