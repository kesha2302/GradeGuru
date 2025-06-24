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

                    @if(empty($regulerque->cp_id))
                <div class="mb-3" >
                    <label class="form-label">Class:</label>
                    <select name="class_price" class="form-select" data-live-search="true"
                    aria-label="Default select">
                        <option selected disabled>Select Class</option>
                        @foreach($class_price as $xy)
                            <option value="{{ $xy->cp_id }}">{{ $xy->title }}-(₹{{ $xy->price }})</option>
                        @endforeach
                    </select>
                    @error('class_price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endif

                     <div class="mb-3">
                        <label class="form-label">question_no:</label>
                        <input type="text" name="question_no" class="form-control" value="{{ $regulerque->question_no }}"
                            placeholder="question_no" />
                        @error('question_no')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">question</label>
                        <input type="text" name="question" class="form-control" value="{{ $regulerque->question }}"
                            placeholder="question" />
                        @error('question')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">option1</label>
                        <input type="text" name="option1" class="form-control" value="{{ $regulerque->option1 }}"
                            placeholder="option1" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                      <div class="mb-3">
                        <label class="form-label">option2</label>
                        <input type="text" name="option2" class="form-control" value="{{ $regulerque->option2 }}"
                            placeholder="option2" />
                        @error('option2')
                            {{ $message }}
                        @enderror
                    </div>

                      <div class="mb-3">
                        <label class="form-label">option3</label>
                        <input type="text" name="option3" class="form-control" value="{{ $regulerque->option3 }}"
                            placeholder="option3" />
                        @error('option3')
                            {{ $message }}
                        @enderror
                    </div>

                      <div class="mb-3">
                        <label class="form-label">option4</label>
                        <input type="text" name="option4" class="form-control" value="{{ $regulerque->option1 }}"
                            placeholder="option4" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                      <div class="mb-3">
                        <label class="form-label">answer</label>
                        <input type="text" name="answer" class="form-control" value="{{ $regulerque->answer }}"
                            placeholder="answer" />
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
@endsection
