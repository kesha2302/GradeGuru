@extends('AdminPanel.Layouts.main')
@section('main-section')
    <div class='mt-3 container'>
        <h3> Regular Question Data</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ request()->search }}" name="search"
                        placeholder="Search by question" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('Admin/RegularQuestions') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>

                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ route('admin.regularque.add') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">Add</button>
                </div>
            </div>
        </nav>


        <div class="card mt-2" style="width:100%;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Class Name</th>
                                <th style="width: 5%;">Test id</th>
                                <th style="width: 20%;">Question No</th>
                                <th style="width: 35%;">Question</th>
                                <th style="width: 35%;">Option1</th>
                                <th style="width: 35%;">Option2</th>
                                <th style="width: 35%;">Option3</th>
                                <th style="width: 35%;">Option4</th>
                                <th style="width: 35%;">Answer</th>
                                <th colspan="2" style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($regularque as $xy)
                                <tr>
                                    <td>{{ $xy->classPrice->title }}-(₹{{ $xy->classPrice->price }})</td>
                                    <td>{{ $xy->tests->title ?: '-' }}</td>
                                    <td>{{ $xy->question_no ?: '-' }}</td>
                                    <td style="width: 25%; text-align: justify;">
                                        @if (!empty($xy->question))
                                            <div class="description-container">
                                                <span class="description-text"
                                                    data-truncated="{{ Str::limit($xy->question, 100) }}">
                                                    {{ Str::limit($xy->question, 100) }}
                                                </span>
                                                @if (strlen($xy->question) > 100)
                                                    <button class="btn btn-link btn-sm more-btn"
                                                        data-description="{{ $xy->question }}">
                                                        More
                                                    </button>
                                                    <button class="btn btn-link btn-sm less-btn" style="display: none;">
                                                        Less
                                                    </button>
                                                @endif
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $xy->option1 ?: '-' }}</td>
                                    <td>{{ $xy->option2 ?: '-' }}</td>
                                    <td>{{ $xy->option3 ?: '-' }}</td>
                                    <td>{{ $xy->option4 ?: '-' }}</td>
                                    <td>{{ $xy->answer ?: '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.regularque.delete', ['id' => $xy->rq_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>
                                        <a href="{{ route('admin.regularque.edit', ['id' => $xy->rq_id]) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-dark fw-bold">No Regular Question found for
                                            "{{ request()->search }}"</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $regularque->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.more-btn').on('click', function() {
                var fullDescription = $(this).data('description');
                var descriptionContainer = $(this).closest('td').find('.description-text');
                descriptionContainer.text(fullDescription);
                $(this).hide();
                $(this).siblings('.less-btn').show();
            });

            $('.less-btn').on('click', function() {
                var truncated = $(this).closest('td').find('.description-text').data('truncated');
                $(this).closest('td').find('.description-text').text(truncated);
                $(this).hide();
                $(this).siblings('.more-btn').show();
            });
        });
    </script>

@endsection
