@extends('ClientView.Layouts.main')
@section('main-section')


<div class="container mt-5 pt-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-4" style="font-family: cursive; color: teal;">Register to GradeGuru</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
    <label>Contact Number</label>
    <input type="text" name="contact" class="form-control" required>
</div>


                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <div class="mt-3 text-center">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
