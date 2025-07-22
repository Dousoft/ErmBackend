<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dousoft | Companies Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Custom CSS (Same as Dashboard) -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar (Same as Dashboard) -->
           <div class="sidebar" id="sidebar">
            <div class="logo" style="background-color: #eee;">
                <img src="assets/image/logoVertical.png" alt="Logo" width="140px">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route("superadmin.dashboard") }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="companies.html">
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
            <!-- Top Navbar (Same as Dashboard) -->
              <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="btn btn-link" id="sidebarToggle" style="color: #3c7139;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-dark" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                                <li><h6 class="dropdown-header">Notifications</h6></li>
                                <li><a class="dropdown-item" href="#">New company registered</a></li>
                                <li><a class="dropdown-item" href="#">Project deadline approaching</a></li>
                                <li><a class="dropdown-item" href="#">System maintenance scheduled</a></li>
                            </ul>
                        </div>
                        <div class="dropdown ms-3">
                            <a href="#" class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="avtar.webp" alt="User" class="rounded-circle me-2" width="55px">

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

            <!-- Companies Management Content -->
            <div class="container-fluid" >
                <div class="row mb-4"  style="margin-top: 40px;">
                    <div class="col-12">
                         <div class="dashboard-banner glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">

                             <h3 class="fw-bold">Companies Management</h3>
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                                     <li class="breadcrumb-item active">Companies</li>
                                 </ol>
                             </nav>
                         </div>
                    </div>
                </div>

                <!-- Add New Company Button -->
                <div class="row mb-4">
                    <div class="col-12">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#addCompanyModal" style="background-color: #fb2e00;color: white;">
                            <i class="fas fa-plus me-2"></i> Add New Company
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
                                            <tr>
                                                <td>1</td>
                                                <td>Tech Solutions Inc.</td>
                                                <td>contact@techsolutions.com</td>
                                                <td>24</td>
                                                <td><span class="badge bg-primary">Premium</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editCompanyModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Global Innovations</td>
                                                <td>info@globalinnov.com</td>
                                                <td>15</td>
                                                <td><span class="badge bg-secondary">Basic</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- More rows can be dynamically loaded via JS -->
                                             <tr>
                                                <td>2</td>
                                                <td>Global Innovations</td>
                                                <td>info@globalinnov.com</td>
                                                <td>15</td>
                                                <td><span class="badge bg-secondary">Basic</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>SpaceX</td>
                                                <td>info@spacex.com</td>
                                                <td>45</td>
                                                <td><span class="badge bg-secondary">Basic</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Web Innovations</td>
                                                <td>info@webinovations.com</td>
                                                <td>25</td>
                                                <td><span class="badge bg-secondary">Basic</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tech Nova</td>
                                                <td>info@technova.com</td>
                                                <td>15</td>
                                                <td><span class="badge bg-secondary">Basic</span></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
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

    <!-- Add Company Modal -->
         <div class="modal fade" id="addCompanyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register New Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCompanyForm">
                    <!-- Step Indicators -->
                    <div class="step-indicator mb-4">
                        <div class="step active" data-step="1">Basic Info</div>
                        <div class="step" data-step="2">Documents</div>
                        <div class="step" data-step="3">Review</div>
                        <div class="step" data-step="4">Credentials</div>
                        <div class="step" data-step="5">Complete</div>
                    </div>

                    <!-- Step 1: Basic Information -->
                    <div class="step-content" data-step-content="1">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Company Name*</label>
                                <input type="text" name="company_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Email*</label>
                                <input type="email" name="contact_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number*</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Package*</label>
                                <select class="form-select" name="package" required>
                                    <option value="">Select Package</option>
                                    <option value="basic">Basic</option>
                                    <option value="premium">Premium</option>
                                    <option value="enterprise">Enterprise</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Registered Address*</label>
                            <textarea class="form-control" name="address" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Website URL</label>
                            <input type="url" name="website" class="form-control" placeholder="https://">
                        </div>
                    </div>

                    <!-- Step 2: Document Verification -->
                    <div class="step-content d-none" data-step-content="2">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Please upload the required documents for verification.
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Business Registration Certificate*</label>
                                <input type="file" class="form-control" name="registration_cert" accept=".pdf,.jpg,.png" required>
                                <small class="text-muted">PDF, JPG or PNG (max 5MB)</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tax Identification Document*</label>
                                <input type="file" class="form-control" name="tax_doc" accept=".pdf,.jpg,.png" required>
                                <small class="text-muted">PDF, JPG or PNG (max 5MB)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Proof of Address*</label>
                                <input type="file" class="form-control" name="address_proof" accept=".pdf,.jpg,.png" required>
                                <small class="text-muted">Utility bill or bank statement</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ID of Authorized Signatory*</label>
                                <input type="file" class="form-control" name="signatory_id" accept=".pdf,.jpg,.png" required>
                                <small class="text-muted">Passport or national ID</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Additional Documents (Optional)</label>
                            <input type="file" class="form-control" name="additional_docs" multiple>
                            <small class="text-muted">Any other supporting documents</small>
                        </div>
                    </div>

                    <!-- Step 3: Review Information -->
                    <div class="step-content d-none" data-step-content="3">
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i> Please review all information before submission.
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">Company Information</div>
                            <div class="card-body">
                                <div id="reviewContent">
                                    <!-- Dynamically populated with entered data -->
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label" for="termsCheck">
                                I certify that all information provided is accurate and complete
                            </label>
                        </div>
                    </div>

                    <!-- Step 4: Credentials -->
                    <div class="step-content d-none text-center" data-step-content="4">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            <h3 class="mt-3">Congratulations!</h3>
                            <p class="lead">Your company has been successfully registered with us.</p>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                Company Dashboard Credentials
                            </div>
                            <div class="card-body text-start">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Company ID:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="companyIdDisplay" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard('companyIdDisplay')">
                                                <i class="bi bi-clipboard"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Temporary Password:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tempPasswordDisplay" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard('tempPasswordDisplay')">
                                                <i class="bi bi-clipboard"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle"></i>
                                    <strong>Important:</strong> Please save these credentials securely.
                                    You can change your password after logging in to your company dashboard.
                                </div>

                                <div class="alert alert-warning">
                                    <i class="bi bi-envelope"></i>
                                    These credentials have also been sent to your registered email address.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Completion -->
                    <div class="step-content d-none text-center" data-step-content="5">
                        <div class="mb-4">
                            <i class="bi bi-rocket text-primary" style="font-size: 4rem;"></i>
                            <h3 class="mt-3">You're All Set!</h3>
                            <p>Your company dashboard is ready to use.</p>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>What's Next?</h5>
                                <ul class="list-unstyled text-start">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Check your email for login instructions</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Log in to your company dashboard</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Change your temporary password</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Complete your company profile</li>
                                </ul>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary" id="goToDashboardBtn">
                            <i class="bi bi-box-arrow-in-right"></i> Go to Company Dashboard
                        </a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">Previous</button>
                <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelBtn">Cancel</button>
                <button type="button" class="btn btn-success d-none" id="submitBtn">Submit Registration</button>
                <button type="button" class="btn btn-primary d-none" id="finishBtn">Finish</button>
            </div>
        </div>
    </div>
</div>









    <!-- Bootstrap Bundle, jQuery, DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- Custom JS -->



</body>
</html>
