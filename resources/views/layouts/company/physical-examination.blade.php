@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/css/bootstrap.min.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.edit-pe').click(function() {
                var id = $(this).data('id');
                var worker_id = $(this).data('worker-id');
                var bags = $(this).data('bags');

                $('#editdetailsModal #id').val(id);
                $('#editdetailsModal #worker_id').val(worker_id);
                $('#editdetailsModal #bags').val(bags);
                $('#editdetailsModal').modal('show');
            });
        });
    </script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.edit-pe').click(function() {
                var id = $(this).data('id');
                var workerId = $(this).data('worker_id');
                var bags = $(this).data('bags');

                // Update modal form action dynamically
                $('#editdetailsModal form').attr('action', '{{ route('pe.update', ['pe' => ':id']) }}'
                    .replace(':id', id));

                // Set modal input values
                $('#editdetailsModal #worker_id').val(workerId);
                $('#editdetailsModal #bags').val(bags);

                $('#editdetailsModal').modal('show');
            });
        });
    </script>

@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Donor Details</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adddetailsModal">
                Add Details
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Bags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pes as $pe)
                        <tr>
                            <td>{{ $pe->id }}</td>
                            <td>{{ $pe->worker->name }}</td>
                            <td>{{ $pe->bags }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit-pe" href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item delete-pe"
                                            href="{{ route('pe.destroy', ['pe' => $pe->id]) }}"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-{{ $pe->id }}').submit(); }">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-form-{{ $pe->id }}"
                                            action="{{ route('pe.destroy', ['pe' => $pe->id]) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Details Modal -->
    <div class="modal fade" id="adddetailsModal" tabindex="-1" aria-labelledby="adddetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddetailsModalLabel">Add Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pe.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="worker_id" class="form-label">Select Worker</label>
                            <select name="worker_id" id="worker_id" class="form-select" style="width: 100%">
                                <option value="">Select a worker</option>
                                @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bags" class="form-label">Number of Bags</label>
                            <input type="number" class="form-control" id="bags" name="bags"
                                placeholder="Enter number of bags" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Details Modal -->
    <div class="modal fade" id="editdetailsModal" tabindex="-1" aria-labelledby="editdetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdetailsModalLabel">Add Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pe.update', ['pe' => $pe->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="worker_id" class="form-label">Select Worker</label>
                            <select name="worker_id" id="worker_id" class="form-select" style="width: 100%">
                                <option value="">Select a worker</option>
                                @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}"
                                        {{ $pe->worker_id == $worker->id ? 'selected' : '' }}>
                                        {{ $worker->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="bags" class="form-label">Number of Bags</label>
                            <input type="number" class="form-control" id="bags" name="bags"
                                placeholder="Enter number of bags" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
