{{-- @extends('ClientView.Layouts.main')
@section('main-section')

<div class="container" style="margin-top: 80px; margin-bottom:80px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-4" style="font-family: cursive; color: teal;">Login to GradeGuru</h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="mt-3 text-center">

                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-4" style="font-family: cursive; color: teal;">Login to GradeGuru</h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="form-group mb-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group form-check mb-4">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label">Remember Me</label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
