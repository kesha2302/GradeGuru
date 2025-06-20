@extends('AdminPanel.Layouts.main')

@section('main-section')
    <div class="card mt-5 mx-auto shadow-lg" style="width:50rem;">
        <div class="card-header mt-2">
            <h3>{{ $title }}</h3>
        </div>

        <div class="card-body">
            <form action="{{ $url }}" enctype="multipart/form-data" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $bannerdetail->title ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" rows="4" class="form-control">{{ $bannerdetail->description ?? '' }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    @if (!empty($bannerdetail->image))
                        <div class="mb-2">
                            <img src="{{ url('BannerImage/' . $bannerdetail->image) }}" alt="Banner Image"
                                class="img-thumbnail" style="width: 150px; height: 150px;">
                        </div>
                    @endif
                    <input class="form-control" type="file" name="image" id="formFile">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
