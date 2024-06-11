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
            $('.edit-worker').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var address = $(this).data('addresse');

                $('#editWorkerModal #id').val(id);
                $('#editWorkerModal #name').val(name);
                $('#editWorkerModal #address').val(address);

                $('#editWorkerModal').modal('show');
            });
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Worker Details</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWorkerModal">
                Add Worker
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Company</th>
                        <th>Emoployee ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($workers as $worker)
                        <tr>
                            <td>{{ $worker->id }}</td>
                            <td>{{ $worker->name }}</td>
                            <td>{{ $worker->gender }}</td>
                            <td>{{ $worker->company->name }}</td>
                            <td>{{ $worker->employee_id }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" data-id="{{ $worker->id }}"
                                        data-name="{{ $worker->name }}" data-father="{{ $worker->father }}"
                                        data-address="{{ $worker->address }}">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit-worker" href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item delete-worker"
                                            href="{{ route('worker.destroy', ['worker' => $worker->id]) }}"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $worker->name }}?')) { document.getElementById('delete-form-{{ $worker->id }}').submit(); }">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-form-{{ $worker->id }}"
                                            action="{{ route('worker.destroy', ['worker' => $worker->id]) }}"
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
    {{-- ADD MODAL --}}
    <div class="modal fade" id="addWorkerModal" tabindex="-1" aria-labelledby="addWorkerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWorkerModalLabel">Add Worker Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('worker.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company Name</label>
                            <select class="form-select" id="company_id" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="father" class="form-label">Father's Name </label>
                            <input type="text" class="form-control" id="father" name="father">
                        </div>
                        <div class="mb-3">
                            <label for="addresse" class="form-label">Address</label>
                            <input type="text" class="form-control" id="addresse" name="addresse">
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="mb-3">
                            <label for="identification_mark" class="form-label">Identification Mark</label>
                            <input type="text" class="form-control" id="identification_mark" name="identification_mark">
                        </div>
                        <div class="mb-3">
                            <label for="work_at_hazardous_process" class="form-label">Work at Hazadous Process</label>
                            <input type="text" class="form-control" id="work_at_hazardous_process"
                                name="work_at_hazardous_process">
                        </div>
                        <div class="mb-3">
                            <label for="work_at_dangerous_operation" class="form-label">Work at Dangerous
                                Operation</label>
                            <input type="text" class="form-control" id="work_at_dangerous_operation"
                                name="work_at_dangerous_operation">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age (Years)</label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="other">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="other">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select" id="blood_group" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="last_donate_date" class="form-label">Examination Date</label>
                            <input type="date" class="form-control" id="last_donate_date" name="last_donate_date">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cms)</label>
                            <input type="text" class="form-control" id="height" name="height">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kgs)</label>
                            <input type="text" class="form-control" id="weight" name="weight">
                        </div>
                        <div class="mb-3">
                            <label for="blood_pressure" class="form-label">Blood Pressure (mm of Hg)</label>
                            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                        </div>
                        <div class="mb-3">
                            <label for="bmi" class="form-label">BMI</label>
                            <input type="text" class="form-control" id="bmi" name="bmi">
                        </div>
                        <div class="mb-3">
                            <label for="pulse" class="form-label">Pulse (/mins)</label>
                            <input type="text" class="form-control" id="pulse" name="pulse">
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">Present Complaints</label>
                            <input type="text" class="form-control" id="cin" name="cin">
                        </div>
                        <div class="mb-3">
                            <label for="present_complaints" class="form-label">Present Complaints</label>
                            <input type="text" class="form-control" id="present_complaints"
                                name="present_complaints">
                        </div>
                        <div class="mb-3">
                            <label for="treatment_history" class="form-label">Treatment History Details</label>
                            <input type="text" class="form-control" id="treatment_history" name="treatment_history">
                        </div>
                        <div class="mb-3">
                            <label for="past_history" class="form-label">Past Surgery Details</label>
                            <input type="text" class="form-control" id="past_history" name="past_history">
                        </div>
                        <div class="mb-3">
                            <label for="family_history" class="form-label">Family History</label>
                            <input type="text" class="form-control" id="family_history" name="family_history">
                        </div>
                        <div class="mb-3">
                            <label for="occupational_risk" class="form-label">Occupational Risk</label>
                            <input type="text" class="form-control" id="occupational_risk" name="occupational_risk">
                        </div>
                        <div class="mb-3">
                            <label for="allergy" class="form-label">Allergies Skin/ Risks</label>
                            <input type="text" class="form-control" id="allergy" name="allergy">
                        </div>
                        <div class="mb-3">
                            <label for="cardio" class="form-label">Cardiovascular System</label>
                            <input type="text" class="form-control" id="cardio" name="cardio">
                        </div>
                        <div class="mb-3">
                            <label for="resp" class="form-label">Respiratory System</label>
                            <input type="text" class="form-control" id="resp" name="resp">
                        </div>
                        <div class="mb-3">
                            <label for="enr" class="form-label">Ear, Nose, Roat</label>
                            <input type="text" class="form-control" id="enr" name="enr">
                        </div>
                        <div class="mb-3">
                            <label for="dental" class="form-label">Dental Exam</label>
                            <input type="text" class="form-control" id="dental" name="dental">
                        </div>
                        <div class="mb-3">
                            <label for="eye" class="form-label">Color Vision</label>
                            <input type="text" class="form-control" id="eye" name="eye">
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <input type="text" class="form-control" id="remarks" name="remarks">
                        </div>
                        <div class="mb-3">
                            <label for="fit_unfit" class="form-label">Fit/Unfit</label>
                            <input type="text" class="form-control" id="fit_unfit" name="fit_unfit">
                        </div>
                        <div class="mb-3">
                            <label for="reason_unfit" class="form-label">Reason for Unfit</label>
                            <input type="text" class="form-control" id="reason_unfit" name="reason_unfit">
                        </div>
                        <div class="mb-3">
                            <label for="upload_pdf" class="form-label">Upload Pdf</label>
                            <input type="file" class="form-control" id="upload_pdf" name="upload_pdf">
                        </div>
                        <div class="mb-3">
                            <label for="worker_signature" class="form-label">Upload Signature</label>
                            <input type="file" class="form-control" id="worker_signature" name="worker_signature">
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

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editWorkerModal" tabindex="-1" aria-labelledby="editWorkerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWorkerModalLabel">Edit Worker Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('worker.update', ['worker' => $worker->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company Name</label>
                            <select class="form-select" id="company_id" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="father" class="form-label">Father's Name </label>
                            <input type="text" class="form-control" id="father" name="father">
                        </div>
                        <div class="mb-3">
                            <label for="addresse" class="form-label">Address</label>
                            <input type="text" class="form-control" id="addresse" name="addresse">
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="mb-3">
                            <label for="identification_mark" class="form-label">Identification Mark</label>
                            <input type="text" class="form-control" id="identification_mark"
                                name="identification_mark">
                        </div>
                        <div class="mb-3">
                            <label for="work_at_hazardous_process" class="form-label">Work at Hazadous Process</label>
                            <input type="text" class="form-control" id="work_at_hazardous_process"
                                name="work_at_hazardous_process">
                        </div>
                        <div class="mb-3">
                            <label for="work_at_dangerous_operation" class="form-label">Work at Dangerous
                                Operation</label>
                            <input type="text" class="form-control" id="work_at_dangerous_operation"
                                name="work_at_dangerous_operation">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age (Years)</label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="other">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="other">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select" id="blood_group" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="last_donate_date" class="form-label">Examination Date</label>
                            <input type="date" class="form-control" id="last_donate_date" name="last_donate_date">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cms)</label>
                            <input type="text" class="form-control" id="height" name="height">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kgs)</label>
                            <input type="text" class="form-control" id="weight" name="weight">
                        </div>
                        <div class="mb-3">
                            <label for="blood_pressure" class="form-label">Blood Pressure (mm of Hg)</label>
                            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                        </div>
                        <div class="mb-3">
                            <label for="bmi" class="form-label">BMI</label>
                            <input type="text" class="form-control" id="bmi" name="bmi">
                        </div>
                        <div class="mb-3">
                            <label for="pulse" class="form-label">Pulse (/mins)</label>
                            <input type="text" class="form-control" id="pulse" name="pulse">
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">Present Complaints</label>
                            <input type="text" class="form-control" id="cin" name="cin">
                        </div>
                        <div class="mb-3">
                            <label for="present_complaints" class="form-label">Present Complaints</label>
                            <input type="text" class="form-control" id="present_complaints"
                                name="present_complaints">
                        </div>
                        <div class="mb-3">
                            <label for="treatment_history" class="form-label">Treatment History Details</label>
                            <input type="text" class="form-control" id="treatment_history" name="treatment_history">
                        </div>
                        <div class="mb-3">
                            <label for="past_history" class="form-label">Past Surgery Details</label>
                            <input type="text" class="form-control" id="past_history" name="past_history">
                        </div>
                        <div class="mb-3">
                            <label for="family_history" class="form-label">Family History</label>
                            <input type="text" class="form-control" id="family_history" name="family_history">
                        </div>
                        <div class="mb-3">
                            <label for="occupational_risk" class="form-label">Occupational Risk</label>
                            <input type="text" class="form-control" id="occupational_risk" name="occupational_risk">
                        </div>
                        <div class="mb-3">
                            <label for="allergy" class="form-label">Allergies Skin/ Risks</label>
                            <input type="text" class="form-control" id="allergy" name="allergy">
                        </div>
                        <div class="mb-3">
                            <label for="cardio" class="form-label">Cardiovascular System</label>
                            <input type="text" class="form-control" id="cardio" name="cardio">
                        </div>
                        <div class="mb-3">
                            <label for="resp" class="form-label">Respiratory System</label>
                            <input type="text" class="form-control" id="resp" name="resp">
                        </div>
                        <div class="mb-3">
                            <label for="enr" class="form-label">Ear, Nose, Roat</label>
                            <input type="text" class="form-control" id="enr" name="enr">
                        </div>
                        <div class="mb-3">
                            <label for="dental" class="form-label">Dental Exam</label>
                            <input type="text" class="form-control" id="dental" name="dental">
                        </div>
                        <div class="mb-3">
                            <label for="eye" class="form-label">Color Vision</label>
                            <input type="text" class="form-control" id="eye" name="eye">
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <input type="text" class="form-control" id="remarks" name="remarks">
                        </div>
                        <div class="mb-3">
                            <label for="fit_unfit" class="form-label">Fit/Unfit</label>
                            <input type="text" class="form-control" id="fit_unfit" name="fit_unfit">
                        </div>
                        <div class="mb-3">
                            <label for="reason_unfit" class="form-label">Reason for Unfit</label>
                            <input type="text" class="form-control" id="reason_unfit" name="reason_unfit">
                        </div>
                        <div class="mb-3">
                            <label for="upload_pdf" class="form-label">Upload Pdf</label>
                            <input type="file" class="form-control" id="upload_pdf" name="upload_pdf">
                        </div>
                        <div class="mb-3">
                            <label for="worker_signature" class="form-label">Upload Signature</label>
                            <input type="file" class="form-control" id="worker_signature" name="worker_signature">
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
