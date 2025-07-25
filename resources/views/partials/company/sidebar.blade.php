<div class="sidebar" id="sidebar">
    {{-- <div class="logo" style="background-color: #eee;">
        <img src="{{ asset('assets/company/image/logoVertical.png') }}" alt="Logo" width="140px">
    </div> --}}

    <div class="top" style="text-align: right;background-color: #eee">

        <span>
            <img src="{{ asset('assets/company/image/logoVertical.png') }}" alt="Logo" width="140px">
        </span>

        <span>
            <i class="fas fa-bell" style="color: green;"></i>
            <span class="badge bg-danger rounded-pill">5</span>
        </span>
        <button class="btn btn-link" id="sidebarToggle" style="color: green;">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.company.page') }}">
                <i class="fas fa-building"></i>
                <span class="nav-link-text">My Company</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.employee.page') }}">
                <i class="fas fa-users"></i>
                <span class="nav-link-text">Employees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.hr.page') }}">
                <i class="fas fa-user-tie"></i>
                <span class="nav-link-text">HR Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-calendar-check"></i>
                <span class="nav-link-text">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.projects.page') }}">
                <i class="fas fa-project-diagram"></i>
                <span class="nav-link-text">Projects Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.clients.page') }}">
                <i class="fas fa-handshake"></i>
                <span class="nav-link-text">Clients</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.payroll.page') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span class="nav-link-text">Payroll</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('company.reports.page') }}">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-link-text">Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.settings.page') }}">
                <i class="fas fa-cog"></i>
                <span class="nav-link-text">Settings</span>
            </a>
        </li>
    </ul>
    <div class="quote">
        "Arise, Awake and Stop not until the goal is reached." – Swami Vivekananda
    </div>
</div>
