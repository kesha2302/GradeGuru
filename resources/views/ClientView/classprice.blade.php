@extends('ClientView.Layouts.main')
@section('main-section')

<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white"> Class</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="{{url('/')}}">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Class</p>
        </div>
      </div>
    </div>
    <div class="container mt-5 pt-5 mb-4">
        <h3 class="mt-5 mb-3 text-center text-dark">This is ClassPrice Package</h3>
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
                                <button onclick="addToCart({{ $cp->cp_id }})" class="btn btn-dark w-100">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
