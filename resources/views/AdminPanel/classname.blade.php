@extends('AdminPanel.Layouts.main')
@section('main-section')
    <div class="container-fluid">
        <h3>ClassName Data</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" method="GET" action="{{ url('/Admin/ClassNameData') }}">

                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ $search }}" name="search"
                        placeholder="Search by standard" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ url('/Admin/ClassNameData') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>
                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ url('/Admin/Classnameform') }}'"
                        class="btn btn-dark btn-circle font-rights me-md-2">
                        </i> Add
                    </button>
                    <a href="{{ url('/Admin/ClassnameTrashdata') }}">
                        <button class="btn btn-danger ml-2">
                            Trashed Data</button>
                    </a>
                </div>
            </div>
        </nav>


        <div class="card mt-2" style="width:100%">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Standard</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_names as $cn)
                                <tr>
                                    <td>{{ $cn->standard ?: '-' }}</td>
                                    <td>{{ $cn->title ?: '-' }}</td>
                                    <td style="width: 25%; text-align: justify;">
                                        @if (!empty($cn->description))
                                            <div class="description-container">
                                                <span class="description-text"
                                                    data-truncated="{{ Str::limit($cn->description, 100) }}">
                                                    {{ Str::limit($cn->description, 100) }}
                                                </span>
                                                @if (strlen($cn->description) > 100)
                                                    <button class="btn btn-link btn-sm more-btn"
                                                        data-description="{{ $cn->description }}">
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

                                    <td>
                                        <a href="{{ route('classnames.delete', ['id' => $cn->class_id]) }}">
                                            <button class="btn btn-danger m-2">Trash</button>
                                        </a>

                                        <a href="{{ route('classnames.edit', ['id' => $cn->class_id]) }}">
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
                {{ $class_names->links('pagination::bootstrap-4') }}
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
