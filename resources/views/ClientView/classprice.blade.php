<div class="col-md-6 mb-4">
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

