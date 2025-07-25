@extends('layouts.superadmin.app')

@section('title', 'Dousoft | Companies Management')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Industry Wise Roles</h2>

    <!-- Add Role Button -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addRoleModal">
        <i class="fas fa-plus"></i> Add Role
    </button>

    <!-- Table -->
    <div class="table-responsive">
        <table id="rolesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Role Name</th>
                    <th>Industry Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industryTypeRoles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role->role }}</td>
                    <td>{{ $role->industryType->name ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addRoleForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!-- Role Name -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role Name</label>
                        <input type="text" class="form-control" name="role" id="role" required>
                    </div>

                    <!-- Industry Type Dropdown -->
                    <div class="mb-3">
                        <label for="industry_type_id" class="form-label">Industry Type</label>
                        <select class="form-select" name="industry_type_id" id="industry_type_id" required>
                            <option value="" disabled selected>Select Industry Type</option>
                            @foreach ($industryTypes as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Role</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

{{-- Add role script --}}
<script>
    let table;

    $(document).ready(function () {
        table = $('#rolesTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search role or industry..."
            }
        });

        $('#addRoleForm').on('submit', function (e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: "{{ route('superadmin.roles.store') }}",
                type: "POST",
                data: formData,
                success: function (result) {
                    if (result.status === 'success') {
                        $('#addRoleModal').modal('hide');
                        $('#addRoleForm')[0].reset();

                        let newRowIndex = table.rows().count() + 1;
                        table.row.add([
                            newRowIndex,
                            result.role.role,
                            result.role.industry_type_name
                        ]).draw(false);

                        toastr.success(result.message);

                        if (result.redirect) {
                            setTimeout(() => {
                                window.location.href = result.redirect;
                            }, 2000);
                        }

                    } else {
                        toastr.error(result.message || 'Failed to add role.');
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON?.errors;

                    if (errors) {
                        // Laravel validation errors
                        Object.values(errors).forEach(err => toastr.error(err[0]));
                    } else if (xhr.responseJSON?.message) {
                        // Custom error message (like duplicate role)
                        toastr.error(xhr.responseJSON.message);
                    } else {
                        toastr.error('Something went wrong.');
                    }
                }

            });
        });
    });
</script>

@endpush
