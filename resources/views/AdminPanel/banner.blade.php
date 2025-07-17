@extends('AdminPanel.Layouts.main')

@section('main-section')
    <div class='mt-3 container'>
        <h3>Banner Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" action="{{ route('admin.banner') }}" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ request()->search }}" name="search"
                        placeholder="Search by title" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ route('admin.banner') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>

                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ route('admin.banner.add') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">Add</button>

                    <a href="{{ route('admin.banner.trash') }}">
                        <button class="btn btn-danger ml-2">Trashed Data</button>
                    </a>
                </div>
            </div>
        </nav>

        <div class="card mt-2" style="width:100%;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No.</th>
                                <th style="width: 15%;">Image</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 35%;">Description</th>
                                <th colspan="2" style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bannerdetail as $bd)
                                <tr>
                                    <td>{{ $bd->banner_id }}</td>
                                    <td>
                                        <img src="{{ asset('BannerImage/' . $bd->image) }}" class="img-fluid rounded"
                                            alt="Image" style="width: 100px; height:70px;">
                                    </td>
                                    <td>{{ $bd->title ?: '-' }}</td>
                                    <td>{{ $bd->description ?: '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.banner.trashSoft', $bd->banner_id) }}">
                                            <button class="btn btn-danger m-2">Trash</button>
                                        </a>
                                        <a href="{{ route('admin.banner.edit', $bd->banner_id) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-danger fw-bold">No banners found for "{{ request()->search }}"
                                        </div>
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
