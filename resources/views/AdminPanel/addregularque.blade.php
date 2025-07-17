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

                    @if (empty($regulerque->cp_id))
                        <div class="mb-3">
                            <label class="form-label">ClassName:</label>
                            <select name="class_price" id="class-price-dropdown" class="form-select" data-live-search="true"
                                aria-label="Default select">
                                <option selected disabled>Select Class</option>
                                @foreach ($class_price as $xy)
                                    <option value="{{ $xy->cp_id }}">{{ $xy->title }}-(₹{{ $xy->price }})</option>
                                @endforeach
                            </select>
                            @error('class_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if (empty($regulerque->cp_id))
                        <div class="mb-3">
                            <label class="form-label">Test:</label>
                            <select name="test" id ="test-dropdown" class="form-select" data-live-search="true"
                                aria-label="Default select">
                                <option selected disabled>Select Test</option>
                            </select>
                            @error('test')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif


                    <div class="mb-3">
                        <label class="form-label">question_no:</label>
                        <input type="text" name="question_no" class="form-control" value="{{ $regulerque->question_no }}"
                            placeholder="question_no" />
                        @error('question_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">question</label>
                        <input type="text" name="question" class="form-control" value="{{ $regulerque->question }}"
                            placeholder="question" />
                        @error('question')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">option1</label>
                        <input type="text" name="option1" class="form-control" value="{{ $regulerque->option1 }}"
                            placeholder="option1" />
                        @error('option1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">option2</label>
                        <input type="text" name="option2" class="form-control" value="{{ $regulerque->option2 }}"
                            placeholder="option2" />
                        @error('option2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">option3</label>
                        <input type="text" name="option3" class="form-control" value="{{ $regulerque->option3 }}"
                            placeholder="option3" />
                        @error('option3')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">option4</label>
                        <input type="text" name="option4" class="form-control" value="{{ $regulerque->option1 }}"
                            placeholder="option4" />
                        @error('option4')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">answer</label>
                        <input type="text" name="answer" class="form-control" value="{{ $regulerque->answer }}"
                            placeholder="answer" />
                        @error('answer')
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#class-price-dropdown').on('change', function() {
            var cp_id = $(this).val();
            if (cp_id) {
                $.ajax({
                    url: '/Admin/Addtest/' + cp_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#test-dropdown').empty();
                        $('#test-dropdown').append('<option selected disabled>Select Test</option>');
                        $.each(data, function(key, value) {
                            $('#test-dropdown').append('<option value="' + value.test_id +
                                '">' + value.title + ' - ' + value.que_type + '</option>');
                        });
                    }
                });
            } else {
                $('#test-dropdown').empty();
            }
        });
    </script>
@endsection
