@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    {{-- <div class="card shadow-sm border-0"> --}}
        <div class="card-body">
            <h4 class="mb-4 text-primary">🛒 Your Shopping Cart</h4>
<ul class="list-group mb-4">
    <!-- Super Test Item -->
    <li class="list-group-item p-4 shadow-sm rounded">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <!-- Item Info -->
            <div class="mb-3 mb-md-0">
                <h5 class="text-primary fw-semibold mb-2"> Super Test</h5>
                <div class="text-muted small">
                    <i class="fas fa-check-circle text-success me-1"></i> 240+ Tests Available<br>
                    <i class="fas fa-video text-info me-1"></i> Solution lecture<br>
                    <i class="fas fa-clock text-warning me-1"></i> Timing: 120 mins
                </div>
            </div>

            <!-- Quantity & Price -->
          <div class="d-flex justify-content-center align-items-center w-100">
    <!-- Quantity Controls -->
   <div class="input-group me-4" style="width: 130px;">
    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="updateQuantity(-1)">−</button>
    <input id="quantityInput" type="text" class="form-control form-control-sm text-center" value="1" readonly>
    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="updateQuantity(1)">+</button>
</div>

</div>
 <span class="fw-bold text-dark fs-5">₹999</span>

</ul>


            <!-- Cart Summary -->
            <div class="d-flex justify-content-between mb-3">
                <h5>Total:</h5>
                <h5>₹999</h5>
            </div>

            <!-- Checkout Button -->
            <div class="text-end">
                <a href="" class="btn btn-success btn-lg">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function updateQuantity(change) {
        const input = document.getElementById('quantityInput');
        let value = parseInt(input.value);
        value += change;
        if (value < 1) value = 1; // Minimum quantity = 1
        input.value = value;
    }
</script>
@endsection
