@extends('AdminPanel.Layouts.main')

@section('main-section')
    <div class='mt-3 container'>
        <h3>User Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ request()->search }}" name="search"
                        placeholder="Search by title" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/Userdetail') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>
            </div>
        </nav>

        <div class="card mt-2" style="width:100%;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No.</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 35%;">Email</th>
                                <th style="width: 35%;">Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userdetail as $bc)
                                <tr>
                                    <td>{{ $bc->id }}</td>
                                    <td>{{ $bc->name ?: '-' }}</td>
                                    <td>{{ $bc->email ?: '-' }}</td>
                                    <td>{{ $bc->contact ?: '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-dark fw-bold">No Users found for "{{ request()->search }}"</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
