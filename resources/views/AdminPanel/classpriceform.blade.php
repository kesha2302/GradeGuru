@extends('AdminPanel.Layouts.main')
@section('main-section')

    <div class="container-fluid">
        <div class="card  mt-3 mx-auto" style="width:50rem;">

            <div class="card-header mt-2">
                <h3>{{ $title }}</h3>
            </div>


            <div class="card-body">

                <form action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (empty($class_price->class_id))
                        <div class="mb-3">
                            <label class="form-label">Class Name:</label>
                            <select name="class_names" class="form-select" data-live-search="true"
                                aria-label="Default select">
                                <option selected disabled>Select Class</option>
                                @foreach ($class_names as $cn)
                                    <option value="{{ $cn->class_id }}">{{ $cn->standard }}</option>
                                @endforeach
                            </select>
                            @error('class_names')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ $class_price->title }}"
                            placeholder="Title of Class" />
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Feature:</label>
                        <input type="text" name="feature" class="form-control" value="{{ $class_price->feature }}"
                            placeholder="Features" />
                        @error('feature')
                            {{ $message }}
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Price:</label>
                        <input type="text" name="price" class="form-control" value="{{ $class_price->price }}"
                            placeholder="Price" />
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
