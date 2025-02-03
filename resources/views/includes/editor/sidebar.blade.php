<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('template_admin/img/logo.png') }}" class="rounded" alt=""
                width="45px">
        </div>
        <div class="sidebar-brand-text mx-3">First Studio</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('editor') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('editor/users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.users') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('editor/master-head') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.master-head') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Master Head</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('editor/contact') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.contact') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Contact</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('editor/service') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.service') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Service</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User -->
    <li class="nav-item {{ Request::is('editor/portofolio') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('editor.portofolio') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Portofolio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
