@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5">
    <h2 class="mb-5 text-center fw-bold display-6 bg-gradient text-primary-emphasis">
         My Purchased Plans
    </h2>

    <div class="row g-4">
        @foreach($bookings as $booking)
            @foreach($booking->class_prices as $price)
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4">
                            {{-- <h5 class="card-title text-dark fw-semibold mb-3">{{ $price->title }}</h5> <!-- classprice --> --}}

                            <p class="mb-2 d-flex align-items-center">
                                <i class="bi bi-journal-bookmark-fill text-primary me-2 fs-5"></i>
                                <span><strong>Standard:</strong> {{ $price->classNames->standard ?? 'N/A' }}</span>
                            </p>

                            <p class="mb-2 d-flex align-items-center">
                                <i class="bi bi-currency-rupee text-success me-2 fs-5"></i>
                                <span><strong>Price:</strong> ₹{{ $price->price }}</span>
                            </p>

                            {{-- <p class="mb-3 d-flex align-items-center">
                                <i class="bi bi-receipt-cutoff text-secondary me-2 fs-5"></i>
                                <span><strong>Booking ID:</strong> {{ $booking->booking_id }}</span>
                            </p> --}}

                            <a href="{{ route('test.view', $price->cp_id) }}" class="btn btn-info w-100 rounded-pill fw-semibold">
                                <i class="bi bi-eye-fill me-1"></i> View Test
                            </a>
                        </div>

                        <div class="card-footer bg-light border-0 px-4 py-3 text-end text-muted small fw-semibold">
                            Total Paid: ₹{{ $booking->totalprice }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection



<style>
.custom-card {
    transition: 0.4s ease;
    background: #fdfdfd;
    border-radius: 1.25rem;
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
}

.card-title {
    font-size: 1.2rem;
}


</style>

