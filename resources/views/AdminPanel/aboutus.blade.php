@extends('AdminPanel.Layouts.main')

@section('main-section')

    <div class='mt-3 container'>
        <h3>AboutUs Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search"
                        value="{{ request()->search }}" name="search" placeholder="Search by title"
                        aria-label="Search" >
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ route('admin.aboutus') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>

                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ route('admin.about.add') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">Add</button>

                    {{-- <a href="{{ route('admin.banner.trash') }}">
                        <button class="btn btn-danger ml-2">Trashed Data</button>
                    </a> --}}
                </div>
            </div>
        </nav>

         <div class="card mt-2" style="width:100%;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 35%;">Description1</th>
                                <th style="width: 35%;">Description2</th>
                                <th colspan="2" style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aboutdetail as $ab)
                                <tr>
                                    <td>{{ $ab->about_id }}</td>
                                    <td>{{ $ab->title ?: '-' }}</td>
                                    <td>{{ $ab->description1 ?: '-' }}</td>
                                     <td>{{ $ab->description2 ?: '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.aboutus.delete', ['id' => $ab->about_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>
                                        <a href="{{ route('admin.aboutus.edit', ['id' => $ab->about_id]) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-dark fw-bold">No Aboutus found for "{{ request()->search }}"</div>
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
