@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5">
        <h2 class="mb-4">Your Answers</h2>
        <ul class="list-group">
            @foreach ($answers as $questionId => $selected)
                @php
                    $question = $allQuestions[$questionId] ?? null;
                    $selectedLabel = strtoupper(str_replace('option', '', $selected));
                @endphp

                @if ($question)
                    <li class="list-group-item">
                        <strong>Q:</strong> {{ $question->question_no }}<br>
                        <strong>Selected:</strong> {{ $selectedLabel }}. {{ $question->$selected }}
                        {{-- <strong>Correct:</strong>  {{ $question->$answer }} --}}
                        <strong>Correct:</strong> {{ strtoupper(str_replace('option', '', $question->answer)) }}. {{ $question->{$question->answer} }}


                    </li>
                @else
                    <li class="list-group-item text-danger">
                        Question with ID {{ $questionId }} not found.
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
