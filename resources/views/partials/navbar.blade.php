<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="btn btn-link" id="sidebarToggle" style="color: #3c7139;">
            <i class="fas fa-bars"></i>
        </button>
        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle text-dark" id="notificationDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
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
                <a href="#" class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none"
                   id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/image/avtar.webp" alt="User" class="rounded-circle me-2" width="55px">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
