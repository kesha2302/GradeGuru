@extends('AdminPanel.Layouts.main')

@section('main-section')
    <div class='mt-3 container'>
        <h3>Banner Trash Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex">
                    <a href="{{ route('admin.banner') }}">
                        <button class="btn btn-danger ml-2">View Banner Details</button>
                    </a>
                </div>
            </div>
        </nav>

        <div class="card mt-2" style="width:100%">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%;">No.</th>
                                <th style="width: 15%;">Title</th>
                                <th style="width: 25%;">Description</th>
                                <th style="width: 30%;">Image</th>
                                <th colspan="2" style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bannerdetail as $bd)
                                <tr>
                                    <td>{{ $bd->banner_id }}</td>
                                    <td>{{ $bd->title ?? '-' }}</td>
                                    <td>{{ Str::limit($bd->description, 80) }}</td>
                                    <td>
                                        <img src="{{ asset('BannerImage/' . $bd->image) }}" class="img-fluid rounded"
                                            alt="Image" style="width: 100px; height:70px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banner.restore', $bd->banner_id) }}">
                                            <button class="btn btn-primary m-2">Restore</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banner.delete', $bd->banner_id) }}"
                                            onclick="return confirm('Are you sure to permanently delete this banner?');">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No trashed banners found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
