@extends('layouts.superadmin.app')

@section('title', 'Industry Types Management')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Industry Types</h2>

    <!-- Add Industry Button -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addIndustryModal">
        <i class="fas fa-industry"></i> Add Industry Type
    </button>

    <!-- Table -->
    <div class="table-responsive">
        <table id="industryTypesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Industry Type Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industryTypes as $index => $industry)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $industry->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Industry Modal -->
<div class="modal fade" id="addIndustryModal" tabindex="-1" aria-labelledby="addIndustryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addIndustryForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Industry Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!-- Industry Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Industry Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add Industry</button>
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

<script>
    let table;

    $(document).ready(function () {
        table = $('#industryTypesTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search industry..."
            }
        });

        $('#addIndustryForm').on('submit', function (e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: "{{ route('superadmin.industry.types.store') }}",
                type: "POST",
                data: formData,
                success: function (result) {
                    if (result.status === 'success') {
                        $('#addIndustryModal').modal('hide');
                        $('#addIndustryForm')[0].reset();

                        const newIndex = table.rows().count() + 1;
                        table.row.add([
                            newIndex,
                            result.industry_type.name
                        ]).draw(false);

                        toastr.success(result.message);
                    } else {
                        toastr.error(result.message || 'Failed to add industry type.');
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON?.errors;

                    if (errors) {
                        Object.values(errors).forEach(err => toastr.error(err[0]));
                    } else if (xhr.responseJSON?.message) {
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
