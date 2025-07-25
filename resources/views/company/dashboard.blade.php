@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')

<!-- Role Tabs Navigation -->
<div class="role-tabs">
    <ul class="nav nav-tabs" id="dashboardTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#company-dashboard">
                <i class="fas fa-building me-2"></i>Company Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#hr-dashboard">
                <i class="fas fa-user-tie me-2"></i>HR Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#pm-dashboard">
                <i class="fas fa-project-diagram me-2"></i>Project Manager
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#finance-dashboard">
                <i class="fas fa-money-bill-wave me-2"></i>Finance
            </a>
        </li>
    </ul>
</div>

<!-- Dashboard Content -->
<div class="container-fluid pt-3">
    <div class="tab-content">
        <!-- Company Dashboard -->
        <div class="tab-pane fade show active" id="company-dashboard">
            <!-- Company Admin Banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div
                        class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="fw-bold text-dark mb-0">
                                <i class="fas fa-building me-3" style="color: var(--primary-color);"></i>Company
                                Overview
                            </h1>
                            <p class="text-muted mb-0 mt-2">High-level view of all company operations</p>
                        </div>
                        <div>
                            <button class="btn btn-sm me-2"
                                style="background: rgba(251, 46, 0, 0.1); color: var(--primary-color);">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-cog me-1"></i> Settings
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Stats Cards -->
            <div class="row company-stats">
                <div class="col-md-6 col-lg-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Total Employees</h6>
                                    <h3 class="mb-0">42</h3>
                                    <span class="text-success small">+2 this month <i
                                            class="fas fa-arrow-up"></i></span>
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
                                    <h6 class="text-muted mb-2">Active Projects</h6>
                                    <h3 class="mb-0">8</h3>
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
                                    <h6 class="text-muted mb-2">Pending Approvals</h6>
                                    <h3 class="mb-0">5</h3>
                                    <span class="text-warning small">Action needed</span>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-clock text-warning"></i>
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
                                    <h6 class="text-muted mb-2">Upcoming Payroll</h6>
                                    <h3 class="mb-0">3 days</h3>
                                    <span class="text-danger small">Prepare now</span>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-money-bill-wave text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Quick Actions</h5>
                            <small><a href="#">View all</a></small>
                        </div>
                        <div class="card-body">
                            <div class="row quick-actions">
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card text-center p-3"
                                        onclick="location.href='employees.html?action=add'">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-2">
                                            <i class="fas fa-user-plus text-primary fs-4"></i>
                                        </div>
                                        <h6>Add Employee</h6>
                                        <small class="text-muted">Onboard new team members</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card text-center p-3"
                                        onclick="location.href='projects.html?action=create'">
                                        <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-2">
                                            <i class="fas fa-project-diagram text-success fs-4"></i>
                                        </div>
                                        <h6>Create Project</h6>
                                        <small class="text-muted">Start a new project</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card text-center p-3"
                                        onclick="location.href='clients.html?action=add'">
                                        <div class="bg-info bg-opacity-10 p-3 rounded-circle d-inline-block mb-2">
                                            <i class="fas fa-handshake text-info fs-4"></i>
                                        </div>
                                        <h6>Add Client</h6>
                                        <small class="text-muted">Register new client</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card text-center p-3"
                                        onclick="location.href='payroll.html?action=process'">
                                        <div class="bg-danger bg-opacity-10 p-3 rounded-circle d-inline-block mb-2">
                                            <i class="fas fa-file-invoice-dollar text-danger fs-4"></i>
                                        </div>
                                        <h6>Process Payroll</h6>
                                        <small class="text-muted">Run this month's payroll</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="row mt-4">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Company Performance Chart -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Company Performance</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="chartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    This Month
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chartDropdown">
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Quarter</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="companyChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div class="card module-card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title mb-0">HR Management</h5>
                                        <i class="fas fa-user-tie fa-2x opacity-50"></i>
                                    </div>
                                    <p class="card-text">Manage employees, attendance, leaves, and
                                        performance evaluations.</p>
                                    <a href="hr.html" class="btn btn-light btn-sm">Go to HRM</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card module-card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title mb-0">Project Management</h5>
                                        <i class="fas fa-project-diagram fa-2x opacity-50"></i>
                                    </div>
                                    <p class="card-text">Create projects, assign tasks, track progress, and
                                        collaborate with teams.</p>
                                    <a href="projects.html" class="btn btn-light btn-sm">Go to Projects</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card module-card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title mb-0">Client Management</h5>
                                        <i class="fas fa-handshake fa-2x opacity-50"></i>
                                    </div>
                                    <p class="card-text">Manage client relationships, projects, and
                                        invoicing.</p>
                                    <a href="clients.html" class="btn btn-light btn-sm">Go to Clients</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card module-card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title mb-0">Payroll System</h5>
                                        <i class="fas fa-money-bill-wave fa-2x opacity-50"></i>
                                    </div>
                                    <p class="card-text">Process salaries, manage deductions, and generate
                                        payslips.</p>
                                    <a href="payroll.html" class="btn btn-light btn-sm">Go to Payroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Recent Activities -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Recent Activities</h5>
                            <small><a href="#">View all</a></small>
                        </div>
                        <div class="card-body">
                            <ul class="recent-activity">
                                <li>
                                    <div class="activity-icon bg-success bg-opacity-10 text-success">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>New Employee Onboarded</h6>
                                        <small>Sarah Johnson joined as Frontend Developer</small>
                                        <small class="d-block text-muted">10 minutes ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon bg-primary bg-opacity-10 text-primary">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Project Milestone Reached</h6>
                                        <small>E-commerce project 80% completed</small>
                                        <small class="d-block text-muted">3 hours ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon bg-info bg-opacity-10 text-info">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Invoice Generated</h6>
                                        <small>Invoice #INV-2023-105 for Client XYZ</small>
                                        <small class="d-block text-muted">Yesterday</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon bg-warning bg-opacity-10 text-warning">
                                        <i class="fas fa-user-clock"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Leave Request</h6>
                                        <small>John Doe applied for 2 days sick leave</small>
                                        <small class="d-block text-muted">Yesterday</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon bg-danger bg-opacity-10 text-danger">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Payment Overdue</h6>
                                        <small>Client ABC payment 5 days overdue</small>
                                        <small class="d-block text-muted">2 days ago</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Upcoming Deadlines -->
                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Upcoming Deadlines</h5>
                            <small><a href="#">View all</a></small>
                        </div>
                        <div class="card-body">
                            <div class="deadline-item">
                                <h6>Payroll Processing</h6>
                                <small class="text-muted">Due in 3 days</small>
                            </div>
                            <div class="deadline-item">
                                <h6>Client ABC Project Delivery</h6>
                                <small class="text-muted">Due in 5 days</small>
                            </div>
                            <div class="deadline-item critical">
                                <h6>Tax Filing Deadline</h6>
                                <small class="text-muted">Due in 7 days</small>
                            </div>
                            <div class="deadline-item">
                                <h6>Employee Performance Reviews</h6>
                                <small class="text-muted">Due in 10 days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HR Dashboard -->
        <div class="tab-pane fade" id="hr-dashboard">
            <!-- HR Banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div
                        class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center hr-dashboard">
                        <div>
                            <h1 class="fw-bold text-dark mb-0">
                                <i class="fas fa-user-tie me-3" style="color: var(--hr-color);"></i>HR
                                Dashboard
                            </h1>
                            <p class="text-muted mb-0 mt-2">Human Resources management overview</p>
                        </div>
                        <div>
                            <button class="btn btn-sm me-2"
                                style="background: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                            <button class="btn btn-sm" style="background-color: var(--hr-color); color: white;">
                                <i class="fas fa-plus me-1"></i> New HR Task
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HR Stats Cards -->
            <div class="row hr-stats">
                <div class="col-md-6 col-lg-3">
                    <div class="card hr-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Total Employees</h6>
                                    <h3 class="mb-0">42</h3>
                                    <span class="text-success small">+2 this month <i
                                            class="fas fa-arrow-up"></i></span>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-users" style="color: var(--hr-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card hr-stat-card">
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
                <div class="col-md-6 col-lg-3">
                    <div class="card hr-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Active Recruitments</h6>
                                    <h3 class="mb-0">3</h3>
                                    <span class="text-info small">In progress</span>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-user-plus" style="color: var(--hr-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card hr-stat-card">
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

            <!-- HR Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">HR Quick Actions</h5>
                            <small><a href="hr.html">Go to HR Module</a></small>
                        </div>
                        <div class="card-body">
                            <div class="row quick-actions">
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card hr-action-card text-center p-3"
                                        onclick="location.href='hr.html?action=add-employee'">
                                        <div class="p-3 rounded-circle d-inline-block mb-2"
                                            style="background: rgba(52, 152, 219, 0.1);">
                                            <i class="fas fa-user-plus"
                                                style="color: var(--hr-color); font-size: 1.5rem;"></i>
                                        </div>
                                        <h6>Add Employee</h6>
                                        <small class="text-muted">Onboard new team member</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card hr-action-card text-center p-3"
                                        onclick="location.href='hr.html?action=process-leaves'">
                                        <div class="p-3 rounded-circle d-inline-block mb-2"
                                            style="background: rgba(52, 152, 219, 0.1);">
                                            <i class="fas fa-calendar-check"
                                                style="color: var(--hr-color); font-size: 1.5rem;"></i>
                                        </div>
                                        <h6>Process Leaves</h6>
                                        <small class="text-muted">Approve/reject leave requests</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card hr-action-card text-center p-3"
                                        onclick="location.href='hr.html?action=start-recruitment'">
                                        <div class="p-3 rounded-circle d-inline-block mb-2"
                                            style="background: rgba(52, 152, 219, 0.1);">
                                            <i class="fas fa-user-graduate"
                                                style="color: var(--hr-color); font-size: 1.5rem;"></i>
                                        </div>
                                        <h6>Start Recruitment</h6>
                                        <small class="text-muted">Create new job posting</small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3">
                                    <div class="card action-card hr-action-card text-center p-3"
                                        onclick="location.href='hr.html?action=performance-reviews'">
                                        <div class="p-3 rounded-circle d-inline-block mb-2"
                                            style="background: rgba(52, 152, 219, 0.1);">
                                            <i class="fas fa-clipboard-list"
                                                style="color: var(--hr-color); font-size: 1.5rem;"></i>
                                        </div>
                                        <h6>Performance Reviews</h6>
                                        <small class="text-muted">Schedule evaluations</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HR Content Area -->
            <div class="row mt-4">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Employee Attendance Chart -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Employee Attendance</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="attendanceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    This Month
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="attendanceDropdown">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Quarter</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="hrAttendanceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Recent HR Activities -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent HR Activities</h5>
                        </div>
                        <div class="card-body">
                            <ul class="recent-activity">
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>New Employee Onboarded</h6>
                                        <small>Sarah Johnson joined as Frontend Developer</small>
                                        <small class="d-block text-muted">10 minutes ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Leave Approved</h6>
                                        <small>John Doe's leave request for 2 days approved</small>
                                        <small class="d-block text-muted">3 hours ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Performance Review Scheduled</h6>
                                        <small>Quarterly reviews scheduled for next week</small>
                                        <small class="d-block text-muted">Yesterday</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Upcoming HR Tasks -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Upcoming HR Tasks</h5>
                            <small><a href="hr.html">View all</a></small>
                        </div>
                        <div class="card-body">
                            <div class="deadline-item">
                                <h6>Performance Reviews</h6>
                                <small class="text-muted">Due in 3 days</small>
                            </div>
                            <div class="deadline-item">
                                <h6>Payroll Processing</h6>
                                <small class="text-muted">Due in 5 days</small>
                            </div>
                            <div class="deadline-item critical">
                                <h6>Tax Compliance Deadline</h6>
                                <small class="text-muted">Due in 7 days</small>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Status -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Employee Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Active Employees</span>
                                <span class="badge bg-success">42</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>On Leave Today</span>
                                <span class="badge bg-warning">3</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Probation Period</span>
                                <span class="badge bg-info">2</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Notice Period</span>
                                <span class="badge bg-secondary">1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Manager Dashboard -->
        <div class="tab-pane fade" id="pm-dashboard">
            <!-- PM Banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div
                        class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center pm-dashboard">
                        <div>
                            <h1 class="fw-bold text-dark mb-0">
                                <i class="fas fa-project-diagram me-3" style="color: var(--pm-color);"></i>Project
                                Manager Dashboard
                            </h1>
                            <p class="text-muted mb-0 mt-2">Project tracking and team management</p>
                        </div>
                        <div>
                            <button class="btn btn-sm me-2"
                                style="background: rgba(155, 89, 182, 0.1); color: var(--pm-color);">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                            <button class="btn btn-sm" style="background-color: var(--pm-color); color: white;">
                                <i class="fas fa-plus me-1"></i> New Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PM Stats Cards -->
            <div class="row pm-stats">
                <div class="col-md-6 col-lg-3">
                    <div class="card pm-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Active Projects</h6>
                                    <h3 class="mb-0">8</h3>
                                    <span class="text-success small">On track</span>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-project-diagram" style="color: var(--pm-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card pm-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Overdue Tasks</h6>
                                    <h3 class="mb-0">5</h3>
                                    <span class="text-warning small">Needs attention</span>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-exclamation-triangle" style="color: var(--pm-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card pm-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Team Members</h6>
                                    <h3 class="mb-0">15</h3>
                                    <span class="text-info small">Active</span>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-users" style="color: var(--pm-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card pm-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Upcoming Milestones</h6>
                                    <h3 class="mb-0">3</h3>
                                    <span class="text-danger small">Due soon</span>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-flag" style="color: var(--pm-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PM Content Area -->
            <div class="row mt-4">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Project Progress Chart -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Project Progress</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="projectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Projects
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="projectDropdown">
                                    <li><a class="dropdown-item" href="#">E-commerce Platform</a></li>
                                    <li><a class="dropdown-item" href="#">Mobile App</a></li>
                                    <li><a class="dropdown-item" href="#">Website Redesign</a></li>
                                    <li><a class="dropdown-item" href="#">All Projects</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pmProgressChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Quick Project Actions -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Project Quick Actions</h5>
                            <small><a href="projects.html">Go to Projects</a></small>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-primary w-100 mb-2">
                                <i class="fas fa-plus me-2"></i>Create New Project
                            </button>
                            <button class="btn btn-outline-secondary w-100 mb-2">
                                <i class="fas fa-tasks me-2"></i>Assign Tasks
                            </button>
                            <button class="btn btn-outline-success w-100 mb-2">
                                <i class="fas fa-chart-line me-2"></i>Generate Report
                            </button>
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-users me-2"></i>Manage Team
                            </button>
                        </div>
                    </div>

                    <!-- Recent Project Updates -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Project Updates</h5>
                        </div>
                        <div class="card-body">
                            <ul class="recent-activity">
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(155, 89, 182, 0.1); color: var(--pm-color);">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Task Completed</h6>
                                        <small>Homepage redesign completed</small>
                                        <small class="d-block text-muted">2 hours ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(155, 89, 182, 0.1); color: var(--pm-color);">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>New Comment</h6>
                                        <small>Client feedback on prototype</small>
                                        <small class="d-block text-muted">5 hours ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(155, 89, 182, 0.1); color: var(--pm-color);">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Milestone Reached</h6>
                                        <small>Phase 1 development completed</small>
                                        <small class="d-block text-muted">Yesterday</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Finance Dashboard -->
        <div class="tab-pane fade" id="finance-dashboard">
            <!-- Finance Banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div
                        class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center finance-dashboard">
                        <div>
                            <h1 class="fw-bold text-dark mb-0">
                                <i class="fas fa-money-bill-wave me-3" style="color: var(--finance-color);"></i>Finance
                                Dashboard
                            </h1>
                            <p class="text-muted mb-0 mt-2">Financial overview and accounting</p>
                        </div>
                        <div>
                            <button class="btn btn-sm me-2"
                                style="background: rgba(230, 126, 34, 0.1); color: var(--finance-color);">
                                <i class="fas fa-sync-alt me-1"></i> Refresh
                            </button>
                            <button class="btn btn-sm" style="background-color: var(--finance-color); color: white;">
                                <i class="fas fa-plus me-1"></i> New Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Finance Stats Cards -->
            <div class="row finance-stats">
                <div class="col-md-6 col-lg-3">
                    <div class="card finance-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Monthly Revenue</h6>
                                    <h3 class="mb-0">$24,580</h3>
                                    <span class="text-success small">+12% from last month</span>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-dollar-sign" style="color: var(--finance-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card finance-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Pending Invoices</h6>
                                    <h3 class="mb-0">5</h3>
                                    <span class="text-warning small">$8,450 total</span>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-file-invoice" style="color: var(--finance-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card finance-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Upcoming Payroll</h6>
                                    <h3 class="mb-0">$18,320</h3>
                                    <span class="text-info small">Due in 3 days</span>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-money-check-alt" style="color: var(--finance-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card finance-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Expenses This Month</h6>
                                    <h3 class="mb-0">$9,450</h3>
                                    <span class="text-danger small">+5% from last month</span>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-receipt" style="color: var(--finance-color);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Finance Content Area -->
            <div class="row mt-4">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Financial Performance Chart -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Financial Performance</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="financeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    This Quarter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="financeDropdown">
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Quarter</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="financeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Quick Finance Actions -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Finance Quick Actions</h5>
                            <small><a href="payroll.html">Go to Finance</a></small>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-primary w-100 mb-2"
                                style="border-color: var(--finance-color); color: var(--finance-color);">
                                <i class="fas fa-file-invoice-dollar me-2"></i>Create Invoice
                            </button>
                            <button class="btn btn-outline-secondary w-100 mb-2"
                                style="border-color: var(--finance-color); color: var(--finance-color);">
                                <i class="fas fa-money-check-alt me-2"></i>Process Payroll
                            </button>
                            <button class="btn btn-outline-success w-100 mb-2"
                                style="border-color: var(--finance-color); color: var(--finance-color);">
                                <i class="fas fa-chart-pie me-2"></i>Generate Report
                            </button>
                            <button class="btn btn-outline-info w-100"
                                style="border-color: var(--finance-color); color: var(--finance-color);">
                                <i class="fas fa-receipt me-2"></i>Record Expense
                            </button>
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Transactions</h5>
                        </div>
                        <div class="card-body">
                            <ul class="recent-activity">
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(230, 126, 34, 0.1); color: var(--finance-color);">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Invoice Paid</h6>
                                        <small>Client ABC paid $2,500</small>
                                        <small class="d-block text-muted">Today</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(230, 126, 34, 0.1); color: var(--finance-color);">
                                        <i class="fas fa-money-check-alt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Salary Processed</h6>
                                        <small>Monthly payroll completed</small>
                                        <small class="d-block text-muted">2 days ago</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity-icon"
                                        style="background-color: rgba(230, 126, 34, 0.1); color: var(--finance-color);">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <div class="activity-details">
                                        <h6>Expense Recorded</h6>
                                        <small>Office supplies $320</small>
                                        <small class="d-block text-muted">3 days ago</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
