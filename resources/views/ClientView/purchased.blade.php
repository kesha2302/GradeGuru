@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-5">
        <h2 class="mb-5 text-center fw-bold display-6 bg-gradient text-primary-emphasis mt-5">
            My Purchased Plans
        </h2>

        <div class="row g-4">
            @foreach ($bookings as $booking)
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body p-4">

                            @foreach ($booking->class_prices as $price)
                                <div class="mb-4">
                                    <p class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-journal-bookmark-fill text-primary me-2 fs-5"></i>
                                        <span><strong>Standard:</strong> {{ $price->classNames->standard ?? 'N/A' }}</span>
                                    </p>

                                    <p class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-currency-rupee text-success me-2 fs-5"></i>
                                        <span><strong>Price:</strong> ₹{{ $price->price }}</span>
                                    </p>

                                    <a href="{{ route('test.view', $price->cp_id) }}"
                                        class="btn btn-info w-100 rounded-pill fw-semibold mb-3">
                                        <i class="bi bi-eye-fill me-1"></i> View Test
                                    </a>

                                    <hr class="my-2">
                                </div>
                            @endforeach

                        </div>

                        <div class="card-footer bg-light border-0 px-4 py-3 text-end text-muted small fw-semibold">
                            Total Paid: ₹{{ $booking->totalprice }}
                        </div>
                    </div>
                </div>
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
