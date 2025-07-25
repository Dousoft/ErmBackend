@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Client Management Content -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-handshake me-3" style="color: var(--primary-color);"></i>Client Management
                    </h1>
                    <p class="text-muted mb-0 mt-2">Manage all client relationships, projects, and invoices</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(251, 46, 0, 0.1); color: var(--primary-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                        <i class="fas fa-plus me-1"></i> Add Client
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Stats Cards -->
    <div class="row client-stats">
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Clients</h6>
                            <h3 class="mb-0">24</h3>
                            <span class="text-success small">+3 this month <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-handshake text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Active Projects</h6>
                            <h3 class="mb-0">15</h3>
                            <span class="text-success small">On track</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-project-diagram text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Pending Invoices</h6>
                            <h3 class="mb-0">5</h3>
                            <span class="text-warning small">$12,450 total</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-file-invoice-dollar text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Overdue Payments</h6>
                            <h3 class="mb-0">3</h3>
                            <span class="text-danger small">$5,200 total</span>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-exclamation-triangle text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client List and Details -->
    <div class="row mt-4">
        <!-- Client List -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Client List</h5>
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" class="form-control" placeholder="Search clients...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 600px;">
                        <table class="table table-hover mb-0">
                            <thead style="position: sticky; top: 0; background-color: #f8f9fa; z-index: 1;">
                                <tr>
                                    <th>Client Name</th>
                                    <th>Projects</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="client-row" data-client-id="1" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=ABC+Corp&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>ABC Corporation</span>
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="client-row" data-client-id="2" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=XYZ+Inc&background=random" alt=""
                                                class="rounded-circle me-2" width="32">
                                            <span>XYZ Inc.</span>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="client-row" data-client-id="3" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Global+Tech&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Global Tech</span>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr class="client-row" data-client-id="4" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Sunrise+Media&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Sunrise Media</span>
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="client-row" data-client-id="5" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Ocean+Enterprises&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Ocean Enterprises</span>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td><span class="badge bg-danger">Overdue</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Client Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Client Details</h5>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary me-2">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Client Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <img src="https://ui-avatars.com/api/?name=ABC+Corp&background=random" alt="Client Logo"
                                class="img-fluid rounded-circle mb-3" width="120">
                            <h5>ABC Corporation</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Contact Person</label>
                                        <p class="mb-0">John Smith</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Email</label>
                                        <p class="mb-0">john.smith@abccorp.com</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Phone</label>
                                        <p class="mb-0">+1 (555) 123-4567</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Company Address</label>
                                        <p class="mb-0">123 Business Ave, Suite 400<br>New York, NY 10001</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Registration Date</label>
                                        <p class="mb-0">March 15, 2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Client Projects -->
                    <div class="mb-4">
                        <h6 class="mb-3">Active Projects (3)</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Budget</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>E-commerce Website</td>
                                        <td><span class="badge bg-success">In Progress</span></td>
                                        <td>May 1, 2023</td>
                                        <td>Aug 30, 2023</td>
                                        <td>$25,000</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile App Development</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>Jun 15, 2023</td>
                                        <td>Oct 15, 2023</td>
                                        <td>$35,000</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SEO Optimization</td>
                                        <td><span class="badge bg-info">Planning</span></td>
                                        <td>Jul 1, 2023</td>
                                        <td>Dec 31, 2023</td>
                                        <td>$12,000</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Client Invoices -->
                    <div class="mb-4">
                        <h6 class="mb-3">Recent Invoices (5)</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>INV-2023-105</td>
                                        <td>Jul 1, 2023</td>
                                        <td>$5,000</td>
                                        <td>Jul 15, 2023</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INV-2023-106</td>
                                        <td>Jul 15, 2023</td>
                                        <td>$7,500</td>
                                        <td>Jul 30, 2023</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INV-2023-107</td>
                                        <td>Aug 1, 2023</td>
                                        <td>$3,200</td>
                                        <td>Aug 15, 2023</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Client Communication -->
                    <div>
                        <h6 class="mb-3">Recent Communication</h6>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="message-thread" style="max-height: 200px; overflow-y: auto;">
                                    <div class="message received">
                                        <div class="message-content">
                                            <p>Hi there, just checking in on the progress of the e-commerce project. Can
                                                you provide an update?</p>
                                            <div class="message-time">John Smith - Jul 20, 2023 10:15 AM</div>
                                        </div>
                                    </div>
                                    <div class="message sent">
                                        <div class="message-content">
                                            <p>Hello John, we're currently at 65% completion. I'll send you a detailed
                                                progress report by EOD.</p>
                                            <div class="message-time">You - Jul 20, 2023 10:30 AM</div>
                                        </div>
                                    </div>
                                    <div class="message received">
                                        <div class="message-content">
                                            <p>Thanks for the quick response. Looking forward to the report.</p>
                                            <div class="message-time">John Smith - Jul 20, 2023 10:32 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-composer p-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type your message...">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clientForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="clientName" required>
                            </div>
                            <div class="mb-3">
                                <label for="contactPerson" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="contactPerson" required>
                            </div>
                            <div class="mb-3">
                                <label for="clientEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="clientEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="clientPhone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="clientPhone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientAddress" class="form-label">Address</label>
                                <textarea class="form-control" id="clientAddress" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="clientWebsite" class="form-label">Website</label>
                                <input type="url" class="form-control" id="clientWebsite">
                            </div>
                            <div class="mb-3">
                                <label for="clientIndustry" class="form-label">Industry</label>
                                <select class="form-select" id="clientIndustry">
                                    <option value="">Select Industry</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Education">Education</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="clientNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="clientNotes" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveClientBtn">Save Client</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
            // Initialize sidebar toggle
            $('#sidebarToggle').click(function() {
                $('#sidebar').toggleClass('collapsed');
                $('#main-content').toggleClass('expanded');
            });

            // Client row click handler


            // Save client handler
            $('#saveClientBtn').click(function() {
                // Validate form
                if ($('#clientName').val() === '' || $('#contactPerson').val() === '' || $('#clientEmail').val() === '') {
                    alert('Please fill in all required fields');
                    return;
                }

                // In a real application, this would submit the form to the server
                console.log('Client data to be saved:', {
                    name: $('#clientName').val(),
                    contact: $('#contactPerson').val(),
                    email: $('#clientEmail').val(),
                    phone: $('#clientPhone').val(),
                    address: $('#clientAddress').val(),
                    website: $('#clientWebsite').val(),
                    industry: $('#clientIndustry').val(),
                    notes: $('#clientNotes').val()
                });

                // Show success message and close modal
                alert('Client added successfully!');
                $('#addClientModal').modal('hide');

                // Reset form
                $('#clientForm')[0].reset();
            });

            // Select first client by default
            $('.client-row').first().click();
        });
</script>
@endsection
