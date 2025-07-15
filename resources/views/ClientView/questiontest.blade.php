{{-- @extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-5 mb-4">
        <div class="mx-auto bg-white shadow-2xl rounded-5 p-5" style="max-width: 700px;">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold text-dark">
                    <span class="text-muted">Question:</span> <span class="text-primary">{{ $currentIndex + 1 }}</span>
                </h4>
                <span class="badge bg-gradient px-4 py-2 rounded-pill text-white fs-6 shadow-sm">
                    {{ $currentIndex + 1 }} of {{ $totalQuestions }}
                </span>
            </div>

            @php
                $duration = session('test_duration', 90);
                $start = session('test_start_time', now()->timestamp);
                $elapsed = time() - $start;
                $timeLeft = max($duration - $elapsed, 0);
                $initialMin = str_pad(floor($timeLeft / 60), 2, '0', STR_PAD_LEFT);
                $initialSec = str_pad($timeLeft % 60, 2, '0', STR_PAD_LEFT);
            @endphp

            <div class="text-end mb-3">
                <span class="badge bg-danger fs-6 px-3 py-2 text-white"
                    id="timer">{{ $initialMin }}:{{ $initialSec }}</span>
            </div>

            <h3 class="fs-5 fw-bold text-dark mb-4">
                {{ $question->question }}
            </h3>

            <form method="POST" action="{{ route('test.submit', $test->test_id) }}">
                @csrf

                @if ($type === 'regular')
                    <input type="hidden" name="rq_id" value="{{ $question->rq_id }}">
                @elseif ($type === 'super')
                    <input type="hidden" name="sq_id" value="{{ $question->sq_id }}">
                @endif

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
                            <input class="form-check-input custom-radio" type="radio" name="answer"
                                id="{{ $field }}" value="{{ $field }}"
                                {{ $selected === $field ? 'checked' : '' }}>

                            <label class="form-check-label fs-5 fw-semibold text-dark mb-0" for="{{ $field }}">
                                {{ $label }}. {{ $question->$field }}
                            </label>
                        </div>
                    @endforeach
                </div>


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

    <script>
        const testStartTime = {{ session('test_start_time', now()->timestamp) }};
        const now = Math.floor(Date.now() / 1000);
        const totalDuration = {{ session('test_duration', 90) }};
        const timePassed = now - testStartTime;
        let timeLeft = Math.max(totalDuration - timePassed, 0);

        const timerElement = document.getElementById('timer');

        const countdown = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60).toString().padStart(2, '0');
            const seconds = (timeLeft % 60).toString().padStart(2, '0');
            timerElement.textContent = `${minutes}:${seconds}`;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                autoSubmitDueToTimeout();
            }

            timeLeft--;
        }, 1000);

        function autoSubmitDueToTimeout() {
            fetch('{{ route('test.autosubmit', $test->test_id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => {
                window.location.href = '{{ route('test.result', $test->test_id) }}';
            });
        }
    </script>
@endsection --}}

@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="mx-auto bg-white shadow-lg rounded-5 p-5 animate__animated animate__fadeIn" style="max-width: 750px;">

        <!-- Timer -->
        @php
            $duration = session('test_duration', 90);
            $start = session('test_start_time', now()->timestamp);
            $elapsed = time() - $start;
            $timeLeft = max($duration - $elapsed, 0);
            $initialMin = str_pad(floor($timeLeft / 60), 2, '0', STR_PAD_LEFT);
            $initialSec = str_pad($timeLeft % 60, 2, '0', STR_PAD_LEFT);
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark">
                <span class="text-muted">Question:</span> <span class="text-primary">{{ $currentIndex + 1 }}</span>
            </h4>
            <div class="d-flex gap-3">
                <span class="badge bg-gradient fs-6 px-4 py-2 rounded-pill shadow-sm">
                    {{ $currentIndex + 1 }} of {{ $totalQuestions }}
                </span>
                <span class="badge bg-danger fs-6 px-3 py-2 text-white rounded-pill shadow-sm" id="timer">
                    {{ $initialMin }}:{{ $initialSec }}
                </span>
            </div>
        </div>

        <!-- Question -->
        <h3 class="fs-5 fw-semibold text-dark mb-4">{{ $question->question }}</h3>

        <!-- Question Form -->
        <form method="POST" action="{{ route('test.submit', $test->test_id) }}">
            @csrf

            @if ($type === 'regular')
                <input type="hidden" name="rq_id" value="{{ $question->rq_id }}">
            @elseif ($type === 'super')
                <input type="hidden" name="sq_id" value="{{ $question->sq_id }}">
            @endif

            @php
                $options = ['option1' => 'A', 'option2' => 'B', 'option3' => 'C', 'option4' => 'D'];
            @endphp

            <div class="d-grid gap-4 mb-5">
                @foreach ($options as $field => $label)
                    <div class="form-check option-card d-flex align-items-center px-4 py-3 shadow-sm rounded-4">
                        <input class="form-check-input custom-radio me-3" type="radio" name="answer"
                            id="{{ $field }}" value="{{ $field }}"
                            {{ $selected === $field ? 'checked' : '' }}>

                        <label class="form-check-label fs-5 fw-semibold text-dark mb-0 w-100" for="{{ $field }}">
                            {{ $label }}. {{ $question->$field }}
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between">
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

<!-- Styles -->
<style>
    .bg-gradient {
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        color: white;
    }

    .option-card {
        background-color: #f8f9fa;
        border: 2px solid transparent;
        transition: all 0.25s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .option-card:hover {
        background-color: #fff9db !important;
        border-color: #facc15;
        transform: translateY(-2px);
    }

    .form-check-input {
        width: 1.3em;
        height: 1.3em;
        flex-shrink: 0;
        margin-top: 0 !important;
        margin-left: 0 !important;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-label {
        cursor: pointer;
        flex: 1;
        font-size: 1.1rem;
        margin-bottom: 0;
        color: #333;
    }

    .rounded-5 {
        border-radius: 1.5rem !important;
    }

    .shadow-2xl,
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
    }

    button {
        min-width: 120px;
    }
</style>

<!-- Script -->
<script>
    const testStartTime = {{ session('test_start_time', now()->timestamp) }};
    const now = Math.floor(Date.now() / 1000);
    const totalDuration = {{ session('test_duration', 90) }};
    const timePassed = now - testStartTime;
    let timeLeft = Math.max(totalDuration - timePassed, 0);

    const timerElement = document.getElementById('timer');

    const countdown = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60).toString().padStart(2, '0');
        const seconds = (timeLeft % 60).toString().padStart(2, '0');
        timerElement.textContent = `${minutes}:${seconds}`;

        if (timeLeft <= 0) {
            clearInterval(countdown);
            autoSubmitDueToTimeout();
        }

        timeLeft--;
    }, 1000);

    function autoSubmitDueToTimeout() {
        fetch('{{ route("test.autosubmit", $test->test_id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            window.location.href = '{{ route("test.result", $test->test_id) }}';
        });
    }
</script>

<!-- Optional Animation CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

@endsection
