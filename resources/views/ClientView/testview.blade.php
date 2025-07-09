@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="mt-5 pt-5 mb-4">
        <!-- Heading & Buttons -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded px-4 py-3 mb-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="fw-bold text-primary mb-0">Class-5 Test Series</h2>

                <div class="align-items-center gap-5">
                    <button type="button" id="regularBtn" onclick="setActive('regular')"
                        class="btn btn-outline-info rounded-pill px-5 py-2 fw-semibold shadow-sm">
                        Regular Question
                    </button>

                    <button type="button" id="superBtn" onclick="setActive('super')"
                        class="btn btn-outline-info rounded-pill px-5 py-2 fw-semibold shadow-sm">
                        Super Question
                    </button>
                </div>
            </div>
        </nav>

        <!-- Test Cards Section -->
        <div class="bg-light px-4 py-5 rounded-4 shadow-sm">
            <div class="row g-5" id="regular-section">
                @forelse($regularTests as $test)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-custom d-flex mb-4">
                        <div
                            class="bg-white rounded-4 shadow hover-effect w-100 p-4 d-flex flex-column justify-between border border-0">
                            <div>
                                <h5 class="fw-bold text-dark mb-2">{{ $test->title }}</h5>
                               <p class="text-muted small mb-4">
    <i class="bi bi-clock me-1"></i>
    {{ $test->regularQuestions->count() }} MCQ • 5 Minutes
</p>

                                {{-- <a href="{{ route('question.test', $test->test_id) }}"
                                    class="btn btn-primary w-100 fw-semibold py-2 shadow-sm">
                                    <i class="bi bi-play-circle-fill me-2 fs-5"></i> Start
                                </a> --}}
                                <a href="{{ route('question.test', ['test_id' => $test->test_id, 'type' => 'regular']) }}"
    class="btn btn-primary w-100 fw-semibold py-2 shadow-sm">
    <i class="bi bi-play-circle-fill me-2 fs-5"></i> Start
</a>

                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center">No regular tests found.</p>
                @endforelse
            </div>

            <div class="row g-5 d-none" id="super-section">
                @forelse($superTests as $test)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-custom d-flex mb-4">
                        <div
                            class="bg-white rounded-4 shadow hover-effect w-100 p-4 d-flex flex-column justify-between border border-0">
                            <div>
                                <h5 class="fw-bold text-dark mb-2">{{ $test->title }}</h5>
                               <p class="text-muted small mb-4">
    <i class="bi bi-clock me-1"></i>
    {{ $test->superQuestions->count() }} MCQ • 10 Minutes
</p>

                                {{-- <a href="{{ route('question.test', $test->test_id) }}"
                                    class="btn btn-primary w-100 fw-semibold py-2 shadow-sm">
                                    <i class="bi bi-play-circle-fill me-2 fs-5"></i> Start
                                </a> --}}
                                <a href="{{ route('question.test', ['test_id' => $test->test_id, 'type' => 'super']) }}"
    class="btn btn-primary w-100 fw-semibold py-2 shadow-sm">
    <i class="bi bi-play-circle-fill me-2 fs-5"></i> Start
</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No super tests found.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- JS: Toggle Between Regular & Super -->
    <script>
        function setActive(type) {
            const regularBtn = document.getElementById('regularBtn');
            const superBtn = document.getElementById('superBtn');
            const regularSection = document.getElementById('regular-section');
            const superSection = document.getElementById('super-section');

            if (type === 'regular') {
                regularBtn.classList.add('btn-info', 'text-white');
                regularBtn.classList.remove('btn-outline-info');

                superBtn.classList.remove('btn-info', 'text-white');
                superBtn.classList.add('btn-outline-info');

                regularSection.classList.remove('d-none');
                superSection.classList.add('d-none');
            } else {
                superBtn.classList.add('btn-info', 'text-white');
                superBtn.classList.remove('btn-outline-info');

                regularBtn.classList.remove('btn-info', 'text-white');
                regularBtn.classList.add('btn-outline-info');

                superSection.classList.remove('d-none');
                regularSection.classList.add('d-none');
            }
        }

        // Default active tab
        document.addEventListener('DOMContentLoaded', () => {
            setActive('regular');
        });
    </script>

    <style>
        @media (min-width: 1200px) {
            .col-xl-custom {
                flex: 0 0 auto;
                width: 20%;
            }
        }

        .hover-effect {
            transition: all 0.3s ease-in-out;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .bg-light {
            background-color: #f9fafb !important;
        }
    </style>
@endsection
