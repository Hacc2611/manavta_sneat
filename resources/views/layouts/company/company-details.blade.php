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
            $('.edit-company').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var employeeSize = $(this).data('employee-size');
                var address = $(this).data('address');
                var gstin = $(this).data('gstin');
                var cin = $(this).data('cin');

                $('#editCompanyModal #id').val(id);
                $('#editCompanyModal #name').val(name);
                $('#editCompanyModal #employee_size').val(employeeSize);
                $('#editCompanyModal #address').val(address);
                $('#editCompanyModal #gstin').val(gstin);
                $('#editCompanyModal #cin').val(cin);

                $('#editCompanyModal').modal('show');
            });

            function deleteCompany(id, name) {
                if (confirm("Are you sure you want to delete " + name + "?")) {
                    var form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', '/company/' + id);
                    form.innerHTML = '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                        '<input type="hidden" name="_method" value="delete">';
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        });
    </script>
@endsection

@section('content')
    <style>
        .address-column {
            max-width: 200px;
            /* Adjust this value to your desired maximum width */
            white-space: normal;
            word-wrap: break-word;
        }
    </style>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Company Details</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompanyModal">
                Add Company
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Employee Size</th>
                        <th style="width: 200px;">Address</th>
                        <th>GSTIN</th>
                        <th>CIN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->employee_size }}</td>
                            <td class="address-column">{{ $company->address }}</td>
                            <td>{{ $company->gstin }}</td>
                            <td>{{ $company->cin }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a class="dropdown-item edit-company" href="javascript:void(0);"
                                        data-id="{{ $company->id }}" data-name="{{ $company->name }}"
                                        data-employee-size="{{ $company->employee_size }}"
                                        data-address="{{ $company->address }}" data-gstin="{{ $company->gstin }}"
                                        data-cin="{{ $company->cin }}" style="font-size: 1.2rem;">
                                        <i class="bx bx-edit-alt "></i>
                                    </a>
                                    <a class="dropdown-item delete-company"
                                        href="{{ route('company.destroy', ['company' => $company->id]) }}"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $company->name }}?')) { document.getElementById('delete-form-{{ $company->id }}').submit(); }"
                                        style="font-size: 1.2rem;">
                                        <i class="bx bx-trash "></i>
                                    </a>
                                    <form id="delete-form-{{ $company->id }}"
                                        action="{{ route('company.destroy', ['company' => $company->id]) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Company Modal -->
    <div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCompanyModalLabel">Add Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee_size" class="form-label">Employee Size</label>
                            <input type="number" class="form-control" id="employee_size" name="employee_size" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="gstin" class="form-label">GSTIN</label>
                            <input type="text" class="form-control" id="gstin" name="gstin" required>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" required>
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
    <!-- Edit Modal -->
    <div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCompanyModalLabel">Edit Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.update', ['company' => $company->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee_size" class="form-label">Employee Size</label>
                            <input type="number" class="form-control" id="employee_size" name="employee_size" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="gstin" class="form-label">GSTIN</label>
                            <input type="text" class="form-control" id="gstin" name="gstin" required>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" required>
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

@endsection
