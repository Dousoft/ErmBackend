@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Payroll Management Content -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-money-bill-wave me-3" style="color: var(--primary-color);"></i>Payroll
                        Management
                    </h1>
                    <p class="text-muted mb-0 mt-2">Process salaries, manage deductions, and generate payslips</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(251, 46, 0, 0.1); color: var(--primary-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newPayrollModal">
                        <i class="fas fa-plus me-1"></i> New Payroll
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Stats Cards -->
    <div class="row payroll-stats">
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Employees</h6>
                            <h3 class="mb-0" id="totalEmployees">42</h3>
                            <span class="text-success small">+2 this month <i class="fas fa-arrow-up"></i></span>
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
                            <h6 class="text-muted mb-2">This Month Payroll</h6>
                            <h3 class="mb-0" id="monthPayroll">$85,420</h3>
                            <span class="text-success small">On track</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-money-bill-wave text-success"></i>
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
                            <h3 class="mb-0" id="pendingApprovals">5</h3>
                            <span class="text-warning small">2 overdue</span>
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
                            <h6 class="text-muted mb-2">Unpaid Salaries</h6>
                            <h3 class="mb-0" id="unpaidSalaries">3</h3>
                            <span class="text-danger small">$12,450 total</span>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-exclamation-triangle text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Processing Section -->
    <div class="row mt-4">
        <!-- Payroll List -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-calendar-alt me-2"></i>Current Payroll Cycle
                    </h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-calendar me-1"></i> May 2023
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-angle-right me-2"></i>April 2023</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-angle-right me-2"></i>March 2023</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-angle-right me-2"></i>February
                                    2023</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-hover mb-0">
                            <thead class="table-light" style="position: sticky; top: 0; z-index: 1;">
                                <tr>
                                    <th class="py-3 ps-4">Employee</th>
                                    <th class="py-3">Department</th>
                                    <th class="py-3">Basic Salary</th>
                                    <th class="py-3">Net Pay</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3 pe-4 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="payrollTableBody">
                                <!-- Sample Data -->
                                <tr class="align-middle">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle">JD</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">John Doe</h6>
                                                <small class="text-muted">EMP-001</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-code me-1"></i> Engineering
                                        </span>
                                    </td>
                                    <td>$6,500.00</td>
                                    <td class="fw-semibold">$6,120.00</td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success">Paid</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary rounded-start view-btn"
                                                data-id="1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-end edit-btn"
                                                data-id="1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <span class="avatar-title bg-info rounded-circle">JS</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Jane Smith</h6>
                                                <small class="text-muted">EMP-002</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-bullhorn me-1"></i> Marketing
                                        </span>
                                    </td>
                                    <td>$5,800.00</td>
                                    <td class="fw-semibold">$5,450.00</td>
                                    <td><span class="badge bg-warning bg-opacity-10 text-warning">Pending</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary rounded-start view-btn"
                                                data-id="2" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-end edit-btn"
                                                data-id="2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">2</span> of <span
                                class="fw-semibold">2</span> entries
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payroll Actions and Summary -->
        <div class="col-lg-4">
            <!-- Quick Actions Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary w-100 mb-3 d-flex align-items-center justify-content-center"
                        data-bs-toggle="modal" data-bs-target="#newPayrollModal">
                        <i class="fas fa-plus-circle me-2"></i> Run New Payroll
                    </button>
                    <div class="row g-2">
                        <div class="col-6">
                            <button
                                class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-file-export me-2"></i> Export
                            </button>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-envelope me-2"></i> Send
                            </button>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-file-pdf me-2"></i> Reports
                            </button>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-print me-2"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payroll Summary Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-chart-pie me-2"></i>Payroll Summary
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 text-muted">Total Gross Salary</h6>
                            <i class="fas fa-info-circle text-muted" data-bs-toggle="tooltip"
                                title="Sum of all basic salaries"></i>
                        </div>
                        <h4 class="text-primary" id="totalGrossSalary">$92,450.00</h4>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 text-muted">Total Deductions</h6>
                            <i class="fas fa-info-circle text-muted" data-bs-toggle="tooltip"
                                title="Taxes, insurance, etc."></i>
                        </div>
                        <h4 class="text-danger" id="totalDeductions">$7,030.00</h4>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 text-muted">Total Allowances</h6>
                            <i class="fas fa-info-circle text-muted" data-bs-toggle="tooltip"
                                title="Bonuses, overtime, etc."></i>
                        </div>
                        <h4 class="text-success" id="totalAllowances">$3,250.00</h4>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1 text-muted">Net Pay</h6>
                            <h3 class="text-dark mb-0" id="netPay">$88,670.00</h3>
                        </div>
                        <div class="avatar avatar-lg bg-primary bg-opacity-10 rounded-circle">
                            <i class="fas fa-dollar-sign text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Details Modal -->
    <div class="modal fade" id="payrollDetailsModal" tabindex="-1" aria-labelledby="payrollDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="payrollDetailsModalLabel">
                        <i class="fas fa-file-invoice-dollar me-2"></i>Payroll Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6 border-end">
                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar avatar-lg me-3">
                                    <span class="avatar-title bg-primary rounded-circle">JD</span>
                                </div>
                                <div>
                                    <h5 id="detail-name" class="mb-0">John Doe</h5>
                                    <span class="text-muted" id="detail-empid">EMP-001</span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-user-tie me-2"></i>Employee Information
                                </h6>
                                <div class="row g-2 mb-3">
                                    <div class="col-6">
                                        <p class="mb-1 text-muted small">Department</p>
                                        <p class="mb-0 fw-semibold" id="detail-dept">Engineering</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1 text-muted small">Position</p>
                                        <p class="mb-0 fw-semibold" id="detail-position">Senior Developer</p>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <p class="mb-1 text-muted small">Tax Code</p>
                                        <p class="mb-0 fw-semibold" id="detail-taxcode">1250L</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-1 text-muted small">Payment Method</p>
                                        <p class="mb-0 fw-semibold" id="detail-payment">Bank Transfer</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-university me-2"></i>Bank Details
                                </h6>
                                <p class="mb-1 text-muted small">Account Number</p>
                                <p class="mb-0 fw-semibold" id="detail-bank">*****6789</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-coins me-2"></i>Earnings
                                </h6>
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Basic Salary</td>
                                            <td class="text-end fw-semibold" id="earn-basic">$6,500.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Overtime</td>
                                            <td class="text-end fw-semibold" id="earn-overtime">$250.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Bonus</td>
                                            <td class="text-end fw-semibold" id="earn-bonus">$500.00</td>
                                        </tr>
                                        <tr class="border-top">
                                            <td class="text-muted"><strong>Total Earnings</strong></td>
                                            <td class="text-end fw-bold" id="earn-total">$7,250.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-file-invoice me-2"></i>Deductions
                                </h6>
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Income Tax</td>
                                            <td class="text-end fw-semibold text-danger" id="deduct-tax">$850.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">National Insurance</td>
                                            <td class="text-end fw-semibold text-danger" id="deduct-ni">$180.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Pension</td>
                                            <td class="text-end fw-semibold text-danger" id="deduct-pension">$100.00
                                            </td>
                                        </tr>
                                        <tr class="border-top">
                                            <td class="text-muted"><strong>Total Deductions</strong></td>
                                            <td class="text-end fw-bold text-danger" id="deduct-total">$1,130.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="alert alert-success bg-opacity-10 border-success">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="alert-heading mb-1">Net Pay</h5>
                                        <p class="mb-0 small text-muted">After all deductions</p>
                                    </div>
                                    <h3 class="text-success mb-0" id="detail-netpay">$6,120.00</h3>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-muted">Payment Status</span>
                                    <span id="detail-status" class="badge bg-success rounded-pill">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="printPayslip">
                        <i class="fas fa-print me-2"></i>Print Payslip
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Edit Modal -->
    <div class="modal fade" id="payrollEditModal" tabindex="-1" aria-labelledby="payrollEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="payrollEditModalLabel">
                        <i class="fas fa-edit me-2"></i>Edit Payroll
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="payrollEditForm">
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="avatar avatar-lg me-3">
                                        <span class="avatar-title bg-primary rounded-circle">JD</span>
                                    </div>
                                    <div>
                                        <h5 class="mb-0"><input type="text" class="form-control-plaintext fw-bold"
                                                id="edit-name" value="John Doe" readonly></h5>
                                        <span class="text-muted">EMP-001</span>
                                    </div>
                                </div>

                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-coins me-2"></i>Earnings
                                </h6>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">Basic Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-basic" value="6500">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">Overtime</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-overtime" value="250">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">Bonus</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-bonus" value="500">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-file-invoice me-2"></i>Deductions
                                </h6>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">Income Tax</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-tax" value="850">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">National Insurance</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-ni" value="180">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small text-muted">Pension</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="edit-pension" value="100">
                                    </div>
                                </div>

                                <div class="alert alert-info bg-opacity-10 mt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Calculated Net Pay</h6>
                                            <p class="small mb-0 text-muted">Earnings - Deductions</p>
                                        </div>
                                        <h5 class="text-info mb-0" id="edit-calculated-net">$6,120.00</h5>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label small text-muted">Payment Status</label>
                                    <select class="form-select" id="edit-status">
                                        <option value="paid">Paid</option>
                                        <option value="pending" selected>Pending</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePayrollChanges">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Payroll Modal -->
<div class="modal fade" id="newPayrollModal" tabindex="-1" aria-labelledby="newPayrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPayrollModalLabel">Create New Payroll</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="payrollForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="payrollPeriod" class="form-label">Payroll Period</label>
                            <select class="form-select" id="payrollPeriod" required>
                                <option value="">Select period</option>
                                <option value="monthly">Monthly</option>
                                <option value="biweekly">Bi-weekly</option>
                                <option value="weekly">Weekly</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="payrollDate" class="form-label">Payroll Date</label>
                            <input type="date" class="form-control" id="payrollDate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="payrollDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="payrollDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="includeInactive">
                        <label class="form-check-label" for="includeInactive">Include inactive employees</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="generatePayrollBtn">Generate Payroll</button>
            </div>
        </div>
    </div>
</div>

<!-- View Payslip Modal -->
<div class="modal fade" id="payslipModal" tabindex="-1" aria-labelledby="payslipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payslipModalLabel">Employee Payslip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="payslipContent">
                <!-- Payslip content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Print Payslip</button>
            </div>

        </div>
    </div>
</div>


@endsection
