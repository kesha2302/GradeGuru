@extends('AdminPanel.Layouts.main')
@section('main-section')


 <div class="container-fluid">
        <h3>Test Data</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex"  method="GET" action="{{ url('/Admin/Test') }}">

                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ $search }}" name="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/Test') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>
                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ url('/Admin/Testform') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">
                        </i> Add
                    </button>
                </div>
            </div>
        </nav>


        <div class="card mt-2" style="width:100%">
            <div class="card-body">
                <div class="table-responsive text-center" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Title</th>
                                <th>Que Type</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($test as $t)
                                <tr>
                                    <td>{{$t->classPrice->title}}-(₹{{$t->classPrice->price}})</td>
                                    <td>{{$t->title ?: '-'}}</td>
                                    <td>{{$t->que_type ?: '-'}}</td>
                                    <td>
                                        <a href="{{ route('test.delete', ['id' => $t->test_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>

                                        <a href="{{ route('test.edit', ['id' => $t->test_id]) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $test->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

@endsection
