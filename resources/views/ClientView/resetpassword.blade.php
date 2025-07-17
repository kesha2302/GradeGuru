@extends('ClientView.Layouts.main')

@section('main-section')

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-7">
                <div class="card shadow-lg rounded-4 p-4">
                    <h3 class="text-center text-primary mb-4" style="font-family: cursive;">Reset Your Password</h3>

                    @if (session('error'))
                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-center">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form action="{{ route('reset.password') }}" method="POST">
                        @csrf
                        <input type="hidden" name="Id" value="{{ $user->id }}">

                        <div class="form-group mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter new password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm new password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info w-100">Submit</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">← Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
