@extends('ClientView.Layouts.main')
@section('main-section')


<div class="container mt-5 pt-5 mb-4">

    <h3 class="mt-5"> This is ClassPrice Package</h3>
    <div class="row">
        @foreach ($classprice as $index => $cp)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $cp->title }}</h5>
                        <p>{{ $cp->feature }}</p>

                        <h6 class="card-subtitle text-muted">Price:</h6>
                        <p class="card-text fw-bold">₹{{ $cp->price }}</p>

                        <button type="submit" class="btn btn-outline-primary">Add to Cart</button>
                    </div>
                </div>
            </div>

            {{-- Close and open row every 3 items --}}
            @if(($index + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>

@endsection
