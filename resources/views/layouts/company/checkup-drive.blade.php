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
    <script>
        $(document).ready(function() {
            $('.edit-checkup-drive').click(function() {
                var id = $(this).data('id');
                var company_id = $(this).data('company_id');
                var title = $(this).data('title');
                var date = $(this).data('date');

                $('#editCheckupDriveModal #edit_id').val(id);
                $('#editCheckupDriveModal #edit_company_id').val(company_id);
                $('#editCheckupDriveModal #edit_title').val(title);
                $('#editCheckupDriveModal #edit_date').val(date);

                $('#editCheckupDriveModal').modal('show');
            });

            $('#editCheckupDriveForm').submit(function(e) {
                e.preventDefault();
                var id = $('#edit_id').val();
                var action = $(this).attr('action').replace('0', id);
                $(this).attr('action', action).off('submit').submit();
            });
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Checkup Drive Details</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCheckupDriveModal">
                Add Checkup Drive
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($checkupDrives as $checkupDrive)
                        <tr>
                            <td>{{ $checkupDrive->id ?? 'N/A' }}</td>
                            <td>{{ $checkupDrive->company->name ?? 'N/A' }}</td>
                            <td>{{ $checkupDrive->title ?? 'N/A' }}</td>
                            <td>{{ is_object($checkupDrive) && $checkupDrive->date ? \Carbon\Carbon::parse($checkupDrive->date)->format('M Y') : 'N/A' }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit-checkup-drive" href="javascript:void(0);"
                                            data-id="{{ $checkupDrive->id ?? '' }}"
                                            data-company_id="{{ $checkupDrive->company_id ?? '' }}"
                                            data-title="{{ $checkupDrive->title ?? '' }}"
                                            data-date="{{ $checkupDrive->date ?? '' }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item delete-checkup-drive"
                                            href="{{ route('checkupDrive.destroy', ['checkupDrive' => $checkupDrive->id ?? 0]) }}"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $checkupDrive->company->name ?? '' }}?')) { document.getElementById('delete-form-{{ $checkupDrive->id ?? '' }}').submit(); }">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>

                                        <form id="delete-form-{{ $checkupDrive->id ?? '' }}"
                                            action="{{ route('checkupDrive.destroy', ['checkupDrive' => $checkupDrive->id ?? 0]) }}"
                                            method="POST" style="display: none;">
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

    <!-- Add Checkup Drive Modal -->
    <div class="modal fade" id="addCheckupDriveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Checkup Drive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCheckupDriveForm" action="{{ route('checkupDrive.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company Name</label>
                            <select class="form-select" id="company_id" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="month" class="form-control" id="date" name="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Checkup Drive Modal -->
    <div class="modal fade" id="editCheckupDriveModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Checkup Drive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCheckupDriveForm" action="{{ route('checkupDrive.update', 0) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label for="edit_company_id" class="form-label">Company Name</label>
                            <select class="form-select" id="edit_company_id" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="edit_date" class="form-label">Date</label>
                            <input type="month" class="form-control" id="edit_date" name="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
