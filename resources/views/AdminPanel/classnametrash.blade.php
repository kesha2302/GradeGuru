@extends('AdminPanel.Layouts.main')
@section('main-section')
<div class="container-fluid">
        <h3>Trashed ClassName Data</h3>
        <hr>

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="d-flex">

                    <a href="{{ url('/Admin/ClassNameData') }}">
                        <button class="btn btn-danger ml-2">
                            View ClassName Data</button>
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
                                    <td>{{$cn->title ?: '-'}}</td>
                                    <td style=" width: 25%; text-align: justify;">
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
                                        <a href="{{ route('classnames.forcedelete', ['id' => $cn->class_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>

                                        <a href="{{ route('classnames.restore', ['id' => $cn->class_id]) }}">
                                            <button class="btn btn-primary">Restore</button>
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
