@extends('layouts.company.app')

@section('title', 'Dousoft | Companies Management')

@section('content')
<!-- Project Management Dashboard Header -->
<div class="container-fluid pt-3">
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header glass-banner p-4 rounded-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold text-dark mb-0">
                        <i class="fas fa-project-diagram me-3" style="color: var(--project-color);"></i>Project
                        Management
                    </h1>
                    <p class="text-muted mb-0 mt-2">Manage projects, tasks, milestones, and team
                        collaboration</p>
                </div>
                <div>
                    <button class="btn btn-sm me-2"
                        style="background: rgba(108, 92, 231, 0.1); color: var(--project-color);">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-sm project-action-btn" data-bs-toggle="modal"
                        data-bs-target="#addProjectModal">
                        <i class="fas fa-plus me-1"></i> New Project
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Stats Cards -->
    <div class="row">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Projects</h6>
                            <h3 class="mb-0">15</h3>
                            <span class="text-success small">+3 this month <i class="fas fa-arrow-up"></i></span>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-project-diagram" style="color: var(--project-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Active Projects</h6>
                            <h3 class="mb-0">8</h3>
                            <span class="text-info small">53.3% of total</span>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-tasks" style="color: var(--project-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Overdue Tasks</h6>
                            <h3 class="mb-0">12</h3>
                            <span class="text-danger small">Needs attention</span>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-exclamation-triangle" style="color: var(--project-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card project-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Avg. Completion</h6>
                            <h3 class="mb-0">78%</h3>
                            <span class="text-success small">+5% from last month</span>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-chart-line" style="color: var(--project-color);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Tabs Navigation -->
    <!-- Replace the existing tab navigation with this: -->
    <ul class="nav nav-tabs project-tab mb-4" id="projectTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview"
                type="button" role="tab">
                <i class="fas fa-home me-2"></i>Overview
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="board-tab" data-bs-toggle="tab" data-bs-target="#board" type="button"
                role="tab">
                <i class="fas fa-columns me-2"></i>Board
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button"
                role="tab">
                <i class="fas fa-chart-line me-2"></i>Dashboard
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button"
                role="tab">
                <i class="fas fa-comments me-2"></i>Messages
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks" type="button"
                role="tab">
                <i class="fas fa-tasks me-2"></i>Tasks
            </button>
        </li>
    </ul>

    <!-- Project Tab Content -->
    <!-- Replace the existing tab navigation with this: -->
    <div class="tab-content" id="projectTabContent">
        <!-- Overview Tab -->
        <div class="tab-pane fade show active" id="overview" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Project Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="project-summary-item">
                                        <h6>Project Description</h6>
                                        <p>This project aims to redesign the company website with modern
                                            UI/UX principles and improved performance.</p>
                                    </div>
                                    <div class="project-summary-item mt-4">
                                        <h6>Project Roles</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Project Owner:</strong> Pradeep Bisht</li>
                                            <li><strong>Team Members:</strong> 8</li>
                                            <li><strong>Stakeholders:</strong> 3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="project-summary-item">
                                        <h6>Status</h6>
                                        <div class="project-status-badge on-track">
                                            <i class="fas fa-check-circle me-2"></i>On Track
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%">
                                            </div>
                                        </div>
                                        <small>65% complete</small>
                                    </div>
                                    <div class="project-summary-item mt-4">
                                        <h6>Timeline</h6>
                                        <div class="timeline-info">
                                            <div class="timeline-item">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>Start Date: Jun 1, 2025</span>
                                            </div>
                                            <div class="timeline-item">
                                                <i class="fas fa-flag-checkered"></i>
                                                <span>End Date: Aug 15, 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card project-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-feed">
                                <div class="activity-item">
                                    <div class="activity-avatar">
                                        <img src="employee1.jpg" alt="User" class="rounded-circle">
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-message">
                                            <strong>John Doe</strong> completed task "Design Homepage
                                            Layout"
                                        </div>
                                        <div class="activity-time">
                                            2 hours ago
                                        </div>
                                    </div>
                                </div>
                                <!-- More activity items -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-primary w-100 mb-3">
                                <i class="fas fa-plus me-2"></i>New Task
                            </button>
                            <button class="btn btn-outline-secondary w-100 mb-3">
                                <i class="fas fa-share-alt me-2"></i>Share Project
                            </button>
                            <button class="btn btn-outline-success w-100 mb-3">
                                <i class="fas fa-file-export me-2"></i>Export Report
                            </button>
                            <button class="btn btn-outline-info w-100">
                                <i class="fas fa-cog me-2"></i>Project Settings
                            </button>
                        </div>
                    </div>

                    <div class="card project-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Team Members</h5>
                        </div>
                        <div class="card-body">
                            <div class="team-member">
                                <img src="employee1.jpg" alt="User" class="rounded-circle">
                                <div class="member-info">
                                    <h6>John Doe</h6>
                                    <small>UI/UX Designer</small>
                                </div>
                            </div>
                            <!-- More team members -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Board Tab (Kanban) -->
        <div class="tab-pane fade" id="board" role="tabpanel">
            <div class="kanban-board">
                <div class="kanban-column">
                    <div class="kanban-column-header">
                        <h5>To Do</h5>
                        <span class="badge bg-secondary">5</span>
                    </div>
                    <div class="kanban-column-body" id="todo-column">
                        <!-- Tasks will be added here via JavaScript -->
                    </div>
                    <div class="kanban-column-footer">
                        <button class="btn btn-sm btn-link"><i class="fas fa-plus"></i> Add Task</button>
                    </div>
                </div>

                <div class="kanban-column">
                    <div class="kanban-column-header">
                        <h5>In Progress</h5>
                        <span class="badge bg-primary">3</span>
                    </div>
                    <div class="kanban-column-body" id="inprogress-column">
                        <!-- Tasks will be added here via JavaScript -->
                    </div>
                    <div class="kanban-column-footer">
                        <button class="btn btn-sm btn-link"><i class="fas fa-plus"></i> Add Task</button>
                    </div>
                </div>

                <div class="kanban-column">
                    <div class="kanban-column-header">
                        <h5>Testing</h5>
                        <span class="badge bg-warning">2</span>
                    </div>
                    <div class="kanban-column-body" id="testing-column">
                        <!-- Tasks will be added here via JavaScript -->
                    </div>
                    <div class="kanban-column-footer">
                        <button class="btn btn-sm btn-link"><i class="fas fa-plus"></i> Add Task</button>
                    </div>
                </div>

                <div class="kanban-column">
                    <div class="kanban-column-header">
                        <h5>Done</h5>
                        <span class="badge bg-success">7</span>
                    </div>
                    <div class="kanban-column-body" id="done-column">
                        <!-- Tasks will be added here via JavaScript -->
                    </div>
                    <div class="kanban-column-footer">
                        <button class="btn btn-sm btn-link"><i class="fas fa-plus"></i> Add Task</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Tab -->
        <div class="tab-pane fade" id="dashboard" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Project Progress</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="projectProgressChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Task Distribution</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="taskDistributionChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Workload Overview</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="workloadChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Tab -->
        <div class="tab-pane fade" id="messages" role="tabpanel">
            <div class="row">
                <div class="col-md-4">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Conversations</h5>
                        </div>
                        <div class="card-body message-list">
                            <div class="message-preview active">
                                <div class="message-sender">
                                    <img src="employee1.jpg" alt="User" class="rounded-circle">
                                    <h6>John Doe</h6>
                                </div>
                                <div class="message-excerpt">
                                    <p>About the homepage design...</p>
                                </div>
                                <div class="message-time">
                                    <small>2 hours ago</small>
                                </div>
                            </div>
                            <!-- More message previews -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card project-card">
                        <div class="card-header">
                            <div class="message-header">
                                <img src="employee1.jpg" alt="User" class="rounded-circle">
                                <div class="message-header-info">
                                    <h5>John Doe</h5>
                                    <small>UI/UX Designer</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body message-thread">
                            <div class="message received">
                                <div class="message-content">
                                    <p>Hi team, I've completed the homepage design. Please review when you
                                        get a chance.</p>
                                </div>
                                <div class="message-time">
                                    <small>2 hours ago</small>
                                </div>
                            </div>

                            <div class="message sent">
                                <div class="message-content">
                                    <p>Thanks John! I'll take a look this afternoon.</p>
                                </div>
                                <div class="message-time">
                                    <small>1 hour ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer message-composer">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type your message...">
                                <button class="btn project-action-btn" type="button">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing Tasks Tab (keep your current implementation) -->
        <div class="tab-pane fade" id="tasks" role="tabpanel">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card project-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Task Filters</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Project</label>
                                <select class="form-select">
                                    <option>All Projects</option>
                                    <option>Website Redesign</option>
                                    <option>Mobile App Development</option>
                                    <option>Marketing Campaign</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option>All Statuses</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Overdue</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Priority</label>
                                <select class="form-select">
                                    <option>All Priorities</option>
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Assigned To</label>
                                <select class="form-select">
                                    <option>All Team Members</option>
                                    <option>John Doe</option>
                                    <option>Jane Smith</option>
                                    <option>Mike Johnson</option>
                                </select>
                            </div>
                            <button class="btn project-action-btn w-100">
                                <i class="fas fa-filter me-2"></i>Apply Filters
                            </button>
                        </div>
                    </div>

                    <div class="card project-card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Task Statistics</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Total Tasks</span>
                                <span class="badge bg-primary">87</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Completed</span>
                                <span class="badge bg-success">42</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>In Progress</span>
                                <span class="badge bg-info">28</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Overdue</span>
                                <span class="badge bg-danger">12</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Unassigned</span>
                                <span class="badge bg-warning">5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card project-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Task List</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                                <button class="btn btn-sm project-action-btn" data-bs-toggle="modal"
                                    data-bs-target="#addTaskModal">
                                    <i class="fas fa-plus me-1"></i>Add Task
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Project</th>
                                        <th>Assigned To</th>
                                        <th>Due Date</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Design Homepage Layout</h6>
                                                    <small class="text-muted">TASK-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Website Redesign</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="employee1.jpg" class="rounded-circle me-2" width="30"
                                                    height="30">
                                                <span>John Doe</span>
                                            </div>
                                        </td>
                                        <td>Jun 20, 2025</td>
                                        <td><span class="task-priority-high"><i
                                                    class="fas fa-arrow-up me-1"></i>High</span></td>
                                        <td><span class="badge bg-info">In Progress</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- More task rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Project Name</label>
                                <input type="text" class="form-control" placeholder="Enter project name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Client</label>
                                <select class="form-select">
                                    <option>Select Client</option>
                                    <option>Acme Corp</option>
                                    <option>XYZ Solutions</option>
                                    <option>ABC Enterprises</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Manager</label>
                            <select class="form-select">
                                <option>Select Project Manager</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter project description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Budget</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Enter project budget">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Team Members</label>
                            <select class="form-select" multiple>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                                <option>Sarah Williams</option>
                                <option>David Brown</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn project-action-btn">Create Project</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Task Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Task Name</label>
                            <input type="text" class="form-control" placeholder="Enter task name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select class="form-select">
                                <option>Select Project</option>
                                <option>Website Redesign</option>
                                <option>Mobile App Development</option>
                                <option>Marketing Campaign</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assigned To</label>
                            <select class="form-select">
                                <option>Select Team Member</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Due Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select class="form-select">
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter task description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn project-action-btn">Create Task</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Milestone Modal -->
    <div class="modal fade" id="addMilestoneModal" tabindex="-1" aria-labelledby="addMilestoneModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMilestoneModalLabel">Add New Milestone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Milestone Name</label>
                            <input type="text" class="form-control" placeholder="Enter milestone name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select class="form-select">
                                <option>Select Project</option>
                                <option>Website Redesign</option>
                                <option>Mobile App Development</option>
                                <option>Marketing Campaign</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3"
                                placeholder="Enter milestone description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn project-action-btn">Create Milestone</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
