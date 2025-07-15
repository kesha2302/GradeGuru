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

                    @if (empty($demoque->demoque_id))
                        <div class="mb-3">
                            <label class="form-label">DemoTest:</label>
                            <select name="demotest"  class="form-select" data-live-search="true"
                                aria-label="Default select">
                                <option selected disabled>Select title</option>
                                @foreach ($demotest as $dt)
                                    <option value="{{ $dt->demo_id }}">{{ $dt->title }}-({{ $dt->classNames->standard }})</option>
                                @endforeach
                            </select>
                            @error('demotest')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif


                    <div class="mb-3">
                        <label class="form-label">Question No:</label>
                        <input type="text" name="que_no" class="form-control" value="{{ $demoque->question_no }}"
                            placeholder="Question Number" />
                        @error('que_no')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question:</label>
                        <input type="text" name="question" class="form-control" value="{{ $demoque->question }}"
                            placeholder="Question" />
                        @error('question')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option1:</label>
                        <input type="text" name="option1" class="form-control" value="{{ $demoque->option1 }}"
                            placeholder="Option1" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option2:</label>
                        <input type="text" name="option2" class="form-control" value="{{ $demoque->option2 }}"
                            placeholder="Option2" />
                        @error('option2')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option3:</label>
                        <input type="text" name="option3" class="form-control" value="{{ $demoque->option3 }}"
                            placeholder="Option3" />
                        @error('option3')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Option4:</label>
                        <input type="text" name="option4" class="form-control" value="{{ $demoque->option4 }}"
                            placeholder="Option4" />
                        @error('option1')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answer:</label>
                        <input type="text" name="answer" class="form-control" value="{{ $demoque->answer }}"
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


@endsection
