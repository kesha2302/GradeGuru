@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-5 mb-4">
        <div class="mx-auto bg-white shadow-2xl rounded-5 p-5" style="max-width: 700px;">

            <!-- Question Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold text-dark">
                    <span class="text-muted">Question:</span> <span class="text-primary">{{ $currentIndex + 1 }}</span>
                </h4>
                <span class="badge bg-gradient px-4 py-2 rounded-pill text-white fs-6 shadow-sm">
                    {{ $currentIndex + 1 }} of {{ $totalQuestions }}
                </span>
            </div>

            <!-- Question Title -->
            <h3 class="fs-5 fw-bold text-dark mb-4">
                {{ $question->question }}
            </h3>

            <!-- Form Start -->
            <form method="POST" action="{{ route('test.submit', $test->test_id) }}">
                @csrf

                {{-- <input type="hidden" name="question_no" value="{{ $question->question_no }}"> --}}
                @if ($type === 'regular')
                    <input type="hidden" name="rq_id" value="{{ $question->rq_id }}">
                @elseif ($type === 'super')
                    <input type="hidden" name="sq_id" value="{{ $question->sq_id }}">
                @endif



                <!-- Options -->
                @php
                    $options = [
                        'option1' => 'A',
                        'option2' => 'B',
                        'option3' => 'C',
                        'option4' => 'D',
                    ];
                @endphp

                <div class="d-grid gap-4 mb-5">
                    @foreach ($options as $field => $label)
                        <div
                            class="form-check d-flex align-items-center p-4 rounded-4 bg-light option-card shadow-sm gap-3">
                            {{-- <input class="form-check-input custom-radio" type="radio" name="answer"
                            id="{{ $field }}" value="{{ $field }}"> --}}
                            <input class="form-check-input custom-radio" type="radio" name="answer"
                                id="{{ $field }}" value="{{ $field }}"
                                {{ $selected === $field ? 'checked' : '' }}>

                            <label class="form-check-label fs-5 fw-semibold text-dark mb-0" for="{{ $field }}">
                                {{ $label }}. {{ $question->$field }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Buttons -->

                <div class="d-flex justify-content-between align-items-center">
                    @if ($currentIndex > 0)
                        <button type="submit" name="direction" value="prev"
                            class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-pill shadow-sm">
                            ← Previous
                        </button>
                    @else
                        <div></div>
                    @endif

                    @if ($currentIndex + 1 == $totalQuestions)
                        <button type="submit" name="direction" value="next"
                            class="btn btn-success px-4 py-2 fw-semibold rounded-pill text-white shadow-sm">
                            Submit
                        </button>
                    @else
                        <button type="submit" name="direction" value="next"
                            class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-pill shadow-sm">
                            Next →
                        </button>
                    @endif
                </div>

            </form>
        </div>
    </div>

    <!-- Styling -->
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
        }

        .option-card {
            cursor: pointer;
            transition: all 0.25s ease-in-out;
            border: 2px solid transparent;
        }

        .option-card:hover {
            background-color: #eef7ff;
            border-color: #3b82f6;
            transform: scale(1.02);
        }

        .form-check-input {
            width: 1.3em;
            height: 1.3em;
            margin-top: 0;
            flex-shrink: 0;
        }

        .form-check-input:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        .form-check-label {
            cursor: pointer;
            font-size: 1.15rem;
        }

        .rounded-5 {
            border-radius: 1.5rem !important;
        }

        .shadow-2xl {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
        }

        button {
            min-width: 120px;
        }
    </style>
@endsection
