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

                    <div class="mb-3">
                        <label class="form-label">Standard:</label>
                        <input type="text" name="standard" class="form-control" value="{{ $class_names->standard }}"
                            placeholder="Class 1" />
                        @error('standard')
                            {{ $message }}
                        @enderror
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ $class_names->title }}"
                            placeholder="Title of Class" />
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <input type="text" name="description" class="form-control" value="{{ $class_names->description }}"
                            placeholder="Desccription" />
                        @error('description')
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
