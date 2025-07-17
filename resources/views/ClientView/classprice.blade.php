@extends('ClientView.Layouts.main')
@section('main-section')
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white"> Class</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Class</p>
            </div>
        </div>
    </div>
    <div class="container mt-5 pt-5 mb-4">
        <h3 class="mt-5 mb-3 text-center text-dark">ClassPrice Package</h3>
        <div class="row">
            @foreach ($classprice as $index => $cp)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex flex-column">
                            @foreach (explode('. ', $cp->title) as $line)
                                @if (trim($line) !== '')
                                    <h5 class="mb-1">
                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                        <strong>{{ $line }}.</strong>
                                    </h5>
                                @endif
                            @endforeach

                            @foreach (explode('. ', $cp->feature) as $line)
                                @if (trim($line) !== '')
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-arrow-right-circle-fill text-success me-2"></i>
                                        {{ $line }}.
                                    </p>
                                @endif
                            @endforeach

                            <div class="mt-3">
                                <h5 class="card-subtitle text-muted mb-2">
                                    Price
                                    ₹{{ $cp->price }}
                                </h5>
                            </div>

                            <div class="mt-auto">
                                @auth
                                    <button onclick="addToCart({{ $cp->cp_id }})" class="btn btn-primary w-100">
                                        Add to cart
                                    </button>
                                @endauth

                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-dark w-100">
                                        Add to cart
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- Demo Test --}}
        <h3 class="mt-3 mb-3 text-center text-dark">Free Trial Test</h3>

        <div class="row">
            @foreach ($demotest as $index => $dt)
                <div class="col-md-4 mb-4">
                    <div class="card border-warning border-top border-3 shadow rounded-4 h-100 hover-shadow">
                        <div class="card-body d-flex flex-column">

                            <span
                                class="badge bg-light border border-warning mb-2 w-fit px-3 py-2 rounded-pill text-uppercase d-flex align-items-center gap-1 shadow-sm">
                                <iconify-icon icon="mdi:star" width="18" height="18"
                                    style="color: #ffc107;"></iconify-icon>
                                <span class="fw-semibold text-dark">Trial Test</span>
                            </span>

                            <h5 class="fw-bold text-dark mb-2">Mock {{ $dt->title }}</h5>
                            <p class="text-muted mb-1">
                                <iconify-icon icon="mdi:clock-outline" width="18"
                                    class="me-1 icon-align"></iconify-icon>
                                Duration: <strong>{{ $dt->time }} min</strong>
                            </p>

                            <p class="text-muted small">Get a quick feel of the real test environment. No pressure!</p>
                            <!-- CTA -->
                            <div class="mt-auto">
                                @auth
                                    @php
                                        $userAttempts = $attempts[$dt->demo_id] ?? 0;
                                    @endphp

                                    @if ($userAttempts < 3)
                                        <a href="{{ route('demoquestion.test', $dt->demo_id) }}"
                                            class="btn btn-primary w-100 rounded-3">
                                            <iconify-icon icon="mdi:play-circle-outline" width="20"
                                                class="me-1 icon-align"></iconify-icon>
                                            Try Test
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-outline-danger w-100 rounded-3"
                                            onclick="alert('You have already taken this trial test 3 times. Please purchase a package to continue.')">
                                            <iconify-icon icon="mdi:alert-circle-outline" width="20"
                                                class="me-1 icon-align"></iconify-icon>
                                            Trial Limit Reached
                                        </button>
                                    @endif
                                @endauth

                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-primary w-100 rounded-3">
                                        <iconify-icon icon="mdi:login" width="20" class="me-1 icon-align"></iconify-icon>
                                        Login to Try
                                    </a>
                                @endguest
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

    <style>
        .icon-align {
            vertical-align: middle;
            margin-top: -2px;
            /* Optional tweak */
        }

        .hover-shadow:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .w-fit {
            width: fit-content;
        }
    </style>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function addToCart(productId) {
        $.ajax({
            url: '{{ route('cart.add') }}',
            method: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                let badge = $('#cart-badge');
                badge.text(response.totalItems);
                badge.removeClass('d-none');
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }
</script>
