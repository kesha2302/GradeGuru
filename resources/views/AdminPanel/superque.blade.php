@extends('AdminPanel.Layouts.main')
@section('main-section')
    <div class="container-fluid">
        <h3>SuperQuestions Data</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" method="GET" action="{{ url('/Admin/SuperQuestions') }}">

                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ $search }}" name="search"
                        placeholder="Search by question" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/SuperQuestions') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>
                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ url('/Admin/SuperQueform') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">
                        </i> Add
                    </button>
                </div>
            </div>
        </nav>


        <div class="card mt-2" style="width:100%">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ClassName</th>
                                <th>Test</th>
                                <th>Question No</th>
                                <th>Question</th>
                                <th>Option1</th>
                                <th>Option2</th>
                                <th>Option3</th>
                                <th>Option4</th>
                                <th>Answer</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($superque as $sq)
                                <tr>
                                    <td>{{ $sq->classPrice->title }}-(₹{{ $sq->classPrice->price }})</td>
                                    <td>{{ $sq->tests->title }}</td>
                                    <td>{{ $sq->question_no ?: '-' }}</td>
                                    <td style="width: 25%; text-align: justify;">
                                        @if (!empty($sq->question))
                                            <div class="description-container">
                                                <span class="description-text"
                                                    data-truncated="{{ Str::limit($sq->question, 100) }}">
                                                    {{ Str::limit($sq->question, 100) }}
                                                </span>
                                                @if (strlen($sq->question) > 100)
                                                    <button class="btn btn-link btn-sm more-btn"
                                                        data-description="{{ $sq->question }}">
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
                                    <td>{{ $sq->option1 ?: '-' }}</td>
                                    <td>{{ $sq->option2 ?: '-' }}</td>
                                    <td>{{ $sq->option3 ?: '-' }}</td>
                                    <td>{{ $sq->option4 ?: '-' }}</td>
                                    <td>{{ $sq->answer ?: '-' }}</td>
                                    <td>
                                        <a href="{{ route('superque.delete', ['id' => $sq->sq_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>

                                        <a href="{{ route('superque.edit', ['id' => $sq->sq_id]) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $superque->links('pagination::bootstrap-4') }}
            </div>
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
