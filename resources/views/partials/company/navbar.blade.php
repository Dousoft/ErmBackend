{{-- <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="btn btn-link" id="sidebarToggle" style="color: #3c7139;">
            <i class="fas fa-bars"></i>
        </button>
        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle text-dark" id="notificationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li>
                        <h6 class="dropdown-header">Notifications</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-plus text-success me-2"></i>
                            New employee joined</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-invoice-dollar text-primary me-2"></i>
                            Payroll
                            processed</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-tasks text-warning me-2"></i> 3
                            pending approvals</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-project-diagram text-info me-2"></i> Project
                            milestone
                            reached</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-exclamation-triangle text-danger me-2"></i>
                            Urgent: Client
                            payment overdue</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                </ul>
            </div>
            <div class="dropdown ms-3">
                <a href="#" class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none"
                    id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/company/image/avtar.webp') }}" alt="User" class="rounded-circle me-2" width="55px">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

 --}}
