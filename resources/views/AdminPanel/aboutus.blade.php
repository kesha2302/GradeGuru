@extends('AdminPanel.Layouts.main')

@section('main-section')

    <div class='mt-3 container'>
        <h3>AboutUs Details</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-5 mr-sm-2" type="search" value="{{ request()->search }}" name="search"
                        placeholder="Search by title" aria-label="Search">
                    <button class="btn btn-dark">Search</button>
                    <span style="margin-left: 10px;">
                        <a href="{{ route('admin.aboutus') }}">
                            <button class="btn btn-dark" type="button">Reset</button>
                        </a>
                    </span>
                </form>

                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ route('admin.about.add') }}'"
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
                                <th style="width: 5%;">Id</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 35%;">Description1</th>
                                <th style="width: 35%;">Description2</th>
                                <th colspan="2" style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aboutdetail as $ab)
                                <tr>
                                    <td>{{ $ab->about_id }}</td>
                                    <td>{{ $ab->title ?: '-' }}</td>

                                    {{-- Description 1 --}}
                                    <td style="width: 25%; text-align: justify;">
                                        @if (!empty($ab->description1))
                                            <div class="description-container">
                                                <span class="description-text"
                                                    data-truncated="{{ Str::limit($ab->description1, 100) }}">
                                                    {{ Str::limit($ab->description1, 100) }}
                                                </span>
                                                @if (strlen($ab->description1) > 100)
                                                    <button class="btn btn-link btn-sm more-btn"
                                                        data-description="{{ $ab->description1 }}">
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

                                    {{-- Description 2 --}}
                                    <td style="width: 25%; text-align: justify;">
                                        @if (!empty($ab->description2))
                                            <div class="description-container">
                                                <span class="description-text2"
                                                    data-truncated="{{ Str::limit($ab->description2, 100) }}">
                                                    {{ Str::limit($ab->description2, 100) }}
                                                </span>
                                                @if (strlen($ab->description2) > 100)
                                                    <button class="btn btn-link btn-sm more-btn2"
                                                        data-description="{{ $ab->description2 }}">
                                                        More
                                                    </button>
                                                    <button class="btn btn-link btn-sm less-btn2" style="display: none;">
                                                        Less
                                                    </button>
                                                @endif
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.aboutus.delete', ['id' => $ab->about_id]) }}">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a>
                                        <a href="{{ route('admin.aboutus.edit', ['id' => $ab->about_id]) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-dark fw-bold">No Aboutus found for "{{ request()->search }}"</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // For Description1
            $('.more-btn').on('click', function() {
                var fullDescription = $(this).data('description');
                var container = $(this).closest('td');
                container.find('.description-text').text(fullDescription);
                $(this).hide();
                container.find('.less-btn').show();
            });

            $('.less-btn').on('click', function() {
                var container = $(this).closest('td');
                var truncated = container.find('.description-text').data('truncated');
                container.find('.description-text').text(truncated);
                $(this).hide();
                container.find('.more-btn').show();
            });

            // For Description2
            $('.more-btn2').on('click', function() {
                var fullDescription = $(this).data('description');
                var container = $(this).closest('td');
                container.find('.description-text2').text(fullDescription);
                $(this).hide();
                container.find('.less-btn2').show();
            });

            $('.less-btn2').on('click', function() {
                var container = $(this).closest('td');
                var truncated = container.find('.description-text2').data('truncated');
                container.find('.description-text2').text(truncated);
                $(this).hide();
                container.find('.more-btn2').show();
            });
        });
    </script>

@endsection
