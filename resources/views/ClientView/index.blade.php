@extends('ClientView.Layouts.main')
@section('main-section')

@php
    $banners = \App\Models\Banner::all();
@endphp

@if($banners->count())
<div id="carouselExampleAutoplaying" class="carousel slide mt-5 pt-5" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="container-fluid px-0">
                <div class="row align-items-center m-0 p-5"
                     style="background: linear-gradient(135deg, #0b9db8, #15c5de); min-height: 90vh; position: relative; overflow: hidden; border-radius: 20px;">


                    <div class="col-lg-6 col-md-12 text-center text-lg-start px-5">
                        <h1 class="display-1 fw-bold mb-4"
                            style="line-height: 1.2; color: #e6e6e2; text-shadow: 2px 2px 4px rgba(0,0,0,0.4);">
                            {{ $banner->title ?? 'Default Main Heading' }}
                        </h1>

                        <h4 class="fs-4 mb-4"
                           style="max-width: 600px; color: #ffffffcc; font-weight: 500; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">
                            {{ $banner->description ?? 'Default description goes here...' }}
                    </h4>
                    </div>

                    <!-- Banner Image -->
                    <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0">
                        <div style="transform: rotate(-2deg); transition: transform 0.3s;">
                            <img src="{{ asset('bannerimage/' . $banner->image) }}" alt="Banner Image"
                                 class="img-fluid rounded-4 shadow-lg"
                                 style="max-height: 600px; object-fit: cover; border: 6px solid #fff; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif





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

@endsection
