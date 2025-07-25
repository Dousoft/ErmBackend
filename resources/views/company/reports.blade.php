@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Reports Content -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-chart-bar me-3" style="color: var(--hr-color);"></i>Reports &
                        Analytics
                    </h1>
                    <p class="text-muted mb-0 mt-2">Generate and analyze company performance reports</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(52, 152, 219, 0.1); color: var(--hr-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh Data
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle"
                            style="background-color: var(--hr-color); color: white;" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-download me-1"></i> Export
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2"></i>PDF</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i>Excel</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-csv me-2"></i>CSV</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="reportFilters">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="reportType" class="form-label">Report Type</label>
                                <select class="form-select" id="reportType">
                                    <option value="financial">Financial Reports</option>
                                    <option value="attendance">Attendance Reports</option>
                                    <option value="project">Project Reports</option>
                                    <option value="employee">Employee Performance</option>
                                    <option value="client">Client Reports</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dateRange" class="form-label">Date Range</label>
                                <select class="form-select" id="dateRange">
                                    <option value="today">Today</option>
                                    <option value="week">This Week</option>
                                    <option value="month" selected>This Month</option>
                                    <option value="quarter">This Quarter</option>
                                    <option value="year">This Year</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-none" id="customDateRange">
                                <label for="startDate" class="form-label">From</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="col-md-3 d-none" id="customDateRangeEnd">
                                <label for="endDate" class="form-label">To</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                            <div class="col-md-3">
                                <label for="departmentFilter" class="form-label">Department</label>
                                <select class="form-select" id="departmentFilter">
                                    <option value="all" selected>All Departments</option>
                                    <option value="development">Development</option>
                                    <option value="design">Design</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="hr">Human Resources</option>
                                    <option value="sales">Sales</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-2"></i>Apply Filters
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Revenue</h6>
                            <h3 class="mb-0">$24,580</h3>
                            <span class="text-success small">+12% from last month <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-dollar-sign text-primary"></i>
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
                            <h6 class="text-muted mb-2">Projects Completed</h6>
                            <h3 class="mb-0">8</h3>
                            <span class="text-success small">2 ahead of schedule</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-check-circle text-success"></i>
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
                            <h6 class="text-muted mb-2">Avg. Employee Hours</h6>
                            <h3 class="mb-0">38.5</h3>
                            <span class="text-warning small">+2.5h from last week</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-clock text-warning"></i>
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
                            <h6 class="text-muted mb-2">Client Satisfaction</h6>
                            <h3 class="mb-0">4.7/5</h3>
                            <span class="text-info small">Based on 23 reviews</span>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-smile text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Tabs -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="reportTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="financial-tab" data-bs-toggle="tab"
                                data-bs-target="#financial" type="button" role="tab">
                                <i class="fas fa-money-bill-wave me-2"></i>Financial
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="attendance-tab" data-bs-toggle="tab"
                                data-bs-target="#attendance" type="button" role="tab">
                                <i class="fas fa-calendar-check me-2"></i>Attendance
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="project-tab" data-bs-toggle="tab" data-bs-target="#project"
                                type="button" role="tab">
                                <i class="fas fa-project-diagram me-2"></i>Projects
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee"
                                type="button" role="tab">
                                <i class="fas fa-users me-2"></i>Employees
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="client-tab" data-bs-toggle="tab" data-bs-target="#client"
                                type="button" role="tab">
                                <i class="fas fa-handshake me-2"></i>Clients
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="reportTabContent">
                        <!-- Financial Reports Tab -->
                        <div class="tab-pane fade show active" id="financial" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0">Revenue vs Expenses</h5>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle" type="button"
                                                    id="financialChartDropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="financialChartDropdown">
                                                    <li><a class="dropdown-item" href="#">View Details</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Export Data</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Reset View</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="financialChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Income Sources</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="incomeSourcesChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0">Recent Invoices</h5>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-plus me-1"></i> New Invoice
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice #</th>
                                                            <th>Client</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Due Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>INV-2023-001</td>
                                                            <td>Acme Corp</td>
                                                            <td>Jul 15, 2023</td>
                                                            <td>$5,250.00</td>
                                                            <td><span class="badge bg-success">Paid</span>
                                                            </td>
                                                            <td>Jul 30, 2023</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-download"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>INV-2023-002</td>
                                                            <td>Globex Inc</td>
                                                            <td>Jul 18, 2023</td>
                                                            <td>$3,750.00</td>
                                                            <td><span class="badge bg-warning">Pending</span>
                                                            </td>
                                                            <td>Aug 2, 2023</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-download"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>INV-2023-003</td>
                                                            <td>Wayne Enterprises</td>
                                                            <td>Jul 20, 2023</td>
                                                            <td>$8,900.00</td>
                                                            <td><span class="badge bg-danger">Overdue</span>
                                                            </td>
                                                            <td>Jul 10, 2023</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-download"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Attendance Reports Tab -->
                        <div class="tab-pane fade" id="attendance" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Monthly Attendance Overview</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="attendanceChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Department-wise Attendance</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="departmentAttendanceChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Attendance Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Employee</th>
                                                            <th>Department</th>
                                                            <th>Present Days</th>
                                                            <th>Leave Days</th>
                                                            <th>Absent Days</th>
                                                            <th>Overtime Hours</th>
                                                            <th>Attendance %</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>John Doe</span>
                                                                </div>
                                                            </td>
                                                            <td>Development</td>
                                                            <td>20</td>
                                                            <td>1</td>
                                                            <td>0</td>
                                                            <td>5.5</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 95%"
                                                                        aria-valuenow="95" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>95%</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>Jane Smith</span>
                                                                </div>
                                                            </td>
                                                            <td>Marketing</td>
                                                            <td>18</td>
                                                            <td>3</td>
                                                            <td>0</td>
                                                            <td>2.0</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 85%"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>85%</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>Mike Johnson</span>
                                                                </div>
                                                            </td>
                                                            <td>HR</td>
                                                            <td>15</td>
                                                            <td>2</td>
                                                            <td>4</td>
                                                            <td>0.0</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-warning"
                                                                        role="progressbar" style="width: 71%"
                                                                        aria-valuenow="71" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>71%</small>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Reports Tab -->
                        <div class="tab-pane fade" id="project" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Project Progress</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="projectProgressChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Project Status</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="projectStatusChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Project Milestones</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Project</th>
                                                            <th>Client</th>
                                                            <th>Milestone</th>
                                                            <th>Due Date</th>
                                                            <th>Status</th>
                                                            <th>Completion</th>
                                                            <th>Team</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Website Redesign</td>
                                                            <td>Acme Corp</td>
                                                            <td>Design Approval</td>
                                                            <td>Jul 25, 2023</td>
                                                            <td><span class="badge bg-success">Completed</span>
                                                            </td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="avatar-group">
                                                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                    <img src="https://ui-avatars.com/api/?name=Sarah+Williams&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile App</td>
                                                            <td>Globex Inc</td>
                                                            <td>Beta Testing</td>
                                                            <td>Aug 5, 2023</td>
                                                            <td><span class="badge bg-primary">In
                                                                    Progress</span></td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-primary"
                                                                        role="progressbar" style="width: 75%"
                                                                        aria-valuenow="75" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="avatar-group">
                                                                    <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>CRM System</td>
                                                            <td>Wayne Enterprises</td>
                                                            <td>Database Migration</td>
                                                            <td>Jul 30, 2023</td>
                                                            <td><span class="badge bg-warning">Pending</span>
                                                            </td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-warning"
                                                                        role="progressbar" style="width: 30%"
                                                                        aria-valuenow="30" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="avatar-group">
                                                                    <img src="https://ui-avatars.com/api/?name=David+Brown&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                                        alt="" class="rounded-circle" width="24">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Employee Reports Tab -->
                        <div class="tab-pane fade" id="employee" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Performance Ratings</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="performanceChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Department-wise Performance</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="departmentPerformanceChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Employee Performance Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Employee</th>
                                                            <th>Department</th>
                                                            <th>Position</th>
                                                            <th>Rating</th>
                                                            <th>Completed Tasks</th>
                                                            <th>Productivity</th>
                                                            <th>Last Review</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>John Doe</span>
                                                                </div>
                                                            </td>
                                                            <td>Development</td>
                                                            <td>Senior Developer</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star-half-alt text-warning"></i>
                                                                    <span class="ms-1">4.5</span>
                                                                </div>
                                                            </td>
                                                            <td>24</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 92%"
                                                                        aria-valuenow="92" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>92%</small>
                                                            </td>
                                                            <td>Jun 15, 2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>Jane Smith</span>
                                                                </div>
                                                            </td>
                                                            <td>Marketing</td>
                                                            <td>Marketing Manager</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="far fa-star text-warning"></i>
                                                                    <span class="ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                            <td>18</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 88%"
                                                                        aria-valuenow="88" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>88%</small>
                                                            </td>
                                                            <td>Jun 20, 2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=random"
                                                                        alt="" class="rounded-circle me-2" width="32">
                                                                    <span>Mike Johnson</span>
                                                                </div>
                                                            </td>
                                                            <td>HR</td>
                                                            <td> HR Manager</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <span class="ms-1">5.0</span>
                                                                </div>
                                                            </td>
                                                            <td>15</td>
                                                            <td>
                                                                <div class="progress progress-thin">
                                                                    <div class="progress-bar bg-success"
                                                                        role="progressbar" style="width: 95%"
                                                                        aria-valuenow="95" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <small>95%</small>
                                                            </td>
                                                            <td>Jun 10, 2023</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Client Reports Tab -->
                        <div class="tab-pane fade" id="client" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Client Revenue</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="clientRevenueChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Client Satisfaction</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container" style="height: 300px;">
                                                <canvas id="clientSatisfactionChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Client Engagement</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Client</th>
                                                            <th>Projects</th>
                                                            <th>Total Revenue</th>
                                                            <th>Avg. Satisfaction</th>
                                                            <th>Last Project</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Acme Corp</td>
                                                            <td>5</td>
                                                            <td>$24,500.00</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star-half-alt text-warning"></i>
                                                                    <span class="ms-1">4.5</span>
                                                                </div>
                                                            </td>
                                                            <td>Website Redesign</td>
                                                            <td><span class="badge bg-success">Active</span>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-envelope"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Globex Inc</td>
                                                            <td>3</td>
                                                            <td>$18,750.00</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="far fa-star text-warning"></i>
                                                                    <span class="ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                            <td>Mobile App</td>
                                                            <td><span class="badge bg-primary">In
                                                                    Progress</span></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-envelope"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Wayne Enterprises</td>
                                                            <td>2</td>
                                                            <td>$12,900.00</td>
                                                            <td>
                                                                <div class="rating">
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star text-warning"></i>
                                                                    <i class="fas fa-star-half-alt text-warning"></i>
                                                                    <i class="far fa-star text-warning"></i>
                                                                    <span class="ms-1">3.5</span>
                                                                </div>
                                                            </td>
                                                            <td>CRM System</td>
                                                            <td><span class="badge bg-warning">Pending</span>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-envelope"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
    </div>
</div>



@endsection
