@extends('ClientView.Layouts.main')
@section('main-section')
    <!-- resources/views/ClientView/index.blade.php -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Home Page</title>
    </head>

    <body>
        <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
            <div class="row align-items-center px-3">
                <div class="col-lg-6 text-center text-lg-left">
                    <h4 class="text-white mb-4 mt-5 mt-lg-0">Kids Learning Center</h4>
                    <h1 class="display-3 font-weight-bold text-white">
                        New Approach to Kids Education
                    </h1>
                    <p class="text-white mb-4">
                        Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed
                        sit. Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed
                        ipsum at ipsum nonumy amet. Clita lorem dolore sed stet et est justo
                        dolore.
                    </p>
                    <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <img class="img-fluid mt-5" src="ClientView/img/header.png" alt="" />
                </div>
            </div>
        </div>

    <h1>Welcome to GradeGuru!</h1>
    <div class="container mt-5 pt-5 mb-4">
<div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <h5 class="card-title text-primary">Super Test</h5>

            <ul class="list-unstyled text-muted mb-3">
                <li><i class="fas fa-check text-success me-2"></i> 240+ Tests Available</li>
                <li><i class="fas fa-check text-success me-2"></i> Solution lecture</li>
                <li><i class="fas fa-clock text-warning me-2"></i> Timing: 120 mins</li>
            </ul>

            <h6 class="card-subtitle text-muted">Price:</h6>
            <p class="card-text fw-bold">₹999</p>

                <form method="POST" action="{{ route('cart.add') }}">

                @csrf
                <input type="hidden" name="name" value="Super Test">
                <input type="hidden" name="price" value="999">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-outline-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>

@endsection
