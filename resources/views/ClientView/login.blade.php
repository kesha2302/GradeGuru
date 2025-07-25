@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-5">
        <div class="container mt-5 pt-5 mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4 shadow">
                        <h3 class="text-center mb-4" style="font-family: cursive; color: teal;">Login to GradeGuru</h3>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @if (session('login_error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('login_error') }}
                                </div>
                            @endif


                            <div class="form-group mb-4">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="d-flex justify-content-end mb-4">
                                <a href="{{ route('forgot.password') }}" class="text-decoration-none text-primary"
                                    style="font-size: 1rem; font-weight: 500;">
                                    Forgot Password?
                                </a>
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
    </div>
@endsection
