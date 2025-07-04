@extends('ClientView.Layouts.main')

@section('main-section')


<div class="container mt-5 pt-5 mb-4">
<div class="container">
    <h2>Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
       value="{{ session('success') ? '' : old('name', $user->name) }}">

        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
       value="{{ session('success') ? '' : old('email', $user->email) }}">

        </div>
      <div class="mb-3">
            <label>Mobile Number</label>
            <input type="text" name="contact" class="form-control"
       value="{{ session('success') ? '' : old('contact', $user->contact) }}">

        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
@endsection
