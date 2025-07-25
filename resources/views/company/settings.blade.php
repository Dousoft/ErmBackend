@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')

<!-- Settings Content -->
<div class="container-fluid pt-3">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-cog me-3" style="color: var(--primary-color);"></i>Company Settings
                    </h1>
                    <p class="text-muted mb-0 mt-2">Configure your company's system settings and preferences</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(251, 46, 0, 0.1); color: var(--primary-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm btn-primary" id="saveSettingsBtn">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Tabs -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                        type="button" role="tab" aria-controls="general" aria-selected="true">
                        <i class="fas fa-building me-2"></i>General
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications"
                        type="button" role="tab" aria-controls="notifications" aria-selected="false">
                        <i class="fas fa-bell me-2"></i>Notifications
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security"
                        type="button" role="tab" aria-controls="security" aria-selected="false">
                        <i class="fas fa-shield-alt me-2"></i>Security
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="modules-tab" data-bs-toggle="tab" data-bs-target="#modules"
                        type="button" role="tab" aria-controls="modules" aria-selected="false">
                        <i class="fas fa-puzzle-piece me-2"></i>Modules
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                        type="button" role="tab" aria-controls="payment" aria-selected="false">
                        <i class="fas fa-credit-card me-2"></i>Payment
                    </button>
                </li>
            </ul>

            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="settingsTabsContent">
                <!-- General Settings Tab -->
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Company Information</h5>
                                </div>
                                <div class="card-body">
                                    <form id="companyInfoForm">
                                        <div class="mb-3">
                                            <label for="companyName" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyName"
                                                value="Tech Solutions Inc." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyEmail" class="form-label">Contact Email</label>
                                            <input type="email" class="form-control" id="companyEmail"
                                                value="contact@techsolutions.com" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyPhone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="companyPhone"
                                                value="+1 (555) 123-4567">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="companyAddress"
                                                rows="3">123 Business Ave, Suite 400, New York, NY 10001</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyWebsite" class="form-label">Website</label>
                                            <input type="url" class="form-control" id="companyWebsite"
                                                value="https://techsolutions.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="companyDescription"
                                                rows="3">Leading technology solutions provider specializing in SaaS applications.</textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Company Logo</h5>
                                </div>
                                <div class="card-body text-center">
                                    <div class="company-logo-container mb-3">
                                        <img src="https://via.placeholder.com/150" alt="Company Logo"
                                            id="companyLogoPreview" class="img-fluid rounded">
                                        <div class="logo-upload-overlay">
                                            <i class="fas fa-camera"></i>
                                            <span>Change Logo</span>
                                            <input type="file" id="companyLogoUpload" accept="image/*"
                                                style="display: none;">
                                        </div>
                                    </div>
                                    <p class="text-muted small">Recommended size: 300x300px (PNG or JPG)</p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Regional Settings</h5>
                                </div>
                                <div class="card-body">
                                    <form id="regionalSettingsForm">
                                        <div class="mb-3">
                                            <label for="timeZone" class="form-label">Time Zone</label>
                                            <select class="form-select" id="timeZone" required>
                                                <option value="America/New_York" selected>Eastern Time
                                                    (America/New_York)</option>
                                                <option value="America/Chicago">Central Time (America/Chicago)</option>
                                                <option value="America/Denver">Mountain Time (America/Denver)</option>
                                                <option value="America/Los_Angeles">Pacific Time (America/Los_Angeles)
                                                </option>
                                                <!-- More options would be added in a real application -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateFormat" class="form-label">Date Format</label>
                                            <select class="form-select" id="dateFormat" required>
                                                <option value="MM/DD/YYYY" selected>MM/DD/YYYY (12/31/2023)</option>
                                                <option value="DD/MM/YYYY">DD/MM/YYYY (31/12/2023)</option>
                                                <option value="YYYY-MM-DD">YYYY-MM-DD (2023-12-31)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="timeFormat" class="form-label">Time Format</label>
                                            <select class="form-select" id="timeFormat" required>
                                                <option value="12" selected>12-hour (2:30 PM)</option>
                                                <option value="24">24-hour (14:30)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="language" class="form-label">Language</label>
                                            <select class="form-select" id="language" required>
                                                <option value="en" selected>English</option>
                                                <option value="es">Spanish</option>
                                                <option value="fr">French</option>
                                                <option value="de">German</option>
                                                <!-- More options would be added in a real application -->
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Financial Settings</h5>
                                </div>
                                <div class="card-body">
                                    <form id="financialSettingsForm">
                                        <div class="mb-3">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select class="form-select" id="currency" required>
                                                <option value="USD" selected>US Dollar (USD)</option>
                                                <option value="EUR">Euro (EUR)</option>
                                                <option value="GBP">British Pound (GBP)</option>
                                                <option value="JPY">Japanese Yen (JPY)</option>
                                                <!-- More options would be added in a real application -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="taxPercentage" class="form-label">Tax Percentage</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="taxPercentage" value="7.5"
                                                    min="0" max="50" step="0.1">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fiscalYearStart" class="form-label">Fiscal Year Start</label>
                                            <select class="form-select" id="fiscalYearStart" required>
                                                <option value="1" selected>January</option>
                                                <option value="2">February</option>
                                                <!-- More months would be added -->
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications Settings Tab -->
                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Notification Preferences</h5>
                                </div>
                                <div class="card-body">
                                    <form id="notificationSettingsForm">
                                        <div class="mb-3">
                                            <label class="form-label">Notification Methods</label>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailNotifications"
                                                    checked>
                                                <label class="form-check-label" for="emailNotifications">Email
                                                    Notifications</label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsNotifications">
                                                <label class="form-check-label" for="smsNotifications">SMS
                                                    Notifications</label>
                                            </div>
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="pushNotifications"
                                                    checked>
                                                <label class="form-check-label" for="pushNotifications">Push
                                                    Notifications</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Notification Types</label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="projectUpdates"
                                                    checked>
                                                <label class="form-check-label" for="projectUpdates">Project
                                                    Updates</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="taskAssignments"
                                                    checked>
                                                <label class="form-check-label" for="taskAssignments">Task
                                                    Assignments</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="invoiceReminders"
                                                    checked>
                                                <label class="form-check-label" for="invoiceReminders">Invoice
                                                    Reminders</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="systemAlerts"
                                                    checked>
                                                <label class="form-check-label" for="systemAlerts">System Alerts</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="notificationFrequency" class="form-label">Notification
                                                Frequency</label>
                                            <select class="form-select" id="notificationFrequency">
                                                <option value="immediate" selected>Immediately</option>
                                                <option value="daily">Daily Digest</option>
                                                <option value="weekly">Weekly Digest</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Email Templates</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="invoiceEmailTemplate" class="form-label">Invoice Email
                                            Template</label>
                                        <textarea class="form-control" id="invoiceEmailTemplate" rows="5">Dear {client_name},

Your invoice #{invoice_number} for {invoice_amount} is due on {due_date}.

Please make the payment by the due date to avoid any late fees.

Thank you,
{company_name}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="projectUpdateTemplate" class="form-label">Project Update
                                            Template</label>
                                        <textarea class="form-control" id="projectUpdateTemplate" rows="5">Hello {employee_name},

This is an update regarding the {project_name} project.

Current Status: {project_status}
Next Milestone: {next_milestone}
Due Date: {due_date}

Please let us know if you have any questions.

Best regards,
{company_name}</textarea>
                                    </div>

                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-sync-alt me-1"></i> Restore Default Templates
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Settings Tab -->
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Authentication</h5>
                                </div>
                                <div class="card-body">
                                    <form id="securitySettingsForm">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enable2FA" checked>
                                                <label class="form-check-label" for="enable2FA">Enable Two-Factor
                                                    Authentication</label>
                                            </div>
                                            <small class="text-muted">Requires users to verify their identity using a
                                                second factor</small>
                                        </div>

                                        <div class="mb-3">
                                            <label for="passwordPolicy" class="form-label">Password Policy</label>
                                            <select class="form-select" id="passwordPolicy">
                                                <option value="basic">Basic (6 characters minimum)</option>
                                                <option value="medium" selected>Medium (8 characters, 1 number)</option>
                                                <option value="strong">Strong (10 characters, mixed case, special
                                                    characters)</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="passwordExpiry" class="form-label">Password Expiry</label>
                                            <select class="form-select" id="passwordExpiry">
                                                <option value="30">30 days</option>
                                                <option value="60">60 days</option>
                                                <option value="90" selected>90 days</option>
                                                <option value="180">180 days</option>
                                                <option value="0">Never</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sessionTimeout" class="form-label">Session Timeout</label>
                                            <select class="form-select" id="sessionTimeout">
                                                <option value="15">15 minutes</option>
                                                <option value="30" selected>30 minutes</option>
                                                <option value="60">1 hour</option>
                                                <option value="120">2 hours</option>
                                                <option value="0">Never</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="ipRestriction" class="form-label">IP Restrictions</label>
                                            <select class="form-select" id="ipRestriction">
                                                <option value="none" selected>No restrictions</option>
                                                <option value="specific">Allow specific IPs only</option>
                                            </select>
                                            <div id="ipListContainer" class="mt-2" style="display: none;">
                                                <textarea class="form-control" id="ipList" rows="3"
                                                    placeholder="Enter one IP address per line"></textarea>
                                                <small class="text-muted">Add IP addresses that are allowed to access
                                                    the system</small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Data Privacy</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="enableDataEncryption"
                                                checked>
                                            <label class="form-check-label" for="enableDataEncryption">Enable Data
                                                Encryption</label>
                                        </div>
                                        <small class="text-muted">Encrypt sensitive data at rest</small>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="enableAuditLogging"
                                                checked>
                                            <label class="form-check-label" for="enableAuditLogging">Enable Audit
                                                Logging</label>
                                        </div>
                                        <small class="text-muted">Log all sensitive operations for compliance</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dataRetention" class="form-label">Data Retention Policy</label>
                                        <select class="form-select" id="dataRetention">
                                            <option value="30">30 days</option>
                                            <option value="90">90 days</option>
                                            <option value="180" selected>180 days</option>
                                            <option value="365">1 year</option>
                                            <option value="730">2 years</option>
                                            <option value="0">Indefinitely</option>
                                        </select>
                                        <small class="text-muted">How long to keep historical data</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="backupFrequency" class="form-label">Backup Frequency</label>
                                        <select class="form-select" id="backupFrequency">
                                            <option value="daily" selected>Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-download me-1"></i> Download Data Backup
                                        </button>
                                        <small class="text-muted d-block mt-1">Last backup: 2023-07-20 02:00 AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modules Settings Tab -->
                <div class="tab-pane fade" id="modules" role="tabpanel" aria-labelledby="modules-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Active Modules</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="hrmModule" checked>
                                            <label class="form-check-label" for="hrmModule">HR Management Module</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="projectModule" checked>
                                            <label class="form-check-label" for="projectModule">Project Management
                                                Module</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="clientModule" checked>
                                            <label class="form-check-label" for="clientModule">Client Management
                                                Module</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="attendanceModule"
                                                checked>
                                            <label class="form-check-label" for="attendanceModule">Attendance
                                                Module</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="payrollModule" checked>
                                            <label class="form-check-label" for="payrollModule">Payroll Module</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="reportingModule"
                                                checked>
                                            <label class="form-check-label" for="reportingModule">Reporting
                                                Module</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Module Configuration</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="defaultDashboard" class="form-label">Default Dashboard</label>
                                        <select class="form-select" id="defaultDashboard">
                                            <option value="company" selected>Company Overview</option>
                                            <option value="projects">Projects Dashboard</option>
                                            <option value="hr">HR Dashboard</option>
                                            <option value="finance">Finance Dashboard</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Module Access Permissions</label>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="allowEmployeeHrAccess">
                                            <label class="form-check-label" for="allowEmployeeHrAccess">Allow employees
                                                to access basic HR information</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="allowClientProjectAccess" checked>
                                            <label class="form-check-label" for="allowClientProjectAccess">Allow clients
                                                to access project details</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="allowManagerPayrollAccess">
                                            <label class="form-check-label" for="allowManagerPayrollAccess">Allow
                                                managers to access payroll information</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="defaultEmployeeRole" class="form-label">Default Employee
                                            Role</label>
                                        <select class="form-select" id="defaultEmployeeRole">
                                            <option value="employee" selected>Employee</option>
                                            <option value="manager">Manager</option>
                                            <option value="hr">HR Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Settings Tab -->
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Subscription Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Current Plan</label>
                                        <div class="p-3 bg-light rounded">
                                            <h5 class="mb-1">Premium Plan</h5>
                                            <p class="mb-1">$99/month</p>
                                            <p class="mb-0 text-muted small">Billed annually, renews on August 15, 2023
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Plan Features</label>
                                        <ul class="list-group">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Maximum Users
                                                <span class="badge bg-primary rounded-pill">50</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Projects
                                                <span class="badge bg-primary rounded-pill">Unlimited</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Storage
                                                <span class="badge bg-primary rounded-pill">100GB</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Priority Support
                                                <span class="badge bg-primary rounded-pill">Yes</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-sync-alt me-1"></i> Change Plan
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-times-circle me-1"></i> Cancel Subscription
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Payment Methods</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Saved Payment Methods</label>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <i class="fab fa-cc-visa fa-2x text-primary me-2"></i>
                                                        <span>Visa ending in 4242</span>
                                                        <span class="badge bg-success ms-2">Default</span>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <i class="fab fa-cc-mastercard fa-2x text-primary me-2"></i>
                                                        <span>Mastercard ending in 5555</span>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addPaymentMethodModal">
                                        <i class="fas fa-plus me-1"></i> Add Payment Method
                                    </button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Billing History</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>2023-07-15</td>
                                                    <td>Premium Plan Subscription</td>
                                                    <td>$99.00</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-primary">Invoice</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2023-06-15</td>
                                                    <td>Premium Plan Subscription</td>
                                                    <td>$99.00</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-primary">Invoice</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2023-05-15</td>
                                                    <td>Premium Plan Subscription</td>
                                                    <td>$99.00</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td><a href="#" class="btn btn-sm btn-outline-primary">Invoice</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <nav aria-label="Billing history navigation">
                                        <ul class="pagination pagination-sm justify-content-center mt-3">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true">Previous</a>
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
            </div>
        </div>
    </div>
</div>

<!-- Add Payment Method Modal -->
<div class="modal fade" id="addPaymentMethodModal" tabindex="-1" aria-labelledby="addPaymentMethodModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentMethodModalLabel">Add Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentMethodForm">
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="123">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cardName" class="form-label">Name on Card</label>
                        <input type="text" class="form-control" id="cardName" placeholder="John Doe">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="setAsDefault">
                        <label class="form-check-label" for="setAsDefault">Set as default payment method</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Payment Method</button>
            </div>
        </div>
    </div>
</div>
@endsection
