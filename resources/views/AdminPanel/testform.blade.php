@extends('AdminPanel.Layouts.main')
@section('main-section')

    <div class="container-fluid">
        <div class="card  mt-3 mx-auto" style="width:50rem;">

            <div class="card-header mt-2">
                <h3>{{ $title }}</h3>
            </div>


            <div class="card-body">

                <form action="{{ url($url) }}" method="POST">
                    @csrf

                    @if (empty($test->cp_id))
                        <div class="mb-3">
                            <label class="form-label">ClassPrice:</label>
                            <select name="class_price" class="form-select" data-live-search="true"
                                aria-label="Default select">
                                <option selected disabled>Select Class</option>
                                @foreach ($class_price as $cp)
                                    <option value="{{ $cp->cp_id }}">{{ $cp->title }}-(₹{{ $cp->price }})</option>
                                @endforeach
                            </select>
                            @error('class_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ $test->title }}"
                            placeholder="Test 1" />
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question Type:</label>
                        <select name="que_type" class="form-select mb-3">
                            <option disabled {{ $test->que_type == null ? 'selected' : '' }}>Select Option</option>
                            <option value="Super" {{ $test->que_type == 'Super' ? 'selected' : '' }}>Super Question
                            </option>
                            <option value="Regular" {{ $test->que_type == 'Regular' ? 'selected' : '' }}>Regular Question
                            </option>
                        </select>


                        @error('que_type')
                            <div class="text-danger">{{ $message }}</div>
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
