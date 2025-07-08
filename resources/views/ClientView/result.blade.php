@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-4 mb-5">
    <div class="mx-auto" style="max-width: 900px;">
        <h2 class="mb-4 text-center fw-bold text-primary">
            <i class="bi bi-check2-circle"></i> Test Results
        </h2>

        <ul class="list-group shadow-sm rounded-4 overflow-hidden">
@foreach ($answers as $questionKey => $selectedOption)
    @php
        $question = $allQuestions[$questionKey] ?? null;
    @endphp

    @if ($question)
        @php
            $selectedOption = (trim($selectedOption));
            $correctOption = (trim($question->answer));

            $selectedLabel = (str_replace('option', '', $selectedOption));
            $correctLabel = (str_replace('option', '', $correctOption));

            $selectedText = str_starts_with($selectedOption, 'option') ? ($question->{$selectedOption} ?? 'N/A') : $selectedOption;
$correctText  = str_starts_with($correctOption, 'option') ? ($question->{$correctOption} ?? 'N/A') : $correctOption;


            $isCorrect = $selectedText === $correctText;

        @endphp

        <li class="list-group-item py-4 px-4 border-0 border-bottom">
            <div class="mb-2">
                <span class="fw-semibold text-dark">Q{{ $question->question_no }}:</span>
                <span class="text-muted">{{ $question->question }}</span>
            </div>

            <div class="d-flex align-items-center gap-2 mb-1">
                @if ($isCorrect)
                    <i class="bi bi-check-circle-fill text-success"></i>
                    <span class="text-success fw-semibold">Your Answer (Correct):</span>
                @else
                    <i class="bi bi-x-circle-fill text-danger"></i>
                    <span class="text-danger fw-semibold">Your Answer (Wrong):</span>
                @endif
                <span class="ms-2">{{ $selectedLabel }}. {{ $selectedText }}</span>
            </div>

            @unless($isCorrect)
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-lightbulb-fill text-warning"></i>
                    <span class="text-secondary fw-semibold">Correct Answer:</span>
                    <span class="ms-2">{{ $correctLabel }}</span>
                </div>
            @endunless
        </li>
    @else
        <li class="list-group-item text-danger">
            <i class="bi bi-exclamation-triangle-fill"></i>
            Question with ID {{ $questionKey }} not found.
        </li>
    @endif
@endforeach

        </ul>
    </div>
</div>

<style>
    .list-group-item {
        background-color: #fdfdfd;
        transition: background 0.3s ease;
    }
    .list-group-item:hover {
        background-color: #f0f8ff;
    }
</style>
@endsection
