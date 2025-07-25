@extends('AdminPanel.Layouts.main')

@section('main-section')
    <div class='mt-3 container'>
        <h3>Result Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ request()->search }}" name="search"
                        placeholder="Search by name" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/Result') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>

        </nav>

        <div class="card mt-2" style="width:100%;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 35%;">ClassName</th>
                                <th style="width: 30%;">Test</th>
                                <th style="width: 30%;">Type</th>
                                <th style="width: 35%;">Result</th>
                                <th style="width: 35%;">Total Correct</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultdetail as $result)
                                <tr>
                                    <td>{{ $result->result_id }}</td>
                                    <td>{{ $result->users->name ?: '-' }}</td>
                                    <td>{{ $result->classPrice->title ?: '-' }}</td>
                                    <td>{{ $result->test->title ?: '-' }}</td>
                                    <td>{{ $result->test->que_type ?: '-' }}</td>
                                    <td>{{ $result->result ?: '-' }}</td>
                                    <td>{{ $result->correct ?: '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-dark fw-bold">No Result found "{{ request()->search }}"</div>
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
