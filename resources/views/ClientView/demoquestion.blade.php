@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="mx-auto bg-white shadow-lg rounded-5 p-5 animate__animated animate__fadeIn" style="max-width: 750px;">


{{-- @php
    $duration = session("test_duration_{$test->demo_id}", 90); // in seconds
    $start = session("test_start_time_{$test->demo_id}", time());
    $elapsed = time() - $start;
    $timeLeft = max($duration - $elapsed, 0);
    $initialMin = str_pad(floor($timeLeft / 60), 2, '0', STR_PAD_LEFT);
    $initialSec = str_pad($timeLeft % 60, 2, '0', STR_PAD_LEFT);
@endphp --}}
@php
    $duration = session("test_duration_{$test->demo_id}", 90); // seconds
    $start = session("test_start_time_{$test->demo_id}", time());
    $elapsed = time() - $start;
    $timeLeft = max($duration - $elapsed, 0);
    $initialMin = str_pad(floor($timeLeft / 60), 2, '0', STR_PAD_LEFT);
    $initialSec = str_pad($timeLeft % 60, 2, '0', STR_PAD_LEFT);
@endphp


        <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark mb-0">
        <span class="text-muted">Question:</span>
        <span class="text-primary">{{ $currentIndex + 1 }}</span>
    </h4>
    {{-- <span class="badge rounded-pill bg-primary px-3 py-2 fs-6 shadow-sm text-white">
    {{ $currentIndex + 1 }} of {{ $totalQuestions }}
</span>

 <span class="badge bg-danger fs-6 px-3 py-2 text-white rounded-pill shadow-sm" id="timer">
                    {{ $initialMin }}:{{ $initialSec }}
                </span> --}}
                <div class="d-flex align-items-center gap-2">
    <span class="badge rounded-pill bg-primary px-3 py-2 fs-6 shadow-sm text-white">
        {{ $currentIndex + 1 }} of {{ $totalQuestions }}
    </span>

    <span class="badge bg-danger fs-6 px-3 py-2 text-white rounded-pill shadow-sm" id="timer">
        {{ $initialMin }}:{{ $initialSec }}
    </span>
</div>

</div>

        <h3 class="fs-5 fw-semibold text-dark mb-4">{{ $question->question }}</h3>

      <form method="POST" id="questionForm"
    action="{{ route('demotestsubmit.test', ['demo_id' => $test->demo_id]) }}">
    @csrf
    <input type="hidden" name="index" id="questionIndex" value="{{ $currentIndex }}">
    <input type="hidden" name="direction" id="directionInput" value="next">
    <input type="hidden" name="question_id" value="{{ $question->demoque_id }}">

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

           <div class="d-flex justify-content-between">
    @if ($currentIndex > 0)
        <button type="button"
            class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-pill shadow-sm"
            onclick="submitWithDirection('prev')">
            ← Previous
        </button>
    @else
        <div></div>
    @endif

    @if ($currentIndex + 1 == $totalQuestions)
        <button type="submit" class="btn btn-success px-4 py-2 fw-semibold rounded-pill text-white shadow-sm"
            onclick="submitWithDirection('submit')">
            Submit
        </button>
    @else
        <button type="button"
            class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-pill shadow-sm"
            onclick="submitWithDirection('next')">
            Next →
        </button>
    @endif
</div>

        </form>
    </div>
</div>


<style>
    .option-card {
        background-color: #f8f9fa;
        border: 2px solid transparent;
        transition: all 0.25s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .option-card:hover {
        background-color: #fff9db !important;
        border-color: #facc15;
        transform: translateY(-2px);
    }


    .form-check-input {
        width: 1.3em;
        height: 1.3em;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-label {
        cursor: pointer;
        font-size: 1.1rem;
        color: #333;
        margin-left: 5px;
        margin-top: 4px;
    }

    .rounded-5 {
        border-radius: 1.5rem !important;
    }

    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
    }

    button {
        min-width: 120px;
    }
</style>


<script>
    function changeIndex(change) {
        const indexInput = document.getElementById('questionIndex');
        indexInput.value = parseInt(indexInput.value) + change;
        indexInput.form.submit();
    }
</script>
<script>
    function submitWithDirection(direction) {
        document.getElementById('directionInput').value = direction;
        document.getElementById('questionForm').submit();
    }
</script>

{{-- <script>
    const testStartTime = {{ session("test_start_time_{$test->demo_id}", now()->timestamp) }};
const totalDuration = {{ session("test_duration_{$test->demo_id}", 90) }};
    const now = Math.floor(Date.now() / 1000);
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
        fetch('{{ route("demotest.autosubmit", $test->demo_id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            window.location.href = '{{ route("demotest.result", $test->demo_id) }}';
        });
    }
</script> --}}
<script>
    const testStartTime = {{ session("test_start_time_{$test->demo_id}", time()) }};
    const totalDuration = {{ session("test_duration_{$test->demo_id}", 90) }};
    const now = Math.floor(Date.now() / 1000);
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
        fetch('{{ route("demotest.autosubmit", $test->demo_id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            window.location.href = '{{ route("demotest.result", $test->demo_id) }}';
        });
    }
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection
