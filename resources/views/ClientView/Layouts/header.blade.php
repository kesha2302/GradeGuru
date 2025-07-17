<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GradeGuru </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />
    <link rel="icon" type="image/png" href="{{ asset('ClientView/img/guru.png') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
    <!-- In your main layout (e.g., main.blade.php in <head>) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <link href="{{ asset('ClientView/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />

    <link href="{{ asset('ClientView/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ClientView/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />


    <link href="{{ asset('ClientView/css/style.css') }}" rel="stylesheet" />

    <style>
        .navbar-brand img {
            height: 65px;
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            padding: 0.5rem 1rem;
        }

        #cart-badge {
            top: 0;
            right: -10px;
            font-size: 0.65rem;
            color: white;
            margin-top: 10px;
        }

        .cart-wrapper {
            position: relative;
            margin-left: 10px;
        }
    </style>

</head>

<body>
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <img src="{{ asset('ClientView/img/guru.png') }}" height="95" width="90">

            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold py-0" style="margin-left: 50px;">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">About us</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact us </a>

                    @php
                        $className = \App\Models\ClassName::all();
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="ClassDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Class
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="ClassDropdown">
                            @foreach ($className as $cn)
                                <li><a class="dropdown-item"
                                        href="{{ route('classprice.show', $cn->class_id) }}">{{ $cn->standard }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </div>


                @guest
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary me-md-2">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary ">Login</a>
                    </div>
                @endguest

                @auth
                    <div class="d-flex" style="margin-right:40px;">
                        <!-- Profile Icon -->
                        <div class="nav-item dropdown">
                            <a class="nav-link p-0" href="#" id="profileDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <h3> <i class="fas fa-user-circle mt-3"></i> </h3>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown" style="right:80px;">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.progressreport') }}">Progress
                                        Report</a></li>
                                <li><a class="dropdown-item" href="{{ route('plans.purchased') }}">Purchased Plan</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <!-- Cart Icon -->
                        <div class="cart-wrapper position-relative">
                            <a class="nav-link p-0" href="{{ route('cart.index') }}">
                                <h3> <i class="fas fa-shopping-cart mt-3 "></i></h3>
                                @if (session('cart') && count(session('cart')) > 0)
                                    <span id="cart-badge"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </a>
                        </div>
                    </div>
                @endauth


            </div>

        </nav>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
