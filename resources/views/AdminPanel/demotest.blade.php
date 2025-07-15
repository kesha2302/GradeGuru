@extends('AdminPanel.Layouts.main')
@section('main-section')


 <div class="container-fluid">
        <h3>DemoTest Data</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex"  method="GET" action="{{ url('/Admin/DemoTest') }}">

                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ $search }}" name="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/DemoTest') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>
                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ url('/Admin/Demotestform') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">
                        </i> Add
                    </button>
                </div>
            </div>
        </nav>


        <div class="card mt-2" style="width:100%">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ClassName</th>
                                <th>Title</th>
                                <th>Time</th>
                                <th>Pass Marks</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demotest as $dt)
                                <tr>
                                    <td>{{ $dt->classNames->standard ?: '-' }}</td>
                                    <td>{{$dt->title ?: '-'}}</td>
                                    <td>{{$dt->time?: '-'}} min</td>
                                    <td>{{$dt->pass_marks?: '-'}}</td>
                                    <td>
                                        <a href="{{ route('demotest.delete', ['id' => $dt->demo_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>

                                        <a href="{{ route('demotest.edit', ['id' => $dt->demo_id]) }}">
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
                {{ $demotest->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

@endsection
