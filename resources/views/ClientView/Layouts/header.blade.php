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
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />
<!-- In your main layout (e.g., main.blade.php in <head>) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <link href="{{ asset('ClientView/lib/flaticon/font/flaticon.css')}}" rel="stylesheet" />

    <link href="{{ asset('ClientView/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('ClientView/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />


    <link href="{{ asset('ClientView/css/style.css')}}" rel="stylesheet" />

  </head>
  <body>
        <div class="container-fluid bg-light position-relative shadow">
     <nav
  class="navbar navbar-expand-lg bg-light navbar-light fixed-top py-3 py-lg-0 px-0 px-lg-5">
        <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
      <img src="./ClientView/img/guru.png" height="95" width="110">

        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>

            <a href="{{ route('about') }}" class="nav-item nav-link">About us</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact us   </a>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Class</a
              >
              <div class="dropdown-menu rounded-0 m-0">
                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                <a href="single.html" class="dropdown-item">Blog Detail</a>
              </div>
            </div>
              <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                > Package</a
              >
              <div class="dropdown-menu rounded-0 m-0">
                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                <a href="single.html" class="dropdown-item">Blog Detail</a>
              </div>
            </div>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
    </a>
<ul class="dropdown-menu" aria-labelledby="profileDropdown">
    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
    <li><a class="dropdown-item" href="{{ route('plans.purchased') }}">Purchased Plan</a></li>
</ul>

</li>

{{-- <a class="nav-link" href="{{ route('cart.index') }}">
    <i class="fas fa-shopping-cart"></i>

    @if(session('cart'))
        <span class="badge bg-danger">{{ count(session('cart')) }}</span>
    @endif
</a> --}}
<a class="nav-link position-relative" href="{{ route('cart.index') }}">

    <i class="fas fa-shopping-cart fa-lg"></i>

    @if(session('cart') && count(session('cart')) > 0)
        <span class="position-absolute top-50 start-50 translate-middle badge rounded-pill bg-danger">
            {{ count(session('cart')) }}

        </span>
    @endif
</a>

          </div>



         <div class="d-flex align-items-center gap-2">
    @guest
        <a href="{{ route('register') }}" class="btn btn-outline-primary mr-2">Register</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary mr-2">Login</a>
    @endguest

    @auth

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-secondary mr-2">Logout</button>
        </form>
    @endauth


</div>

        </div>

      </nav>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  </body>
