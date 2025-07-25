@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')

<!-- Main Content Area -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-bold text-dark mb-0">
                            <i class="fas fa-building me-3" style="color: var(--primary-color);"></i>My Company
                        </h1>
                        <p class="text-muted mb-0 mt-2">Manage your company details and settings</p>
                    </div>
                    <div>
                        <button class="btn btn-sm me-2"
                            style="background: rgba(251, 46, 0, 0.1); color: var(--primary-color);">
                            <i class="fas fa-sync-alt me-1"></i> Refresh
                        </button>
                        <button class="btn btn-sm btn-primary" id="editCompanyBtn">
                            <i class="fas fa-edit me-1"></i> Edit Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Company Details Section -->
    <div class="row">
        <!-- Left Column - Company Information -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Company Information</h5>
                    <span class="badge bg-success">Active</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="company-logo-container mb-3">
                                <img src="https://media.istockphoto.com/id/178447404/photo/modern-business-buildings.jpg?s=612x612&w=0&k=20&c=MOG9lvRz7WjsVyW3IiQ0srEzpaBPDcc7qxYsBCvAUJs="
                                    alt="Company Logo" class="img-fluid rounded" id="companyLogo">
                                <div class="logo-upload-overlay" id="logoUploadOverlay">
                                    <i class="fas fa-camera"></i>
                                    <span>Change Logo</span>
                                </div>
                                <input type="file" id="logoUpload" accept="image/*" style="display: none;">
                            </div>
                            <h5 id="companyNameDisplay">Acme Corporation</h5>
                            <p class="text-muted" id="companyIndustryDisplay">Software Development</p>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Company Name</label>
                                    <p class="mb-0" id="companyName">Acme Corporation</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Registration Date</label>
                                    <p class="mb-0" id="registrationDate">2023-01-15</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Industry Type</label>
                                    <p class="mb-0" id="industryType">Software Development</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Subscription Plan</label>
                                    <p class="mb-0" id="subscriptionPlan">Premium (10 users)</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted small mb-1">Company Address</label>
                                    <p class="mb-0" id="companyAddress">123 Tech Park, Silicon Valley, CA 94025, USA</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Contact Email</label>
                                    <p class="mb-0" id="contactEmail">contact@acme.com</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Contact Phone</label>
                                    <p class="mb-0" id="contactPhone">+1 (555) 123-4567</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Website</label>
                                    <p class="mb-0" id="companyWebsite">www.acme.com</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small mb-1">Tax ID</label>
                                    <p class="mb-0" id="taxId">US-123456789</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label text-muted small mb-1">Company Description</label>
                                    <p class="mb-0" id="companyDescription">Acme Corporation is a leading software
                                        development company specializing in enterprise solutions and SaaS applications
                                        for businesses of all sizes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subscription Details -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Subscription Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="subscription-card p-3 rounded text-center">
                                <h6 class="text-muted">Current Plan</h6>
                                <h3 class="my-3" id="currentPlan">Premium</h3>
                                <p class="mb-2"><span id="userLimit">10</span> Users</p>
                                <p class="mb-2">$<span id="planPrice">99</span>/month</p>
                                <button class="btn btn-sm btn-outline-primary w-100 mt-2">Upgrade Plan</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Plan Features</h6>
                                <small><a href="#" data-bs-toggle="modal" data-bs-target="#planComparisonModal">Compare
                                        Plans</a></small>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-check-circle text-success me-2"></i>HR Management</span>
                                    <small class="text-muted">Full access</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-check-circle text-success me-2"></i>Project Management</span>
                                    <small class="text-muted">Up to 15 projects</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-check-circle text-success me-2"></i>Client Management</span>
                                    <small class="text-muted">Unlimited clients</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-check-circle text-success me-2"></i>Payroll System</span>
                                    <small class="text-muted">Full access</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-check-circle text-success me-2"></i>Advanced Reporting</span>
                                    <small class="text-muted">All features</small>
                                </li>
                            </ul>
                            <div class="mt-3">
                                <p class="mb-1"><strong>Next Billing Date:</strong> <span
                                        id="nextBillingDate">2023-08-15</span></p>
                                <p class="mb-0"><strong>Subscription Status:</strong> <span
                                        class="badge bg-success">Active</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Quick Stats and Actions -->
        <div class="col-lg-4">
            <!-- Company Stats -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Company Stats</h5>
                </div>
                <div class="card-body">
                    <div class="company-stat-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Active Employees</h6>
                            <h4 class="mb-0">42</h4>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                    </div>
                    <div class="company-stat-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Active Projects</h6>
                            <h4 class="mb-0">8</h4>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-project-diagram text-success"></i>
                        </div>
                    </div>
                    <div class="company-stat-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Active Clients</h6>
                            <h4 class="mb-0">15</h4>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-handshake text-info"></i>
                        </div>
                    </div>
                    <div class="company-stat-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Monthly Revenue</h6>
                            <h4 class="mb-0">$24,580</h4>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-dollar-sign text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-user-plus me-2"></i>Add Employee
                    </button>
                    <button class="btn btn-outline-secondary w-100 mb-2">
                        <i class="fas fa-project-diagram me-2"></i>Create Project
                    </button>
                    <button class="btn btn-outline-success w-100 mb-2">
                        <i class="fas fa-handshake me-2"></i>Add Client
                    </button>
                    <button class="btn btn-outline-info w-100">
                        <i class="fas fa-file-invoice-dollar me-2"></i>Generate Invoice
                    </button>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Activities</h5>
                    <small><a href="#">View all</a></small>
                </div>
                <div class="card-body">
                    <ul class="recent-activity">
                        <li>
                            <div class="activity-icon bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-details">
                                <h6>New Employee Added</h6>
                                <small>Sarah Johnson joined as Frontend Developer</small>
                                <small class="d-block text-muted">10 minutes ago</small>
                            </div>
                        </li>
                        <li>
                            <div class="activity-icon bg-success bg-opacity-10 text-success">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="activity-details">
                                <h6>Project Created</h6>
                                <small>New E-commerce platform project</small>
                                <small class="d-block text-muted">3 hours ago</small>
                            </div>
                        </li>
                        <li>
                            <div class="activity-icon bg-info bg-opacity-10 text-info">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="activity-details">
                                <h6>New Client Onboarded</h6>
                                <small>XYZ Corporation signed up</small>
                                <small class="d-block text-muted">Yesterday</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Company Modal -->
<div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompanyModalLabel">Edit Company Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="companyForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editCompanyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="editCompanyName" value="Acme Corporation">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editIndustryType" class="form-label">Industry Type</label>
                            <select class="form-select" id="editIndustryType">
                                <option selected>Software Development</option>
                                <option>Information Technology</option>
                                <option>Marketing & Advertising</option>
                                <option>Finance & Banking</option>
                                <option>Healthcare</option>
                                <option>Education</option>
                                <option>Retail</option>
                                <option>Manufacturing</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editContactEmail" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="editContactEmail" value="contact@acme.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editContactPhone" class="form-label">Contact Phone</label>
                            <input type="tel" class="form-control" id="editContactPhone" value="+1 (555) 123-4567">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editCompanyAddress" class="form-label">Company Address</label>
                            <textarea class="form-control" id="editCompanyAddress"
                                rows="2">123 Tech Park, Silicon Valley, CA 94025, USA</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editCompanyWebsite" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="editCompanyWebsite" value="www.acme.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editTaxId" class="form-label">Tax ID</label>
                            <input type="text" class="form-control" id="editTaxId" value="US-123456789">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="editCompanyDescription" class="form-label">Company Description</label>
                            <textarea class="form-control" id="editCompanyDescription"
                                rows="3">Acme Corporation is a leading software development company specializing in enterprise solutions and SaaS applications for businesses of all sizes.</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveCompanyDetails">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Plan Comparison Modal -->
<div class="modal fade" id="planComparisonModal" tabindex="-1" aria-labelledby="planComparisonModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="planComparisonModalLabel">Plan Comparison</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Feature</th>
                                <th>Basic</th>
                                <th>Standard</th>
                                <th>Premium</th>
                                <th>Enterprise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Price</td>
                                <td>$29/month</td>
                                <td>$59/month</td>
                                <td>$99/month</td>
                                <td>Custom</td>
                            </tr>
                            <tr>
                                <td>Users</td>
                                <td>5</td>
                                <td>10</td>
                                <td>20</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <td>Projects</td>
                                <td>5</td>
                                <td>15</td>
                                <td>30</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <td>HR Management</td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>Project Management</td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>Client Management</td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>Payroll System</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>Advanced Reporting</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td>Basic</td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>API Access</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td>Limited</td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td>Priority Support</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Upgrade Plan</button>
            </div>
        </div>
    </div>
</div>
@endsection
