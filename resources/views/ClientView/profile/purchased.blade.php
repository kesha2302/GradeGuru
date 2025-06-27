@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="container py-4">
        <h2 class="mb-4">Student Test Plans</h2>

        <div class="row">
            <!-- Super Test Plan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Super Test</h5>

                        <ul class="list-unstyled text-muted mb-3">
                            <li><i class="fas fa-check text-success me-2"></i> 240+ Tests Available</li>
                            {{-- <li><i class="fas fa-check text-success me-2"></i> Advanced Practice & Analysis</li> --}}
                            <li><i class="fas fa-check text-success me-2"></i>  Solution lecture</li>
                            <li><i class="fas fa-clock text-warning me-2"></i> Timing: 120 mins</li>
                        </ul>

                        <h6 class="card-subtitle text-muted">Price:</h6>
                        <p class="card-text fw-bold">₹999</p>
                    </div>
                </div>
            </div>

            <!-- All Test Plan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">All Test</h5>

                        <ul class="list-unstyled text-muted mb-3">
                            <li><i class="fas fa-check text-success me-2"></i> 120 Multiple Choice Questions</li>
                            {{-- <li><i class="fas fa-check text-success me-2"></i> Basic Mock Tests</li> --}}
                            <li><i class="fas fa-check text-success me-2"></i> Solution lecture</li>
                            <li><i class="fas fa-clock text-warning me-2"></i> Timing: 120 mins</li>
                        </ul>

                        <h6 class="card-subtitle text-muted">Price:</h6>
                        <p class="card-text fw-bold">₹499</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
