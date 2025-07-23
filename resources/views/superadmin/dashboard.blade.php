@extends('layouts.app')

@section('title', 'Dousoft | Companies Management')

@section('content')

<!-- Dashboard Content -->
<div class="container-fluid pt-4">
    <!-- Dashboard Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-tachometer-alt me-3" style="color: #3c7139;"></i>SuperAdmin Dashboard
                    </h1>
                    <p class="text-muted mb-0 mt-2">Platform overview and quick actions</p>
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                    <button class="btn btn-sm" style="background-color: #3c7139; color: white;">
                        <i class="fas fa-plus me-1"></i> Quick Action
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-3"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="quick-action-card">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-building text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Approve Companies</h6>
                                <small class="text-muted">3 pending approvals</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="quick-action-card">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-box text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Create Package</h6>
                                <small class="text-muted">Add new subscription plan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="quick-action-card">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-users-cog text-warning"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Manage Roles</h6>
                                <small class="text-muted">Configure permissions</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="quick-action-card">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 p-3 rounded me-3">
                                <i class="fas fa-cog text-info"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">System Settings</h6>
                                <small class="text-muted">Configure platform</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card primary h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Companies</h6>
                            <h3 class="mb-0">24</h3>
                            <span class="text-success small">+5.2% <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-building text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card success h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Active Packages</h6>
                            <h3 class="mb-0">8</h3>
                            <span class="text-success small">+2 this month</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-box text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card warning h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Pending Approvals</h6>
                            <h3 class="mb-0">5</h3>
                            <span class="text-warning small">Require action</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-user-clock text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card danger h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">System Alerts</h6>
                            <h3 class="mb-0">2</h3>
                            <span class="text-danger small">Needs attention</span>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-exclamation-triangle text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Platform Usage Chart -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Platform Usage Analytics</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                            id="chartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Last 30 Days
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="chartDropdown">
                            <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="platformUsageChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Companies -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Companies</h5>
                    <a href="companies.html" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/40" alt="Company Logo"
                                                class="rounded-circle me-2" width="30">
                                            <span>Acme Corporation</span>
                                        </div>
                                    </td>
                                    <td>Premium</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2 days ago</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/40" alt="Company Logo"
                                                class="rounded-circle me-2" width="30">
                                            <span>TechSolutions Ltd</span>
                                        </div>
                                    </td>
                                    <td>Advanced</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>5 days ago</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/40" alt="Company Logo"
                                                class="rounded-circle me-2" width="30">
                                            <span>Global Innovations</span>
                                        </div>
                                    </td>
                                    <td>Basic</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>1 hour ago</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- System Health -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">System Health</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Server Load</span>
                            <span>65%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Database Usage</span>
                            <span>42%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 42%" aria-valuenow="42"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Storage</span>
                            <span>78%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"
                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> Storage reaching capacity. Consider upgrading.
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Activities</h5>
                    <a href="activity.html" class="btn btn-sm btn-outline-secondary">View All</a>
                </div>
                <div class="card-body">
                    <div class="activity-item system">
                        <h6 class="mb-1">System Update Applied</h6>
                        <p class="small text-muted mb-1">Version 2.3.1 deployed with security patches</p>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> 30 minutes ago</small>
                    </div>
                    <div class="activity-item company">
                        <h6 class="mb-1">New Company Registered</h6>
                        <p class="small text-muted mb-1">"Global Innovations" signed up for Basic package</p>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> 1 hour ago</small>
                    </div>
                    <div class="activity-item user">
                        <h6 class="mb-1">User Role Modified</h6>
                        <p class="small text-muted mb-1">Sarah Johnson promoted to Company Admin</p>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> 3 hours ago</small>
                    </div>
                    <div class="activity-item system">
                        <h6 class="mb-1">Backup Completed</h6>
                        <p class="small text-muted mb-1">Nightly database backup successful</p>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> 5 hours ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
