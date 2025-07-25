$(document).ready(function () {
    // =============================================
    // SIDEBAR FUNCTIONALITY
    // =============================================
    function initializeSidebar() {
        $('#sidebarToggle').click(function () {
            $('#sidebar').toggleClass('collapsed');
            $('#main-content').toggleClass('expanded');
            localStorage.setItem('sidebarCollapsed', $('#sidebar').hasClass('collapsed'));
            
            // Update chart sizes after transition
            setTimeout(() => {
                if (typeof companyChart !== 'undefined') companyChart.resize();
                if (typeof hrChart !== 'undefined') hrChart.resize();
                if (typeof pmChart !== 'undefined') pmChart.resize();
                if (typeof financeChart !== 'undefined') financeChart.resize();
            }, 300);
        });

        // Check localStorage for saved sidebar state
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            $('#sidebar').addClass('collapsed');
            $('#main-content').addClass('expanded');
        }
    }

    // =============================================
    // CHART INITIALIZATION
    // =============================================
    function initializeCharts() {
        // Company Performance Chart
        initCompanyChart();
        
        // HR Attendance Chart
        initHRAttendanceChart();
        
        // PM Progress Chart
        initPMProgressChart();
        
        // Finance Chart
        initFinanceChart();
        
        // Dashboard Charts
        initDashboardCharts();
        
        // Additional Charts
        initAdditionalCharts();
    }

    function initCompanyChart() {
        const ctx = document.getElementById('companyChart').getContext('2d');
        if (window.companyChart) window.companyChart.destroy();
        
        window.companyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Employee Productivity',
                        data: [75, 82, 78, 85, 88, 90],
                        backgroundColor: 'rgba(251, 46, 0, 0.7)',
                        borderColor: 'rgba(251, 46, 0, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    },
                    {
                        label: 'Project Completion',
                        data: [40, 50, 60, 65, 75, 80],
                        backgroundColor: 'rgba(60, 113, 57, 0.7)',
                        borderColor: 'rgba(60, 113, 57, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }
                ]
            },
            options: getChartOptions('Company Performance Metrics')
        });
    }

    function initHRAttendanceChart() {
        const ctx = document.getElementById('hrAttendanceChart').getContext('2d');
        if (window.hrChart) window.hrChart.destroy();
        
        window.hrChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [
                    {
                        label: 'Present',
                        data: [38, 40, 39, 41, 40, 15],
                        backgroundColor: 'rgba(52, 152, 219, 0.1)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'On Leave',
                        data: [2, 1, 3, 1, 2, 0],
                        backgroundColor: 'rgba(243, 156, 18, 0.1)',
                        borderColor: 'rgba(243, 156, 18, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: getChartOptions('Weekly Attendance')
        });
    }

    function initPMProgressChart() {
        const ctx = document.getElementById('pmProgressChart').getContext('2d');
        if (window.pmChart) window.pmChart.destroy();
        
        window.pmChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Not Started', 'Blocked'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(155, 89, 182, 0.8)',
                        'rgba(231, 76, 60, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right' },
                    title: {
                        display: true,
                        text: 'Project Task Status',
                        font: { size: 16 }
                    }
                },
                cutout: '70%'
            }
        });
    }

    function initFinanceChart() {
        const ctx = document.getElementById('financeChart').getContext('2d');
        if (window.financeChart) window.financeChart.destroy();
        
        window.financeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Revenue', 'Expenses', 'Profit'],
                datasets: [{
                    label: 'This Month',
                    data: [24580, 9450, 15130],
                    backgroundColor: 'rgba(230, 126, 34, 0.7)',
                    borderColor: 'rgba(230, 126, 34, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }, {
                    label: 'Last Month',
                    data: [21800, 9000, 12800],
                    backgroundColor: 'rgba(231, 76, 60, 0.7)',
                    borderColor: 'rgba(231, 76, 60, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: getChartOptions('Financial Overview')
        });
    }

    function initDashboardCharts() {
        // Project Progress Chart
        const progressCtx = document.getElementById('projectProgressChart').getContext('2d');
        new Chart(progressCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'],
                datasets: [{
                    label: 'Project Completion',
                    data: [10, 20, 30, 45, 55, 65, 75],
                    borderColor: 'rgba(108, 92, 231, 1)',
                    backgroundColor: 'rgba(108, 92, 231, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Project Progress Over Time',
                        font: { size: 14 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            callback: function(value) { return value + '%'; }
                        }
                    }
                }
            }
        });
        
        // Task Distribution Chart
        const taskCtx = document.getElementById('taskDistributionChart').getContext('2d');
        new Chart(taskCtx, {
            type: 'doughnut',
            data: {
                labels: ['To Do', 'In Progress', 'Testing', 'Done'],
                datasets: [{
                    data: [8, 5, 3, 12],
                    backgroundColor: [
                        'rgba(108, 117, 125, 0.8)',
                        'rgba(13, 110, 253, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(25, 135, 84, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'right' },
                    title: {
                        display: true,
                        text: 'Task Status Distribution',
                        font: { size: 14 }
                    }
                },
                cutout: '70%'
            }
        });
        
        // Workload Chart
        const workloadCtx = document.getElementById('workloadChart').getContext('2d');
        new Chart(workloadCtx, {
            type: 'bar',
            data: {
                labels: ['John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Williams', 'David Brown'],
                datasets: [{
                    label: 'Tasks Assigned',
                    data: [8, 5, 7, 4, 3],
                    backgroundColor: 'rgba(108, 92, 231, 0.8)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Team Workload',
                        font: { size: 14 }
                    }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    function initAdditionalCharts() {
        // Financial Chart
        const financialCtx = document.getElementById('financialChart').getContext('2d');
        new Chart(financialCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 18000, 22000, 21000, 24580],
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Expenses',
                        data: [8000, 12000, 10000, 11000, 15000, 13000, 14500],
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } }
            }
        });

        // Income Sources Chart
        const incomeSourcesCtx = document.getElementById('incomeSourcesChart').getContext('2d');
        new Chart(incomeSourcesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Web Development', 'Mobile Apps', 'Consulting', 'Maintenance', 'Other'],
                datasets: [{
                    data: [45, 25, 15, 10, 5],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Weekly Hours Chart
        const weeklyHoursCtx = document.getElementById('weeklyHoursChart').getContext('2d');
        new Chart(weeklyHoursCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Hours Worked',
                    data: [8, 7.5, 8.25, 7, 8.5, 4, 0],
                    backgroundColor: 'rgba(251, 46, 0, 0.7)',
                    borderColor: 'rgba(251, 46, 0, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10,
                        ticks: { callback: function(value) { return value + 'h'; } }
                    }
                }
            }
        });
    }

    function getChartOptions(title) {
        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: title,
                    font: { size: 16 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: "rgba(0, 0, 0, 0.05)",
                    }
                },
                x: { grid: { display: false } }
            }
        };
    }

    // =============================================
    // KANBAN BOARD FUNCTIONALITY
    // =============================================
    function initKanbanBoard() {
        // Sample tasks data
        const tasks = {
            todo: [
                { id: 1, title: "Design Login Page", description: "Create wireframes and mockups", assignee: "John Doe", dueDate: "2025-07-25" },
                { id: 2, title: "API Documentation", description: "Document all endpoints", assignee: "Jane Smith", dueDate: "2025-07-28" }
            ],
            inprogress: [
                { id: 3, title: "User Profile Page", description: "Implement frontend components", assignee: "Mike Johnson", dueDate: "2025-07-22" }
            ],
            testing: [
                { id: 4, title: "Checkout Process", description: "Test payment integration", assignee: "Sarah Williams", dueDate: "2025-07-20" }
            ],
            done: [
                { id: 5, title: "Homepage Design", description: "Finalize homepage layout", assignee: "John Doe", dueDate: "2025-07-15" }
            ]
        };
        
        // Render tasks on the board
        renderKanbanTasks(tasks);
        
        // Make columns droppable
        $(".kanban-column-body").droppable({
            accept: ".kanban-card",
            drop: function(event, ui) {
                const card = ui.draggable;
                const newColumn = $(this);
                
                // Update task status based on column
                const taskId = card.data("task-id");
                const newStatus = newColumn.attr("id").replace("-column", "");
                
                // In a real app, you would update the task status in your database here
                console.log(`Task ${taskId} moved to ${newStatus}`);
                
                // Move the card to the new column
                card.detach().css({top: 0, left: 0}).appendTo(newColumn);
                
                // Update counters
                updateColumnCounters();
            }
        });
        
        // Make cards draggable
        $(".kanban-card").draggable({
            revert: "invalid",
            cursor: "move",
            zIndex: 1000,
            helper: "clone",
            start: function() { $(this).addClass("dragging"); },
            stop: function() { $(this).removeClass("dragging"); }
        });
        
        // Add new task button handler
        $(".kanban-column-footer button").click(function() {
            const column = $(this).closest(".kanban-column").find(".kanban-column-body");
            const columnId = column.attr("id");
            
            // Show add task modal
            $("#addTaskModal").modal("show");
            
            // In a real app, you would set the default status based on the column
        });
    }

    function renderKanbanTasks(tasks) {
        // Clear existing tasks
        $(".kanban-column-body").empty();
        
        // Render To Do tasks
        tasks.todo.forEach(task => {
            $("#todo-column").append(createKanbanCard(task));
        });
        
        // Render In Progress tasks
        tasks.inprogress.forEach(task => {
            $("#inprogress-column").append(createKanbanCard(task));
        });
        
        // Render Testing tasks
        tasks.testing.forEach(task => {
            $("#testing-column").append(createKanbanCard(task));
        });
        
        // Render Done tasks
        tasks.done.forEach(task => {
            $("#done-column").append(createKanbanCard(task));
        });
        
        // Make new cards draggable
        $(".kanban-card").draggable({
            revert: "invalid",
            cursor: "move",
            zIndex: 1000,
            helper: "clone",
            start: function() { $(this).addClass("dragging"); },
            stop: function() { $(this).removeClass("dragging"); }
        });
        
        // Update counters
        updateColumnCounters();
    }

    function createKanbanCard(task) {
        return `
            <div class="kanban-card" data-task-id="${task.id}">
                <h6>${task.title}</h6>
                <p>${task.description}</p>
                <div class="kanban-card-footer">
                    <span><i class="fas fa-user"></i> ${task.assignee}</span>
                    <span><i class="fas fa-calendar-alt"></i> ${task.dueDate}</span>
                </div>
            </div>
        `;
    }

    function updateColumnCounters() {
        $("#todo-column").closest(".kanban-column").find(".badge").text($("#todo-column .kanban-card").length);
        $("#inprogress-column").closest(".kanban-column").find(".badge").text($("#inprogress-column .kanban-card").length);
        $("#testing-column").closest(".kanban-column").find(".badge").text($("#testing-column .kanban-card").length);
        $("#done-column").closest(".kanban-column").find(".badge").text($("#done-column .kanban-card").length);
    }

    // =============================================
    // FORM HANDLING
    // =============================================
    function initializeFormHandlers() {
        // Client form handling
        $('#saveClientBtn').click(function() {
            if ($('#clientName').val() === '' || $('#contactPerson').val() === '' || $('#clientEmail').val() === '') {
                showToast('Please fill in all required fields', 'danger');
                return;
            }
            
            console.log('Client data to be saved:', {
                name: $('#clientName').val(),
                contact: $('#contactPerson').val(),
                email: $('#clientEmail').val(),
                phone: $('#clientPhone').val(),
                address: $('#clientAddress').val(),
                website: $('#clientWebsite').val(),
                industry: $('#clientIndustry').val(),
                notes: $('#clientNotes').val()
            });
            
            showToast('Client added successfully!', 'success');
            $('#addClientModal').modal('hide');
            $('#clientForm')[0].reset();
        });

        // Employee form handling
        $('#saveEmployeeBtn').click(function() {
            if ($('#firstName').val() === '' || $('#lastName').val() === '' || $('#email').val() === '') {
                showToast('Please fill in all required fields', 'danger');
                return;
            }
            
            console.log('Employee data to be saved:', {
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                department: $('#department').val(),
                position: $('#position').val()
            });
            
            showToast('Employee added successfully!', 'success');
            $('#addEmployeeModal').modal('hide');
            $('#employeeForm')[0].reset();
        });

        // Company details form
        $('#saveCompanyDetails').click(function() {
            $('#companyName').text($('#editCompanyName').val());
            $('#companyNameDisplay').text($('#editCompanyName').val());
            $('#industryType').text($('#editIndustryType').val());
            $('#contactEmail').text($('#editContactEmail').val());
            $('#contactPhone').text($('#editContactPhone').val());
            $('#companyAddress').text($('#editCompanyAddress').val());
            $('#companyWebsite').text($('#editCompanyWebsite').val());
            $('#taxId').text($('#editTaxId').val());
            $('#companyDescription').text($('#editCompanyDescription').val());
            
            showToast('Company details updated successfully!', 'success');
            $('#editCompanyModal').modal('hide');
        });

        // Settings form handling
        $('#saveSettingsBtn').click(function() {
            // Here you would typically send the form data to the server
            showToast('Settings saved successfully!', 'success');
        });

        // Logo upload functionality
        $('#logoUploadOverlay').click(function() {
            $('#logoUpload').click();
        });

        $('#logoUpload').change(function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#companyLogo').attr('src', event.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Company logo upload preview
        $('#companyLogoUpload').change(function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#companyLogoPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // =============================================
    // UI COMPONENTS INITIALIZATION
    // =============================================
    function initializeUIComponents() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Initialize tabs
        const tabPanes = document.querySelectorAll('.tab-pane');
        const tabLinks = document.querySelectorAll('.nav-link');
        
        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs and panes
                tabLinks.forEach(l => l.classList.remove('active'));
                tabPanes.forEach(p => p.classList.remove('show', 'active'));
                
                // Add active class to clicked tab and corresponding pane
                this.classList.add('active');
                const paneId = this.getAttribute('data-bs-target');
                document.querySelector(paneId).classList.add('show', 'active');
                
                // Store last active tab for settings
                if (this.id) {
                    localStorage.setItem('lastSettingsTab', this.id);
                }
            });
        });

        // Restore last active tab if available
        const lastTab = localStorage.getItem('lastSettingsTab');
        if (lastTab) {
            $(`#${lastTab}`).tab('show');
        }

        // Date pickers
        const datePickers = document.querySelectorAll('input[type="date"]');
        datePickers.forEach(picker => {
            picker.valueAsDate = new Date();
        });

        // Custom date range toggle
        const dateRangeSelect = document.getElementById('dateRange');
        const customDateRange = document.getElementById('customDateRange');
        const customDateRangeEnd = document.getElementById('customDateRangeEnd');

        dateRangeSelect.addEventListener('change', function () {
            if (this.value === 'custom') {
                customDateRange.classList.remove('d-none');
                customDateRangeEnd.classList.remove('d-none');
            } else {
                customDateRange.classList.add('d-none');
                customDateRangeEnd.classList.add('d-none');
            }
        });

        // IP restriction toggle
        $('#ipRestriction').change(function() {
            if ($(this).val() === 'specific') {
                $('#ipListContainer').show();
            } else {
                $('#ipListContainer').hide();
            }
        });

        // Payroll calculation
        const editInputs = document.querySelectorAll('#payrollEditForm input[type="number"]');
        editInputs.forEach(input => {
            input.addEventListener('change', calculateNetPay);
            input.addEventListener('keyup', calculateNetPay);
        });

        function calculateNetPay() {
            const basic = parseFloat(document.getElementById('edit-basic').value) || 0;
            const overtime = parseFloat(document.getElementById('edit-overtime').value) || 0;
            const bonus = parseFloat(document.getElementById('edit-bonus').value) || 0;
            const tax = parseFloat(document.getElementById('edit-tax').value) || 0;
            const ni = parseFloat(document.getElementById('edit-ni').value) || 0;
            const pension = parseFloat(document.getElementById('edit-pension').value) || 0;
            
            const totalEarnings = basic + overtime + bonus;
            const totalDeductions = tax + ni + pension;
            const netPay = totalEarnings - totalDeductions;
            
            document.getElementById('edit-calculated-net').textContent = '$' + netPay.toFixed(2);
        }

        // Payroll modal handlers
        document.querySelectorAll('.view-btn').forEach(button => {
            button.addEventListener('click', function() {
                const payrollId = this.getAttribute('data-id');
                const payrollDetailsModal = new bootstrap.Modal(document.getElementById('payrollDetailsModal'));
                payrollDetailsModal.show();
            });
        });
        
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const payrollId = this.getAttribute('data-id');
                const payrollEditModal = new bootstrap.Modal(document.getElementById('payrollEditModal'));
                payrollEditModal.show();
            });
        });
        
        document.getElementById('savePayrollChanges').addEventListener('click', function() {
            showToast('Payroll changes saved successfully!', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('payrollEditModal'));
            modal.hide();
        });

        // Clock in/out button
        let clockedIn = false;
        $('#clockInOutBtn').click(function() {
            const btn = $(this);
            
            if (clockedIn) {
                // Clock out action
                btn.html('<i class="fas fa-clock"></i> Clock In');
                btn.removeClass('btn-danger').addClass('btn-success');
                showToast('Clocked out successfully', 'success');
            } else {
                // Clock in action
                btn.html('<i class="fas fa-clock"></i> Clock Out');
                btn.removeClass('btn-success').addClass('btn-danger');
                showToast('Clocked in successfully', 'success');
            }
            
            clockedIn = !clockedIn;
        });

        // Employee row click handler
        $('.employee-row').click(function() {
            $('.employee-row').removeClass('table-primary');
            $(this).addClass('table-primary');
            const employeeId = $(this).data('employee-id');
            console.log('Loading employee data for ID:', employeeId);
        });

        // Client row click handler
        $('.client-row').click(function() {
            $('.client-row').removeClass('table-primary');
            $(this).addClass('table-primary');
        });

        // Edit employee button handler
        $('#editEmployeeBtn').click(function() {
            alert('Edit functionality would be implemented here');
        });

        // Delete employee button handler
        $('#deleteEmployeeBtn').click(function() {
            if (confirm('Are you sure you want to delete this employee?')) {
                showToast('Employee deleted successfully', 'success');
            }
        });

        // Select first employee and client by default
        $('.employee-row:first').click();
        $('.client-row:first').click();
    }

    // =============================================
    // UTILITY FUNCTIONS
    // =============================================
    function showToast(message, type) {
        const toast = $(`
            <div class="toast align-items-center text-white bg-${type} border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `);
        
        $('body').append(toast);
        const toastInstance = new bootstrap.Toast(toast[0]);
        toastInstance.show();
        
        // Remove toast after it hides
        toast[0].addEventListener('hidden.bs.toast', function() {
            toast.remove();
        });
    }

    // =============================================
    // INITIALIZATION
    // =============================================
    initializeSidebar();
    initializeCharts();
    initializeFormHandlers();
    initializeUIComponents();
    initKanbanBoard();
});