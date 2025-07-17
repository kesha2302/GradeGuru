@extends('AdminPanel.Layouts.main')

@section('main-section')
    <!-- Header Section with Background -->
    <div class="position-relative">
        <!-- Purple Background -->
        <div class="py-5 px-4" style="background-color: #6c63ff; border-radius: 30px 30px 0 0;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center text-white">
                    <h3 class="mb-0 fw-bold">Dashboard Overview</h3>
                </div>
            </div>
        </div>

        <!-- Cards Overlapping -->
        <div class="container position-relative" style="margin-top: -60px; z-index: 10;">
            <div class="row g-4">

                <!-- Total Users Card -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Users</h6>
                                <h4 class="fw-bold mb-0 text-primary">{{ $totalUsers }}</h4>
                            </div>
                            <div class="bg-light p-2 rounded-3">
                                <iconify-icon icon="mdi:account-group-outline" width="30" height="30"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Packages Card -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Bookings</h6>
                                <h4 class="fw-bold mb-0 text-success">{{ $totalBookings }}</h4>
                            </div>
                            <div class="bg-light p-2 rounded-3">
                                <iconify-icon icon="mdi:form-select" width="30" height="30"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Standards Card -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Classes</h6>
                                <h4 class="fw-bold mb-0 text-warning">{{ $totalStandards }}</h4>
                            </div>
                            <div class="bg-light p-2 rounded-3">
                                <iconify-icon icon="mdi:school-outline" width="30" height="30"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Card -->
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Tests</h6>
                                <h4 class="fw-bold mb-0 text-info">{{ $totalTests }}</h4>
                            </div>
                            <div class="bg-light p-2 rounded-3">
                                <iconify-icon icon="mdi:book-open-page-variant-outline" width="30"
                                    height="30"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
