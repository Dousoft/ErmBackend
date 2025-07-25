@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Employee Management Content -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-users me-3" style="color: var(--hr-color);"></i>Employee Management
                    </h1>
                    <p class="text-muted mb-0 mt-2">Manage all employee records, attendance, and performance</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm" style="background-color: var(--hr-color); color: white;"
                        data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        <i class="fas fa-plus me-1"></i> Add Employee
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee Stats Cards -->
    <div class="row employee-stats">
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Employees</h6>
                            <h3 class="mb-0">42</h3>
                            <span class="text-success small">+3 this month <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-users text-primary"></i>
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
                            <h6 class="text-muted mb-2">Present Today</h6>
                            <h3 class="mb-0">38</h3>
                            <span class="text-success small">90.5% attendance</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-calendar-check text-success"></i>
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
                            <h6 class="text-muted mb-2">On Leave</h6>
                            <h3 class="mb-0">4</h3>
                            <span class="text-warning small">2 sick, 2 vacation</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-umbrella-beach text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">New Hires</h6>
                            <h3 class="mb-0">3</h3>
                            <span class="text-info small">This month</span>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-user-plus text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee List and Details -->
    <div class="row mt-4">
        <!-- Employee List -->
        <div class="col-lg-4">
            <div class="card hrm-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Employee List</h5>
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" class="form-control" placeholder="Search employees...">
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
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="employee-row" data-employee-id="1" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td>Development</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="employee-row" data-employee-id="2" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Jane Smith</span>
                                        </div>
                                    </td>
                                    <td>Marketing</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="employee-row" data-employee-id="3" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Mike Johnson</span>
                                        </div>
                                    </td>
                                    <td>HR</td>
                                    <td><span class="badge bg-warning">On Leave</span></td>
                                </tr>
                                <tr class="employee-row" data-employee-id="4" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Williams&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>Sarah Williams</span>
                                        </div>
                                    </td>
                                    <td>Design</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr class="employee-row" data-employee-id="5" style="cursor: pointer;">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=David+Brown&background=random"
                                                alt="" class="rounded-circle me-2" width="32">
                                            <span>David Brown</span>
                                        </div>
                                    </td>
                                    <td>Sales</td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Employee Details</h5>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary me-2" id="editEmployeeBtn">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" id="deleteEmployeeBtn">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Employee Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="Employee Photo"
                                class="img-fluid rounded-circle mb-3" width="120">
                            <h5>John Doe</h5>
                            <span class="badge bg-success">Active</span>
                            <p class="text-muted mb-0">Senior Developer</p>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Employee ID</label>
                                        <p class="mb-0">EMP-001</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Email</label>
                                        <p class="mb-0">john.doe@company.com</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Phone</label>
                                        <p class="mb-0">+1 (555) 123-4567</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Department</label>
                                        <p class="mb-0">Development</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Hire Date</label>
                                        <p class="mb-0">January 15, 2022</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Employment Type</label>
                                        <p class="mb-0">Full-time</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Salary</label>
                                        <p class="mb-0">$85,000/year</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Manager</label>
                                        <p class="mb-0">Sarah Williams (Design Lead)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Tabs -->
                    <ul class="nav nav-tabs mb-4" id="employeeTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="attendance-tab" data-bs-toggle="tab"
                                data-bs-target="#attendance" type="button" role="tab">Attendance</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="performance-tab" data-bs-toggle="tab"
                                data-bs-target="#performance" type="button" role="tab">Performance</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                                type="button" role="tab">Documents</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="employeeTabContent">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-3">Personal Information</h6>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Date of Birth</label>
                                        <p class="mb-0">June 12, 1990</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Gender</label>
                                        <p class="mb-0">Male</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Address</label>
                                        <p class="mb-0">123 Main St, Apt 4B<br>New York, NY 10001</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-3">Professional Information</h6>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Skills</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-light text-dark">JavaScript</span>
                                            <span class="badge bg-light text-dark">React</span>
                                            <span class="badge bg-light text-dark">Node.js</span>
                                            <span class="badge bg-light text-dark">SQL</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted small mb-1">Education</label>
                                        <p class="mb-0">MS in Computer Science<br>University of Technology, 2012</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Attendance Tab -->
                        <div class="tab-pane fade" id="attendance" role="tabpanel">
                            <div class="mb-4">
                                <h6 class="mb-3">Monthly Attendance Summary</h6>
                                <div class="chart-container" style="height: 250px;">
                                    <canvas id="attendanceChart"></canvas>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6 class="mb-3">Recent Attendance Records</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Clock In</th>
                                                <th>Clock Out</th>
                                                <th>Hours Worked</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jul 20, 2023</td>
                                                <td>09:05 AM</td>
                                                <td>06:15 PM</td>
                                                <td>8.5</td>
                                                <td><span class="badge bg-success">Present</span></td>
                                            </tr>
                                            <tr>
                                                <td>Jul 19, 2023</td>
                                                <td>09:00 AM</td>
                                                <td>05:45 PM</td>
                                                <td>8.0</td>
                                                <td><span class="badge bg-success">Present</span></td>
                                            </tr>
                                            <tr>
                                                <td>Jul 18, 2023</td>
                                                <td>09:10 AM</td>
                                                <td>06:30 PM</td>
                                                <td>8.75</td>
                                                <td><span class="badge bg-success">Present</span></td>
                                            </tr>
                                            <tr>
                                                <td>Jul 17, 2023</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><span class="badge bg-warning">Sick Leave</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Tab -->
                        <div class="tab-pane fade" id="performance" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-3">Current OKRs</h6>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6>Improve Code Quality</h6>
                                            <div class="progress progress-thin mb-2">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <p class="small text-muted mb-0">Reduce bug reports by 30% by Q3</p>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6>Learn New Framework</h6>
                                            <div class="progress progress-thin mb-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 40%"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="small text-muted mb-0">Complete Vue.js certification by December
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-3">Performance Metrics</h6>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <div class="progress-circle">
                                                <svg class="progress-circle-svg" viewBox="0 0 36 36">
                                                    <path class="progress-circle-bg"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <path class="progress-circle-fill" stroke-dasharray="85, 100"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <text class="progress-circle-text" x="18" y="20.35">85%</text>
                                                </svg>
                                            </div>
                                            <h6 class="mt-3">Overall Performance</h6>
                                            <p class="small text-muted">Last review: June 15, 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="mb-3">Recent Feedback</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Williams&background=random"
                                                alt="Manager" class="rounded-circle me-3" width="40">
                                            <div>
                                                <h6 class="mb-0">Sarah Williams</h6>
                                                <p class="small text-muted mb-0">Design Lead - June 15, 2023</p>
                                            </div>
                                        </div>
                                        <p class="mb-0">John has shown excellent problem-solving skills this quarter.
                                            His work on the new authentication system was particularly impressive. Would
                                            like to see more initiative in mentoring junior team members.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Tab -->
                        <div class="tab-pane fade" id="documents" role="tabpanel">
                            <h6 class="mb-3">Employee Documents</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Document</th>
                                            <th>Type</th>
                                            <th>Upload Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Employment Contract</td>
                                            <td>Contract</td>
                                            <td>Jan 10, 2022</td>
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
                                            <td>Resume</td>
                                            <td>CV</td>
                                            <td>Jan 5, 2022</td>
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
                                            <td>ID Proof</td>
                                            <td>Identification</td>
                                            <td>Jan 12, 2022</td>
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
                            <button class="btn btn-sm btn-outline-primary mt-3">
                                <i class="fas fa-plus me-1"></i> Upload Document
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm">
                    <ul class="nav nav-tabs mb-4" id="employeeFormTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic"
                                type="button" role="tab">Basic Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="employment-tab" data-bs-toggle="tab"
                                data-bs-target="#employment" type="button" role="tab">Employment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="documents-tab" data-bs-toggle="tab"
                                data-bs-target="#documents-form" type="button" role="tab">Documents</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="employeeFormTabContent">
                        <!-- Basic Info Tab -->
                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Tab -->
                        <div class="tab-pane fade" id="employment" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeId" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" id="employeeId">
                                    </div>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" id="department">
                                            <option value="">Select Department</option>
                                            <option value="Development">Development</option>
                                            <option value="Design">Design</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="HR">Human Resources</option>
                                            <option value="Sales">Sales</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="position">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hireDate" class="form-label">Hire Date</label>
                                        <input type="date" class="form-control" id="hireDate">
                                    </div>
                                    <div class="mb-3">
                                        <label for="employmentType" class="form-label">Employment Type</label>
                                        <select class="form-select" id="employmentType">
                                            <option value="">Select Type</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" id="salary">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="skills" class="form-label">Skills</label>
                                <input type="text" class="form-control" id="skills"
                                    placeholder="Add skills separated by commas">
                            </div>
                        </div>

                        <!-- Documents Tab -->
                        <div class="tab-pane fade" id="documents-form" role="tabpanel">
                            <div class="mb-3">
                                <label for="resume" class="form-label">Resume/CV</label>
                                <input type="file" class="form-control" id="resume">
                            </div>
                            <div class="mb-3">
                                <label for="idProof" class="form-label">ID Proof</label>
                                <input type="file" class="form-control" id="idProof">
                            </div>
                            <div class="mb-3">
                                <label for="contract" class="form-label">Employment Contract</label>
                                <input type="file" class="form-control" id="contract">
                            </div>
                            <div class="mb-3">
                                <label for="otherDocuments" class="form-label">Other Documents</label>
                                <input type="file" class="form-control" id="otherDocuments" multiple>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEmployeeBtn">Save Employee</button>
            </div>
        </div>
    </div>
</div>

@endsection
