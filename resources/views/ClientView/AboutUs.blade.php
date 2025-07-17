@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">About Us</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">About Us</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @foreach ($aboutdetail as $item)
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <img class="img-fluid rounded shadow" src="{{ asset('ClientView/img/aboutus.avif') }}" width="390px"
                        height="290px" alt="About Image">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4 text-primary">{{ $item->title }}</h2>
                    <p class="mb-3">{{ $item->description1 }}</p>
                    <p class="mb-3 text-muted">{{ $item->description2 }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
