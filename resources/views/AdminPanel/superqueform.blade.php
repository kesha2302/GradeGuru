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

                    @if (empty($superque->cp_id))
                        <div class="mb-3">
                            <label class="form-label">ClassName:</label>
                            <select name="class_price" id="class-price-dropdown" class="form-select" data-live-search="true"
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

                    @if (empty($superque->cp_id))
                        <div class="mb-3">
                            <label class="form-label">Test:</label>
                            <select name="test" id="test-dropdown" class="form-select" aria-label="Select Test">
                                <option selected disabled>Select Test</option>
                            </select>
                            @error('test')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif


                    <div class="mb-3">
                        <label class="form-label">Question No:</label>
                        <input type="text" name="que_no" class="form-control" value="{{ $superque->question_no }}"
                            placeholder="Question Number" />
                        @error('que_no')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question:</label>
                        <input type="text" name="question" class="form-control" value="{{ $superque->question }}"
                            placeholder="Question" />
                        @error('question')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option1:</label>
                        <input type="text" name="option1" class="form-control" value="{{ $superque->option1 }}"
                            placeholder="Option1" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option2:</label>
                        <input type="text" name="option2" class="form-control" value="{{ $superque->option2 }}"
                            placeholder="Option2" />
                        @error('option2')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option3:</label>
                        <input type="text" name="option3" class="form-control" value="{{ $superque->option3 }}"
                            placeholder="Option3" />
                        @error('option3')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option4:</label>
                        <input type="text" name="option4" class="form-control" value="{{ $superque->option4 }}"
                            placeholder="Option4" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answer:</label>
                        <input type="text" name="answer" class="form-control" value="{{ $superque->answer }}"
                            placeholder="Answer" />
                        @error('answer')
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#class-price-dropdown').on('change', function() {
            var cp_id = $(this).val();
            if (cp_id) {
                $.ajax({
                    url: '/get-tests/' + cp_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#test-dropdown').empty();
                        $('#test-dropdown').append('<option selected disabled>Select Test</option>');
                        $.each(data, function(key, value) {
                            $('#test-dropdown').append('<option value="' + value.test_id + '">' + value.title + ' - ' + value.que_type + '</option>');

                        });
                    }
                });
            } else {
                $('#test-dropdown').empty();
            }
        });
    </script>

@endsection
