<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GradeGuru</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('AdminPanel/assets/images/logos/guru.png') }}" />
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
                    <a href="{{ url('/Admin') }}" class="text-nowrap logo-img h2">
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
                            <a class="sidebar-link primary-hover-bg" href="{{ url('/Admin') }}" aria-expanded="false">
                                <iconify-icon icon="material-symbols:dashboard-outline-rounded"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Userdetail') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:account-group-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">User Detials</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ route('admin.banner') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:image-outline" class=""></iconify-icon>
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
                                        <iconify-icon icon="mdi:account-details-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">About Us</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/ClassNameData') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="fluent:book-number-24-regular"
                                            class=""></iconify-icon>
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
                                        <iconify-icon icon="mdi:cash-100" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Class Price</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Test') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:clipboard-text-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Test</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/RegularQuestions') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:help-circle-outline" class=""></iconify-icon>
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
                                        <iconify-icon icon="mdi:help-circle-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Super Question</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/DemoTest') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:clipboard-text-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Demo Test</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/DemoQuestion') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:help-circle-outline"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Demo Question</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Result') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:medal-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Result Details</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/DemoResult') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:medal-outline" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Demo Result Details</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Inquiry') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:file-document-outline"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Inquiry Details</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link primary-hover-bg justify-content-between"
                                href="{{ url('/Admin/Booking') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">
                                    <span class="d-flex">
                                        <iconify-icon icon="mdi:calendar-check" class=""></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Booking Details</span>
                                </div>
                                <span class="hide-menu badge text-bg-primary fs-1 py-1 px-2 rounded-pill"></span>
                            </a>
                        </li>

                    </ul>
                    <div class=>
                        <div class="flex-shrink-0">
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

                            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">

                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                                    <li class="nav-item dropdown">

                                        @auth('admin')
                                            <form action="{{ route('adminlogout') }}" method="POST"
                                                style="display: inline; margin-right: 20px;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-sign-out-alt"></i> Logout
                                                </button>
                                            </form>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!--  Header End -->
