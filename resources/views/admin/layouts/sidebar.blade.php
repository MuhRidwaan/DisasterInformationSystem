<!-- Menu -->
<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('images/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ri-circle-line align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">
                Menu
            </li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-danger rounded-pill">9+</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUserManagement" aria-expanded="false"
                    aria-controls="sidebarUserManagement" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user-shield"></i></span>
                    <span class="menu-text"> User Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUserManagement">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('admin.users.index') }}" class="side-nav-link">
                                <span class="menu-text">Users</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="side-nav-link">
                                <span class="menu-text">Roles</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="side-nav-link">
                                <span class="menu-text">Permissions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">
                Menu
            </li>

            <li class="side-nav-item">
                <a href="disaster-types.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-alert-triangle"></i></span>
                    <span class="menu-text"> Disaster Types </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="disaster-events.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-calendar-event"></i></span>
                    <span class="menu-text"> Disaster Event </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="incident-report.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-report"></i></span>
                    <span class="menu-text"> Incident Report </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="resources.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-box"></i></span>
                    <span class="menu-text"> Resources</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="volunteers.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Volunteers </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="posko.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-building"></i></span>
                    <span class="menu-text"> Posko </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="notifications.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-bell"></i></span>
                    <span class="menu-text"> Notifications </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="audit-logs.html" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-file-search"></i></span>
                    <span class="menu-text"> Audit Logs </span>
                </a>
            </li>




        </ul> <!-- Penting: Tutup <ul> di sini -->
        <div class="clearfix"></div>

    </div> <!-- Tutup div data-simplebar -->
</div>
<!-- Sidenav Menu End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


<div class="page-content">
