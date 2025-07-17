@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="mt-5 pt-5 mb-4">
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4 shadow">
                        <h4 class="mb-4 text-center text-primary">Forgot Password</h4>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('forgot.password.send') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Enter your registered email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Send Reset Link</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
