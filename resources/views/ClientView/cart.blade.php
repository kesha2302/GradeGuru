@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="card shadow-sm border-0 p-4">
        <div class="card-body">
            <h4 class="mb-4 text-primary"><i class="bi bi-cart4 me-2"></i> Your Shopping Cart</h4>

            @if(count($cart) > 0)
                @foreach ($cart as $item)
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                            <!-- Item Info -->
                            <div class="mb-3 mb-md-0" style="flex-grow: 1;">
                                {{-- Multiline title with bullet points --}}
                                <h6 class="text-muted mb-2">
    <i class="bi bi-book me-1"></i> Class: {{ $item['standard'] }}
</h6>
                                @foreach(explode('. ', $item['title']) as $line)
                                    @if(trim($line) !== '')
                                        <p class="mb-1 text-primary">
                                            <i class="bi bi-check-circle-fill me-1"></i> {{ $line }}.
                                        </p>
                                    @endif
                                @endforeach

                                <p class="fw-bold text-dark fs-5 mt-2">
                                    <i class="bi bi-cash-coin me-1 text-success"></i> ₹{{ number_format($item['price'], 2) }}
                                </p>
                            </div>

                            <!-- Remove Button -->
                            <div style="text-align: right;">
                                <button onclick="removeFromCart('{{ $item['cp_id'] }}')" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Cart Summary -->
                <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                    <h5 class="text-muted mb-0">Total:</h5>
                    <h4 class="text-success fw-bold mb-0">₹{{ number_format(session('totalAmount', 0), 2) }}</h4>
                </div>

                <!-- Checkout Button -->
                <div class="text-end mt-4">
                    <a href="#" id="checkoutButton" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-bag-check-fill me-1"></i> Proceed to Checkout
                    </a>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle-fill me-1"></i> Your cart is currently empty.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function removeFromCart(productId) {
        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }

    $(document).ready(function() {
        var totalAmount = {{ session('totalAmount', 0) }};
        var checkoutButton = $('#checkoutButton');

        if (totalAmount <= 0) {
            checkoutButton.prop('disabled', true).css('background-color', 'grey');
        }

        checkoutButton.click(function(e) {
            e.preventDefault();
            if (totalAmount > 0) {
                window.location.href = '{{ url("/Checkout") }}';
            }
        });
    });
</script>
