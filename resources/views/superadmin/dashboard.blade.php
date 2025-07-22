<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dousoft - SuperAdmin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="logo" style="background-color: #eee;">
                <img src="assets/image/logoVertical.png" alt="Logo" width="140px">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('superadmin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('superadmin.company.view') }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-link-text">Companies</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="packages.html">
                        <i class="fas fa-box"></i>
                        <span class="nav-link-text">Packages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.html">
                        <i class="fas fa-users-cog"></i>
                        <span class="nav-link-text">User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.html">
                        <i class="fas fa-cog"></i>
                        <span class="nav-link-text">Global Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.html">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-link-text">Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="activity.html">
                        <i class="fas fa-history"></i>
                        <span class="nav-link-text">Activity Log</span>
                    </a>
                </li>
            </ul>
            <div class="quote">
                "Arise, Awake and Stop not until the goal is reached." – Swami Vivekananda
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="btn btn-link" id="sidebarToggle" style="color: #3c7139;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown me-3">
                            <a href="#" class="dropdown-toggle text-dark" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                                <li><h6 class="dropdown-header">Notifications</h6></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-building text-primary me-2"></i> New company registration pending approval</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-exclamation-triangle text-warning me-2"></i> System maintenance scheduled for tonight</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user-plus text-success me-2"></i> 5 new users added this week</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="avtar.webp" alt="User" class="rounded-circle me-2" width="40">
                                <span class="d-none d-md-inline">Super Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

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
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="chartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                        <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle me-2" width="30">
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
                                                        <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle me-2" width="30">
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
                                                        <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle me-2" width="30">
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
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Database Usage</span>
                                        <span>42%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Storage</span>
                                        <span>78%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
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
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize sidebar toggle
            $('#sidebarToggle').click(function() {
                $('#sidebar').toggleClass('collapsed');
                $('#main-content').toggleClass('expanded');
            });

            // Platform Usage Chart
            const ctx = document.getElementById('platformUsageChart').getContext('2d');
            const platformUsageChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'New Companies',
                            data: [12, 19, 15, 22, 18, 24, 27],
                            borderColor: '#3c7139',
                            backgroundColor: 'rgba(60, 113, 57, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Active Users',
                            data: [45, 62, 78, 85, 92, 110, 128],
                            borderColor: '#0d6efd',
                            backgroundColor: 'rgba(13, 110, 253, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
