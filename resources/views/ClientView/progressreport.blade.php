@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-4">
        <div class="card shadow-lg rounded-4 p-4 mt-3">
            <h3 class="mb-4 text-primary fw-bold">Progress Report</h3>

            <div class="mb-4 row">
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center bg-light">
                        <h5>Total Tests</h5>
                        <p class="display-6">{{ $totalTests }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center bg-success text-white">
                        <h5>Passed</h5>
                        <p class="display-6">{{ $totalPassed }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center bg-danger text-white">
                        <h5>Failed</h5>
                        <p class="display-6">{{ $totalFailed }}</p>
                    </div>
                </div>
            </div>

            <table class="table table-bordered mt-4 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Class</th>
                        <th>Test Name</th>
                        <th>Correct Answers</th>
                        <th>Result</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result->test->classPrice->classNames->standard }}</td>
                            <td>{{ $result->test->title }} ({{ $result->test->que_type }})</td>
                            <td>{{ $result->correct }}</td>
                            <td>
                                <p
                                    class="{{ $result->result === 'Pass' ? 'text-success' : 'text-danger' }} p-2 rounded text-center">
                                    {{ $result->result }}
                                </p>

                            </td>
                            <td>{{ $result->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No tests taken in the last 30 days.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
