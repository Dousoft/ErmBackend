@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- HRM Dashboard Header -->
<div class="container-fluid pt-3">
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-user-tie me-3" style="color: var(--hr-color);"></i>HR Management
                    </h1>
                    <p class="text-muted mb-0 mt-2">Manage employees, attendance, leaves, and performance</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm hrm-action-btn" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        <i class="fas fa-user-plus me-1"></i> Add Employee
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- HRM Stats Cards -->
    <div class="row">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card hrm-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Employees</h6>
                            <h3 class="mb-0">42</h3>
                            <span class="text-success small">+2 this month <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-users" style="color: var(--hr-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card hrm-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Present Today</h6>
                            <h3 class="mb-0">38</h3>
                            <span class="text-success small">90.5% attendance</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-calendar-check" style="color: var(--hr-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card hrm-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Pending Leaves</h6>
                            <h3 class="mb-0">5</h3>
                            <span class="text-warning small">Needs approval</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-calendar-alt" style="color: var(--hr-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card hrm-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Upcoming Reviews</h6>
                            <h3 class="mb-0">7</h3>
                            <span class="text-danger small">Due soon</span>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-clipboard-check" style="color: var(--hr-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HRM Tabs Navigation -->
    <ul class="nav nav-tabs hrm-tab mb-4" id="hrmTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="employees-tab" data-bs-toggle="tab" data-bs-target="#employees"
                type="button" role="tab">
                <i class="fas fa-users me-2"></i>Employees
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="attendance-tab" data-bs-toggle="tab" data-bs-target="#attendance" type="button"
                role="tab">
                <i class="fas fa-calendar-check me-2"></i>Attendance
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="leaves-tab" data-bs-toggle="tab" data-bs-target="#leaves" type="button"
                role="tab">
                <i class="fas fa-calendar-minus me-2"></i>Leaves
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="performance-tab" data-bs-toggle="tab" data-bs-target="#performance"
                type="button" role="tab">
                <i class="fas fa-chart-line me-2"></i>Performance
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="recruitment-tab" data-bs-toggle="tab" data-bs-target="#recruitment"
                type="button" role="tab">
                <i class="fas fa-user-graduate me-2"></i>Recruitment
            </button>
        </li>
    </ul>

    <!-- HRM Tab Content -->
    <div class="tab-content" id="hrmTabContent">
        <!-- Employees Tab -->
        <div class="tab-pane fade show active" id="employees" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-primary w-100 mb-3" data-bs-toggle="modal"
                                data-bs-target="#addEmployeeModal">
                                <i class="fas fa-user-plus me-2"></i>Add Employee
                            </button>
                            <button class="btn btn-outline-secondary w-100 mb-3">
                                <i class="fas fa-file-export me-2"></i>Export Data
                            </button>
                            <button class="btn btn-outline-success w-100 mb-3">
                                <i class="fas fa-id-card me-2"></i>Generate IDs
                            </button>
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-envelope me-2"></i>Send Announcement
                            </button>
                        </div>
                    </div>

                    <div class="card hrm-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Employee Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Active Employees</span>
                                <span class="badge bg-success">42</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>On Probation</span>
                                <span class="badge bg-warning">3</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>On Leave Today</span>
                                <span class="badge bg-info">4</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Notice Period</span>
                                <span class="badge bg-secondary">1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Employee List</h5>
                            <div class="input-group" style="width: 250px;">
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Search employees...">
                                <button class="btn btn-sm btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="employee1.jpg" class="employee-avatar me-3" alt="John Doe">
                                                <div>
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-muted">EMP-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Development</td>
                                        <td>Senior Developer</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- More employee rows -->
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted">Showing 1 to 10 of 42 employees</small>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Tab -->
        <div class="tab-pane fade" id="attendance" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Attendance Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Select Date</label>
                                <input type="date" class="form-control" value="2023-06-15">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select">
                                    <option>All Departments</option>
                                    <option>Development</option>
                                    <option>HR</option>
                                    <option>Marketing</option>
                                </select>
                            </div>
                            <button class="btn hrm-action-btn w-100">
                                <i class="fas fa-filter me-2"></i>Apply Filters
                            </button>
                        </div>
                    </div>

                    <div class="card hrm-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Today's Stats</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Present</span>
                                <span class="badge bg-success">38</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Absent</span>
                                <span class="badge bg-danger">2</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>On Leave</span>
                                <span class="badge bg-warning">2</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Late Arrivals</span>
                                <span class="badge bg-info">3</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Attendance Records</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <button class="btn btn-sm hrm-action-btn">
                                    <i class="fas fa-plus me-1"></i>Add Manual Entry
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="employee1.jpg" class="employee-avatar me-3" alt="John Doe">
                                                <div>
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-muted">EMP-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>08:45 AM</td>
                                        <td>05:30 PM</td>
                                        <td><span class="attendance-status-present"><i
                                                    class="fas fa-check-circle me-1"></i>Present</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- More attendance rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leaves Tab -->
        <div class="tab-pane fade" id="leaves" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Leave Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Leave Type</label>
                                <select class="form-select">
                                    <option>All Types</option>
                                    <option>Sick Leave</option>
                                    <option>Casual Leave</option>
                                    <option>Earned Leave</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option>All Statuses</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                </select>
                            </div>
                            <button class="btn hrm-action-btn w-100">
                                <i class="fas fa-filter me-2"></i>Apply Filters
                            </button>
                        </div>
                    </div>

                    <div class="card hrm-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Leave Balance</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Sick Leave</span>
                                <span class="badge bg-info">12/15 days</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Casual Leave</span>
                                <span class="badge bg-success">5/10 days</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Earned Leave</span>
                                <span class="badge bg-warning">8/30 days</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Maternity Leave</span>
                                <span class="badge bg-secondary">0/90 days</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Leave Applications</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <button class="btn btn-sm hrm-action-btn">
                                    <i class="fas fa-plus me-1"></i>Add Leave
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Leave Type</th>
                                        <th>Dates</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="employee1.jpg" class="employee-avatar me-3" alt="John Doe">
                                                <div>
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-muted">EMP-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Sick Leave</td>
                                        <td>Jun 15 - Jun 16, 2023</td>
                                        <td>2</td>
                                        <td><span class="leave-status-pending"><i
                                                    class="fas fa-clock me-1"></i>Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success me-1">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- More leave rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Tab -->
        <div class="tab-pane fade" id="performance" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Performance Metrics</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select">
                                    <option>All Departments</option>
                                    <option>Development</option>
                                    <option>HR</option>
                                    <option>Marketing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Time Period</label>
                                <select class="form-select">
                                    <option>Last 30 Days</option>
                                    <option>Last Quarter</option>
                                    <option>Last 6 Months</option>
                                    <option>Last Year</option>
                                </select>
                            </div>
                            <button class="btn hrm-action-btn w-100">
                                <i class="fas fa-filter me-2"></i>Apply Filters
                            </button>
                        </div>
                    </div>

                    <div class="card hrm-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Overall Ratings</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Average Performance Score</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 78%">78%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>Task Completion Rate</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%">85%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6>Goal Achievement</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 65%">65%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Employee Performance</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <button class="btn btn-sm hrm-action-btn">
                                    <i class="fas fa-plus me-1"></i>Schedule Review
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Department</th>
                                        <th>Last Review</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="employee1.jpg" class="employee-avatar me-3" alt="John Doe">
                                                <div>
                                                    <h6 class="mb-0">John Doe</h6>
                                                    <small class="text-muted">EMP-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Development</td>
                                        <td>May 15, 2023</td>
                                        <td>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 85%">85%</div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">Exceeds</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- More performance rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recruitment Tab -->
        <div class="tab-pane fade" id="recruitment" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recruitment Stats</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Open Positions</span>
                                <span class="badge bg-primary">5</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Applications</span>
                                <span class="badge bg-info">42</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Interviews</span>
                                <span class="badge bg-warning">12</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Hired This Month</span>
                                <span class="badge bg-success">3</span>
                            </div>
                        </div>
                    </div>

                    <div class="card hrm-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-primary w-100 mb-3">
                                <i class="fas fa-plus me-2"></i>Create Job Posting
                            </button>
                            <button class="btn btn-outline-secondary w-100 mb-3">
                                <i class="fas fa-calendar me-2"></i>Schedule Interview
                            </button>
                            <button class="btn btn-outline-success w-100 mb-3">
                                <i class="fas fa-file-export me-2"></i>Export Candidates
                            </button>
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-envelope me-2"></i>Send Offer Letter
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card hrm-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Candidate Pipeline</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <button class="btn btn-sm hrm-action-btn">
                                    <i class="fas fa-plus me-1"></i>Add Candidate
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="recruitment-stages" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="applied-tab" data-bs-toggle="pill"
                                        data-bs-target="#applied" type="button" role="tab">Applied (15)</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="screening-tab" data-bs-toggle="pill"
                                        data-bs-target="#screening" type="button" role="tab">Screening (8)</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="interview-tab" data-bs-toggle="pill"
                                        data-bs-target="#interview" type="button" role="tab">Interview (5)</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="offer-tab" data-bs-toggle="pill"
                                        data-bs-target="#offer" type="button" role="tab">Offer (2)</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="hired-tab" data-bs-toggle="pill"
                                        data-bs-target="#hired" type="button" role="tab">Hired (3)</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="recruitmentStagesContent">
                                <div class="tab-pane fade show active" id="applied" role="tabpanel">
                                    <div class="table-container">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Candidate</th>
                                                    <th>Position</th>
                                                    <th>Applied On</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="candidate1.jpg" class="employee-avatar me-3"
                                                                alt="Sarah Smith">
                                                            <div>
                                                                <h6 class="mb-0">Sarah Smith</h6>
                                                                <small class="text-muted">Frontend Developer</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Frontend Developer</td>
                                                    <td>Jun 10, 2023</td>
                                                    <td><span class="badge bg-info">New</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <!-- More candidate rows -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Other recruitment stages -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm">
                    <ul class="nav nav-tabs mb-4" id="employeeFormTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal" type="button" role="tab">Personal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="employment-tab" data-bs-toggle="tab"
                                data-bs-target="#employment" type="button" role="tab">Employment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                                type="button" role="tab">Documents</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank"
                                type="button" role="tab">Bank Details</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="employeeFormTabContent">
                        <!-- Personal Information Tab -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Information Tab -->
                        <div class="tab-pane fade" id="employment" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Department</label>
                                    <select class="form-select">
                                        <option>Development</option>
                                        <option>HR</option>
                                        <option>Marketing</option>
                                        <option>Sales</option>
                                        <option>Operations</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Reporting Manager</label>
                                    <select class="form-select">
                                        <option>John Doe</option>
                                        <option>Jane Smith</option>
                                        <option>Michael Johnson</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Joining Date</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employment Type</label>
                                    <select class="form-select">
                                        <option>Full-time</option>
                                        <option>Part-time</option>
                                        <option>Contract</option>
                                        <option>Intern</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Salary</label>
                                    <input type="number" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Active</option>
                                        <option>Probation</option>
                                        <option>Notice Period</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Tab -->
                        <div class="tab-pane fade" id="documents" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload CV/Resume</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload ID Proof</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload Offer Letter</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload Experience Letter</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload Educational Certificates</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload Other Documents</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Bank Details Tab -->
                        <div class="tab-pane fade" id="bank" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">IFSC Code</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">PAN Number</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Aadhar Number</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn hrm-action-btn">Save Employee</button>
            </div>
        </div>
    </div>
</div>

<!-- Leave Approval Modal -->
<div class="modal fade" id="leaveApprovalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Employee</label>
                    <input type="text" class="form-control" value="John Doe (EMP-001)" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Leave Type</label>
                    <input type="text" class="form-control" value="Sick Leave" readonly>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">From Date</label>
                        <input type="date" class="form-control" value="2023-06-15" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">To Date</label>
                        <input type="date" class="form-control" value="2023-06-16" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Reason</label>
                    <textarea class="form-control" rows="3"
                        readonly>Having fever and doctor advised rest for 2 days.</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Rejected</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comments</label>
                    <textarea class="form-control" rows="2" placeholder="Enter comments if any"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn hrm-action-btn">Update Status</button>
            </div>
        </div>
    </div>
</div>

<!-- Performance Review Modal -->
<div class="modal fade" id="performanceReviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Performance Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Employee</label>
                        <input type="text" class="form-control" value="John Doe (EMP-001)" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Review Date</label>
                        <input type="date" class="form-control" value="2023-06-15">
                    </div>
                </div>

                <h6 class="mb-3">Key Performance Indicators</h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>KPI</th>
                                <th>Weightage</th>
                                <th>Self Rating</th>
                                <th>Manager Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Quality of Work</td>
                                <td>30%</td>
                                <td>
                                    <select class="form-select form-select-sm">
                                        <option>1 - Needs Improvement</option>
                                        <option>2 - Developing</option>
                                        <option selected>3 - Meets Expectations</option>
                                        <option>4 - Exceeds Expectations</option>
                                        <option>5 - Outstanding</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm">
                                        <option>1 - Needs Improvement</option>
                                        <option>2 - Developing</option>
                                        <option>3 - Meets Expectations</option>
                                        <option selected>4 - Exceeds Expectations</option>
                                        <option>5 - Outstanding</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- More KPI rows -->
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <label class="form-label">Strengths</label>
                    <textarea class="form-control" rows="2">Excellent problem-solving skills and team player.</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Areas for Improvement</label>
                    <textarea class="form-control" rows="2">Could improve time management on complex tasks.</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Overall Comments</label>
                    <textarea class="form-control"
                        rows="3">John has performed exceptionally well this quarter, exceeding expectations on most KPIs. He has shown great initiative and leadership on the recent project.</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Overall Rating</label>
                    <select class="form-select">
                        <option>1 - Needs Improvement</option>
                        <option>2 - Developing</option>
                        <option>3 - Meets Expectations</option>
                        <option selected>4 - Exceeds Expectations</option>
                        <option>5 - Outstanding</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn hrm-action-btn">Save Review</button>
            </div>
        </div>
    </div>
</div>

@endsection
