@include('layout/header')
@php use Illuminate\Support\Facades\Auth; @endphp

<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
     data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

@include('layout/sidebar')

<div class="body-wrapper">
    <header class="app-header" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 2;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>

            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_picture ?? asset('/BS/assets/images/profile/avatar.jpeg') }}"
                                width="35" height="35"
                                style="object-fit: cover;"
                                class="rounded-circle" alt="Foto Profil">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                             aria-labelledby="drop2">
                            <div class="message-body">
                                <a class="mx-3 mt-2 d-block btn btn-sm btn-outline-primary mb-2"
                                   href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    @yield('content')
</div>

</div>

@include('layout/footer')
