document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    // initFormWizard();
    initDataTables();
    initCharts();
    setupSidebar();
    setupSearch();
    setupResizeHandler();
    setupModals();
    setupSelect2();
    setupRolePermissions();

    // Form Wizard for Company Registration
    // function initFormWizard() {
    //     const form = document.getElementById('addCompanyForm');
    //     if (!form) return;

    //     const stepContents = document.querySelectorAll('[data-step-content]');
    //     const steps = document.querySelectorAll('.step');
    //     const prevBtn = document.getElementById('prevBtn');
    //     const nextBtn = document.getElementById('nextBtn');
    //     const submitBtn = document.getElementById('submitBtn');
    //     const finishBtn = document.getElementById('finishBtn');
    //     const cancelBtn = document.getElementById('cancelBtn');
    //     let currentStep = 1;

    //     // Initialize form
    //     updateStepVisibility();

    //     // Next button click handler
    //     nextBtn.addEventListener('click', function() {
    //         if (validateStep(currentStep)) {
    //             if (currentStep === 3) {
    //                 // On review step, simulate submission
    //                 submitRegistration();
    //             } else {
    //                 currentStep++;
    //                 updateStepVisibility();

    //                 if (currentStep === 3) {
    //                     populateReviewContent();
    //                 }
    //             }
    //         }
    //     });

    //     // Previous button click handler
    //     prevBtn.addEventListener('click', function() {
    //         currentStep--;
    //         updateStepVisibility();
    //     });

    //     // Submit button handler
    //     submitBtn.addEventListener('click', function() {
    //         submitRegistration();
    //     });

    //     // Finish button handler
    //     finishBtn.addEventListener('click', function() {
    //         // Close modal and reset form
    //         bootstrap.Modal.getInstance(document.getElementById('addCompanyModal')).hide();
    //         form.reset();
    //         currentStep = 1;
    //         updateStepVisibility();
    //     });

    //     // Cancel button resets the form
    //     cancelBtn.addEventListener('click', function() {
    //         form.reset();
    //         currentStep = 1;
    //         updateStepVisibility();
    //     });

    //     // Go to dashboard button
    //     document.getElementById('goToDashboardBtn')?.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         alert('In a real application, this would redirect to the company dashboard login page.');
    //         bootstrap.Modal.getInstance(document.getElementById('addCompanyModal')).hide();
    //     });

    //     function submitRegistration() {
    //         // Show loading state
    //         nextBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
    //         nextBtn.disabled = true;

    //         // Simulate API call
    //         setTimeout(() => {
    //             currentStep++;
    //             updateStepVisibility();
    //             generateCredentials();
    //             nextBtn.innerHTML = 'Next';
    //             nextBtn.disabled = false;
    //         }, 2000);
    //     }

    //     function generateCredentials() {
    //         // Generate company ID
    //         const prefix = 'COM';
    //         const year = new Date().getFullYear();
    //         const randomNum = Math.floor(100000 + Math.random() * 900000);
    //         const companyId = `${prefix}-${year}-${randomNum}`;

    //         // Generate temporary password
    //         const tempPassword = generateTempPassword();

    //         // Display credentials
    //         document.getElementById('companyIdDisplay').value = companyId;
    //         document.getElementById('tempPasswordDisplay').value = tempPassword;
    //     }

    //     function generateTempPassword() {
    //         const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789!@#$%';
    //         let password = '';
    //         for (let i = 0; i < 10; i++) {
    //             password += chars.charAt(Math.floor(Math.random() * chars.length));
    //         }
    //         return password;
    //     }

    //     function copyToClipboard(elementId) {
    //         const copyText = document.getElementById(elementId);
    //         copyText.select();
    //         copyText.setSelectionRange(0, 99999);
    //         document.execCommand('copy');

    //         // Show tooltip or temporary message
    //         const originalText = event.target.innerHTML;
    //         event.target.innerHTML = '<i class="bi bi-check"></i> Copied!';
    //         setTimeout(() => {
    //             event.target.innerHTML = originalText;
    //         }, 2000);
    //     }

    //     // function validateStep(step) {
    //     //     let isValid = true;
    //     //     const currentStepContent = document.querySelector(`[data-step-content="${step}"]`);

    //     //     // Check all required fields in current step
    //     //     const requiredFields = currentStepContent.querySelectorAll('[required]');
    //     //     requiredFields.forEach(field => {
    //     //         if (!field.value.trim()) {
    //     //             field.classList.add('is-invalid');
    //     //             isValid = false;
    //     //         } else {
    //     //             field.classList.remove('is-invalid');
    //     //         }
    //     //     });

    //     //     // Special validation for email format
    //     //     if (step === 1) {
    //     //         const emailField = currentStepContent.querySelector('[type="email"]');
    //     //         if (emailField && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
    //     //             emailField.classList.add('is-invalid');
    //     //             isValid = false;
    //     //         }
    //     //     }

    //     //     // Validate terms checkbox on review step
    //     //     if (step === 3) {
    //     //         const termsCheck = document.getElementById('termsCheck');
    //     //         if (!termsCheck.checked) {
    //     //             termsCheck.classList.add('is-invalid');
    //     //             isValid = false;
    //     //         } else {
    //     //             termsCheck.classList.remove('is-invalid');
    //     //         }
    //     //     }

    //     //     if (!isValid) {
    //     //         alert('Please fill all required fields correctly before proceeding.');
    //     //     }

    //     //     return isValid;
    //     // }

    //     // function updateStepVisibility() {
    //     //     // Hide all step contents
    //     //     stepContents.forEach(content => {
    //     //         content.classList.add('d-none');
    //     //     });

    //     //     // Show current step content
    //     //     document.querySelector(`[data-step-content="${currentStep}"]`).classList.remove('d-none');

    //     //     // Update step indicators
    //     //     steps.forEach((step, index) => {
    //     //         if (index + 1 < currentStep) {
    //     //             step.classList.add('completed');
    //     //             step.classList.remove('active');
    //     //         } else if (index + 1 === currentStep) {
    //     //             step.classList.add('active');
    //     //             step.classList.remove('completed');
    //     //         } else {
    //     //             step.classList.remove('active', 'completed');
    //     //         }
    //     //     });

    //     //     // Update button visibility
    //     //     prevBtn.style.display = currentStep > 1 ? 'block' : 'none';

    //     //     if (currentStep < 4) { // Show Next button for steps 1-3
    //     //         nextBtn.style.display = 'block';
    //     //         submitBtn.style.display = 'none';
    //     //         finishBtn.style.display = 'none';
    //     //     } else if (currentStep === 4) { // Show Finish button for credentials step
    //     //         nextBtn.style.display = 'none';
    //     //         submitBtn.style.display = 'none';
    //     //         finishBtn.style.display = 'block';
    //     //     } else { // Show Finish button for completion step
    //     //         nextBtn.style.display = 'none';
    //     //         submitBtn.style.display = 'none';
    //     //         finishBtn.style.display = 'block';
    //     //     }
    //     // }

    //     // function populateReviewContent() {
    //     //     const formData = new FormData(form);
    //     //     let reviewHTML = '';

    //     //     // Basic info
    //     //     reviewHTML += `
    //     //         <h6>Company Details</h6>
    //     //         <p><strong>Name:</strong> ${formData.get('company_name')}</p>
    //     //         <p><strong>Email:</strong> ${formData.get('contact_email')}</p>
    //     //         <p><strong>Phone:</strong> ${formData.get('phone')}</p>
    //     //         <p><strong>Package:</strong> ${formData.get('package')}</p>
    //     //         <p><strong>Address:</strong> ${formData.get('address')}</p>
    //     //         <p><strong>Website:</strong> ${formData.get('website') || 'N/A'}</p>

    //     //         <h6 class="mt-4">Documents Uploaded</h6>
    //     //         <p>All required documents have been uploaded for verification.</p>
    //     //     `;

    //     //     document.getElementById('reviewContent').innerHTML = reviewHTML;
    //     // }
    // }

    // Initialize DataTables
    function initDataTables() {
        if ($('#usersTable').length && !$.fn.DataTable.isDataTable('#usersTable')) {
            $('#usersTable').DataTable({
                responsive: true,
                order: [[0, 'asc']],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users...",
                }
            });
        }

        if ($('#packagesTable').length && !$.fn.DataTable.isDataTable('#packagesTable')) {
            $('#packagesTable').DataTable();
        }

        if ($('#companiesTable').length && !$.fn.DataTable.isDataTable('#companiesTable')) {
            $('#companiesTable').DataTable();
        }
    }

    // Function: bind custom search inputs
    function setupSearch() {
        if ($('#searchPackage').length && $.fn.DataTable.isDataTable('#packagesTable')) {
            $('#searchPackage').on('keyup', function () {
                $('#packagesTable').DataTable().search(this.value).draw();
            });
        }

        if ($('#searchCompany').length && $.fn.DataTable.isDataTable('#companiesTable')) {
            $('#searchCompany').on('keyup', function () {
                $('#companiesTable').DataTable().search(this.value).draw();
            });
        }
    }

    // Execute both when DOM is fully loaded
    document.addEventListener("DOMContentLoaded", function () {
        initDataTables();
        setupSearch();
    });


    // Initialize Charts
    function initCharts() {
        // Platform Usage Chart
        const platformCtx = document.getElementById('platformUsageChart')?.getContext('2d');
        if (platformCtx) {
            window.platformUsageChart = new Chart(platformCtx, {
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
                        legend: { position: 'top' },
                        tooltip: { mode: 'index', intersect: false }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Main Chart
        const mainCtx = document.getElementById('mainChart')?.getContext('2d');
        if (mainCtx) {
            window.mainChart = new Chart(mainCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: 'Companies',
                            data: [12, 15, 18, 14, 17, 20, 24],
                            backgroundColor: 'rgba(52, 152, 219, 0.1)',
                            borderColor: 'rgba(52, 152, 219, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Employees',
                            data: [80, 90, 110, 95, 120, 140, 156],
                            backgroundColor: 'rgba(46, 204, 113, 0.1)',
                            borderColor: 'rgba(46, 204, 113, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Projects',
                            data: [15, 20, 25, 30, 35, 38, 42],
                            backgroundColor: 'rgba(243, 156, 18, 0.1)',
                            borderColor: 'rgba(243, 156, 18, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: { mode: 'index', intersect: false }
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
                }
            });
        }
    }

    // Sidebar Toggle Functionality
    function setupSidebar() {
        const $sidebar = $('#sidebar');
        const $mainContent = $('#main-content');

        // Check localStorage for saved sidebar state
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            $sidebar.addClass('collapsed');
            $mainContent.addClass('expanded');
        }

        // Toggle Sidebar between collapsed and expanded states
        $('#sidebarToggle').click(function() {
            $sidebar.toggleClass('collapsed');
            $mainContent.toggleClass('expanded');

            // Store state in localStorage
            localStorage.setItem('sidebarCollapsed', $sidebar.hasClass('collapsed'));

            // Update all charts after transition
            setTimeout(() => {
                if (window.mainChart) window.mainChart.resize();
                if (window.platformUsageChart) window.platformUsageChart.resize();
            }, 300);
        });
    }

    // Window Resize Handler
    function setupResizeHandler() {
        $(window).resize(function() {
            if (window.mainChart) window.mainChart.resize();
            if (window.platformUsageChart) window.platformUsageChart.resize();
        });
    }

    // Modal Setup
    function setupModals() {
        // Delete button handler
        $('.btn-outline-danger').click(function() {
            $('#deleteUserModal').modal('show');
        });
    }

    // Select2 Initialization
    function setupSelect2() {
        $('select').select2({
            width: '100%',
            dropdownParent: $('.modal')
        });
    }

    // Role-based Permission Management
    function setupRolePermissions() {
        $('select[name="role"]').change(function() {
            const role = $(this).val();

            // Reset all permissions
            $('.permission-item input[type="checkbox"]').prop('checked', false);

            // Set permissions based on role
            switch(role) {
                case 'superadmin':
                    $('.permission-item input[type="checkbox"]').prop('checked', true);
                    break;
                case 'companyadmin':
                    $('.permission-item input[type="checkbox"]').not('#perm-user-delete').prop('checked', true);
                    break;
                case 'hr':
                    $('#perm-company-view, #perm-user-view, #perm-user-create, #perm-user-edit').prop('checked', true);
                    break;
                case 'pm':
                    $('#perm-project-view, #perm-project-create, #perm-project-edit').prop('checked', true);
                    break;
                case 'employee':
                    $('#perm-project-view').prop('checked', true);
                    break;
                case 'client':
                    // Clients typically have very limited permissions
                    break;
            }
        });
    }
});
