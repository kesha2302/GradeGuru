@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-5">
    <div class="mx-auto bg-white shadow-lg rounded-5 p-5 animate__animated animate__fadeIn" style="max-width: 850px;">

        <h3 class="mb-4 fw-bold text-primary">Demo Test Result</h3>

        @foreach ($questions as $index => $question)
            @php
                $userAnswer = $answers[$question->id] ?? '-';
                $correctAnswer = $question->correct_option; // assuming column name is correct_option (like 'option2')
                $isCorrect = $userAnswer === $correctAnswer;
                $answerLabel = ['option1' => 'A', 'option2' => 'B', 'option3' => 'C', 'option4' => 'D'];
            @endphp

            <div class="mb-4 p-4 rounded-4 shadow-sm border {{ $isCorrect ? 'border-success bg-light' : 'border-danger bg-light' }}">
                <h5 class="fw-semibold text-dark mb-3">
                    <span class="text-muted">Q{{ $index + 1 }}:</span> {{ $question->question }}
                </h5>

                {{-- <p class="mb-1">
                    <strong>Your Answer:</strong>
                   <span class="{{ $isCorrect ? 'text-success' : 'text-danger' }}">
    @if($userAnswer !== '-' && isset($answerLabel[$userAnswer]) && !empty($question->$userAnswer))
        {{ $answerLabel[$userAnswer] }}. {{ $question->$userAnswer }}
    @else
        Not Answered
    @endif
</span>


                </p>

                <p class="mb-0">
                    <strong>Correct Answer:</strong>
                    <span class="text-success">
                        {{ $answerLabel[$correctAnswer] }}. {{ $question->$correctAnswer }}
                    </span>
                </p> --}}
            </div>
        @endforeach

        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 py-2">Back to Dashboard</a>
        </div>
    </div>
</div>

<!-- Optional styling -->
<style>
    .rounded-4 {
        border-radius: 1rem !important;
    }
</style>
@endsection
