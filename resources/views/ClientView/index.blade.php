@extends('ClientView.Layouts.main')
@section('main-section')


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


 @php
            $className = \App\Models\ClassName::all();
        @endphp

        <!-- Blog Start -->
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <span class="px-2">Classes</span>
                    </p>
                    <h1 class="mb-4">All Classes</h1>
                </div>
                <div class="row pb-3">
                    @foreach ($className as $cn)
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow-sm mb-2">
                                <img class="card-img-top mb-2" src="{{ asset('ClientView/img/blog-1.jpg') }}"
                                    alt="" />
                                <div class="card-body bg-light text-center p-4">
                                    <h3 class="">{{ $cn->standard }}</h3>
                                    <h4 class="">{{ $cn->title }}</h4>
                                    <p>
                                        {{ $cn->description }}
                                    </p>
                                    <a href="{{ route('classprice.show', $cn->class_id) }}" class="btn btn-primary px-4 mx-auto my-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Blog End -->


    <div class="container mt-5 pt-5 mb-4">
<div class="col-md-6 mb-4 ">
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
    </div>


@endsection
