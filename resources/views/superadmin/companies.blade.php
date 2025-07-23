@extends('layouts.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Companies Management Content -->
<div class="container-fluid">
    <div class="row mb-4" style="margin-top: 40px;">
        <div class="col-12">
            <div class="dashboard-banner glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">

                <h3 class="fw-bold">Companies Management</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Companies</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add New Company Button -->
    <div class="row mb-4">
        <div class="col-12">
            <button class="btn" data-bs-toggle="modal" data-bs-target="#addCompanyModal"
                style="background-color: #fb2e00;color: white;">
                <i class="fas fa-plus me-2"></i> <b>Add New Company</b>
            </button>
        </div>
    </div>

    <!-- Companies Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">All Companies</h5>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search companies..." id="searchCompany">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="companiesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Contact Email</th>
                                    <th>Employees</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->employees_count ?? 0 }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ ucfirst($company->packageDetails->package_name ?? 'N/A') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $company->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($company->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                                            data-bs-target="#editCompanyModal" data-id="{{ $company->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-id="{{ $company->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No companies found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Company Modal -->
<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Company</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="addCompanyForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Company Name*</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Email*</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Contact Number*</label>
                            <input type="tel" name="contact" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password*</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Package*</label>
                            <select class="form-select" name="package_id" id="packageSelect" required>
                                <option value="">Select Package</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Industry Type*</label>
                            <select class="form-select" name="industry_type" id="industryTypeSelect" required>
                                <option value="">Select Industry Type*</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Registration Date*</label>
                            <input type="date" name="registration_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address*</label>
                        <textarea class="form-control" name="address" rows="2" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Website URL</label>
                            <input type="url" name="website_url" class="form-control" placeholder="https://">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" form="addCompanyForm">Add Company</button>
            </div>
        </div>
    </div>
</div>

<script>
    //load all packages
    document.addEventListener("DOMContentLoaded", function () {
        fetch("/packages-list")
            .then(res => res.json())
            .then(data => {
                const select = document.getElementById("packageSelect");
                select.innerHTML = '<option value="">Select Package</option>';
                data.forEach(package => {
                    const option = document.createElement("option");
                    option.value = package.id;
                    option.textContent = package.package_name;
                    select.appendChild(option);
                });
            })
            .catch(err => console.error("Error in loading packages", err));
    });

    //load industry type
    document.addEventListener("DOMContentLoaded", function () {
        fetch("/industry-type-list")
            .then(res => res.json())
            .then(data => {
                const select = document.getElementById("industryTypeSelect");
                select.innerHTML = '<option value="">Select Industry Type</option>';
                data.forEach(industry => {
                    const option = document.createElement("option");
                    option.value = industry.name;
                    option.textContent = industry.name;
                    select.appendChild(option);
                });
            })
            .catch(err => console.error("Error in loading industry type", err));
    });

</script>

{{-- add company (hit function) --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('addCompanyForm');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            const submitBtn = form.querySelector('button[type="submit"]') || document.querySelector('button[form="addCompanyForm"]');
            submitBtn.disabled = true;
            submitBtn.innerText = "Submitting...";

            fetch("{{ route('superadmin.company.store') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerText = "Add Company";

                if (data.status === "success") {
                    form.reset();
                    const modalEl = document.getElementById('addCompanyModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                    toastr.success(data.message, "Success");

                    // Reload if needed
                    location.reload();
                } else {
                    toastr.error("Unexpected error occurred.", "Error");
                }
            })
            .catch(async (error) => {
                submitBtn.disabled = false;
                submitBtn.innerText = "Add Company";

                if (error instanceof Response) {
                    const errData = await error.json();
                    if (errData?.error) {
                        let messages = Object.values(errData.error).flat().join('<br>');
                        toastr.error(messages, "Validation Error");
                    } else {
                        toastr.error("An unknown error occurred.", "Error");
                    }
                } else {
                    toastr.error("Network or server error.", "Error");
                    console.error(error);
                }
            });
        });
    });
</script>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#companiesTable').DataTable();
    });
</script>
@endpush

@endsection
