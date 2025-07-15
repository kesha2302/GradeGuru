@extends('ClientView.Layouts.main')

@section('main-section')
<div class="container mt-5 pt-5 mb-4">
    <div class="mx-auto bg-white shadow-lg rounded-5 p-5 animate__animated animate__fadeIn" style="max-width: 750px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark mb-0">
        <span class="text-muted">Question:</span>
        <span class="text-primary">{{ $currentIndex + 1 }}</span>
    </h4>
    <span class="badge rounded-pill bg-primary px-3 py-2 fs-6 shadow-sm text-white">
    {{ $currentIndex + 1 }} of {{ $totalQuestions }}
</span>

</div>

        <!-- Question -->
        <h3 class="fs-5 fw-semibold text-dark mb-4">{{ $question->question }}</h3>

        <!-- Question Form -->
      <form method="POST" id="questionForm"
    action="{{ route('demotestsubmit.test', ['demo_id' => $test->demo_id]) }}">
    @csrf
    <input type="hidden" name="index" id="questionIndex" value="{{ $currentIndex }}">
    <input type="hidden" name="direction" id="directionInput" value="next">


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

<!-- Style Section -->
<style>
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
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-label {
        cursor: pointer;
        font-size: 1.1rem;
        margin-bottom: 0;
        color: #333;
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

<!-- JS -->
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


@endsection
