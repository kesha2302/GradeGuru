@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-4 mb-5">
        <div class="mx-auto" style="max-width: 900px;">

            <h2 class="mb-4 text-center fw-bold text-primary mt-5">
                <i class="bi bi-check2-circle"></i> Test Results
            </h2>

            <!-- Score Summary -->
            <div class="mb-5 text-center">
                <div class="card shadow rounded-4 p-4 bg-white">
                    <h4 class="fw-bold text-secondary mb-3">Score Summary</h4>

                    <div class="row justify-content-center mb-3">
                        <div class="col-md-4">
                            <div class="border-start border-4 border-info ps-4 py-2">
                                <h4 class="fw-bold">
                                    <span class="{{ $status === 'Pass' ? 'text-success' : 'text-danger' }}">
                                        <i
                                            class="bi {{ $status === 'Pass' ? 'bi-emoji-smile-fill' : 'bi-emoji-frown-fill' }} me-2"></i>
                                        Result: {{ $status }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="border-start border-primary ps-3">
                                <h6 class="text-muted">Total Questions</h6>
                                <h5 class="fw-bold text-primary">{{ $totalQuestions }}</h5>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="border-start border-success ps-3">
                                <h6 class="text-muted">Correct Answers</h6>
                                <h5 class="fw-bold text-success"><i
                                        class="bi bi-check-circle-fill me-1"></i>{{ $correct }}</h5>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="border-start border-danger ps-3">
                                <h6 class="text-muted">Wrong Answers</h6>
                                <h5 class="fw-bold text-danger"><i class="bi bi-x-circle-fill me-1"></i>{{ $wrong }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <button class="btn btn-outline-primary px-4 py-2 fw-semibold rounded-pill"
                            onclick="toggleAnswers()">
                            Show Answers
                        </button>
                    </div>
                </div>
            </div>

            <!-- Answer List -->
            <div id="answerList" style="display: none;">
                <ul class="list-group shadow-sm rounded-4 overflow-hidden">
                    @foreach ($questions as $index => $question)
                        @php
                            $selectedOptionKey = $answers[$question->demoque_id] ?? '-';
                            $selectedText = $selectedOptionKey !== '-' ? $question->{$selectedOptionKey} ?? '-' : '-';
                            $correctText = $question->answer ?? 'N/A';

                            $isCorrect = $selectedText === $correctText;
                            $selectedLabel = str_replace('option', '', $selectedOptionKey);
                        @endphp

                        <li class="list-group-item p-4 border-bottom bg-light-subtle">
                            <div class="mb-2">
                                <span class="fw-semibold text-dark">Q{{ $question->question_no }}:</span>
                                <span class="text-muted">{{ $question->question }}</span>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-2">
                                @if ($selectedOptionKey === '-' || $selectedText === 'Invalid Option')
                                    <i class="bi bi-dash-circle-fill text-muted fs-5"></i>
                                    <span class="text-muted fw-semibold">Not Answered</span>
                                @elseif ($isCorrect)
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <span class="text-success fw-semibold">Your Answer (Correct):</span>
                                    <span class="ms-2">{{ $selectedText }}</span>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger fs-5"></i>
                                    <span class="text-danger fw-semibold">Your Answer (Wrong):</span>
                                    <span class="ms-2">{{ $selectedText }}</span>
                                @endif
                            </div>

                            @if (!$isCorrect)
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-lightbulb-fill text-warning fs-5"></i>
                                    <span class="text-secondary fw-semibold">Correct Answer:</span>
                                    <span class="ms-2">{{ $correctText }}</span>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <style>
        .list-group-item {
            transition: background 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }
    </style>

    <script>
        function toggleAnswers() {
            const answerList = document.getElementById('answerList');
            const button = event.target;

            if (answerList.style.display === 'none') {
                answerList.style.display = 'block';
                button.textContent = 'Hide Answers';
            } else {
                answerList.style.display = 'none';
                button.textContent = 'Show Answers';
            }
        }
    </script>
@endsection
