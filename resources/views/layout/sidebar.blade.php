<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('landing') }}" class="text-nowrap logo-img">
                <p class="fw-bold">EduData</p>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="ti ti-atom"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li><span class="sidebar-divider lg"></span></li>

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Menu</span>
                </li>

                <li class="sidebar-item">

                <a class="sidebar-link justify-content-between" 
                href="{{ route('murid.index') }}" 
                aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Data Murid</span>
                    </div>
                </a>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('murid.importPage') }}" aria-expanded="false">
                        <i class="ti ti-file"></i>
                        <span class="hide-menu">Import Data Murid</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('murid.exportPage') }}" aria-expanded="false">
                        <i class="ti ti-file"></i>
                        <span class="hide-menu">Export Data Murid</span>
                    </a>
                </li>
            </li>

            </ul>
        </nav>
    </div>
</aside>
