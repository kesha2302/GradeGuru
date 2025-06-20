<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GradeGuru</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('AdminPanel/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('AdminPanel/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full">

        <!--  App Topstrip -->

        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img h2">
                        GRADEGURU
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            {{-- <span class="hide-menu">Home</span> --}}
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg" href="" aria-expanded="false">
                                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ route('admin.banner') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:screencast-2-line-duotone"
                                            class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Banner</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ route('admin.aboutus') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">About As</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/ClassNameData') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">ClassNames</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/ClassPrice') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Class Price</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/RegularQuestions') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Regular Question</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/SuperQuestions') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Super Question</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Result') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Result</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Booking Ditails</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{url('/Admin/Userdetail')}}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:chart-line-duotone" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">User Detial</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                    </ul>
                    <div class=>
                        <div class="flex-shrink-0">
                            {{-- <h6 class="fw-semibold fs-4 mb-6 text-dark w-75 lh-sm">Check Pro Version</h6>
              <a href="https://www.wrappixel.com/templates/spike-bootstrap-admin-dashboard/?ref=376" target="_blank"
                class="btn btn-secondary fs-2 fw-semibold lh-sm">Check</a> --}}
                        </div>
                        <div class="unlimited-access-img">
                            <img src="../assets/images/backgrounds/sidebar-buynow-bg.png" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <!--  Header Start -->
                    <header class="app-header">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item d-block d-xl-none">
                                    <a class="nav-link sidebartoggler " id="headerCollapse"
                                        href="javascript:void(0)">
                                        <i class="ti ti-menu-2"></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="javascript:void(0)" id="drop1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                                        <div class="notification bg-primary rounded-circle"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="message-body">
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                Item 1
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                Item 2
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                    <a href="https://www.wrappixel.com/templates/spike-bootstrap-admin-dashboard/?ref=376"
                                        target="_blank" class="btn btn-primary">Check Pro Template</a>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="../assets/images/profile/user1.jpg" alt=""
                                                width="35" height="35" class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-user fs-6"></i>
                                                    <p class="mb-0 fs-3">My Profile</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-mail fs-6"></i>
                                                    <p class="mb-0 fs-3">My Account</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 dropdown-item">
                                                    <i class="ti ti-list-check fs-6"></i>
                                                    <p class="mb-0 fs-3">My Task</p>
                                                </a>
                                                <a href="./authentication-login.html"
                                                    class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!--  Header End -->
