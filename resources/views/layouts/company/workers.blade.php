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
                var company_id = $(this).data('company_id');
                var name = $(this).data('name');
                var father = $(this).data('father');
                var addresse = $(this).data('address');
                var designation = $(this).data('designation');
                var identification_mark = $(this).data('identification_mark');
                var work_at_hazardous_process = $(this).data('work_at_hazardous_process');
                var work_at_dangerous_operation = $(this).data('work_at_dangerous_operation');
                var mobile_no = $(this).data('mobile_no');
                var dob = $(this).data('dob');
                var age = $(this).data('age');
                var employee_id = $(this).data('employee_id');
                var gender = $(this).data('gender');
                var blood_group = $(this).data('blood_group');
                var last_donate_date = $(this).data('last_donate_date');
                var height = $(this).data('height');
                var weight = $(this).data('weight');
                var blood_pressure = $(this).data('blood_pressure');
                var bmi = $(this).data('bmi');
                var pulse = $(this).data('pulse');
                var present_complaints = $(this).data('present_complaints');
                var treatment_history = $(this).data('treatment_history');
                var past_history = $(this).data('past_history');
                var family_history = $(this).data('family_history');
                var occupational_risk = $(this).data('occupational_risk');
                var allergy = $(this).data('allergy');
                var cardio = $(this).data('cardio');
                var resp = $(this).data('resp');
                var enr = $(this).data('enr');
                var dental = $(this).data('dental');
                var eye = $(this).data('eye');
                var remarks = $(this).data('remarks');
                var fit_unfit = $(this).data('fit_unfit');
                var reason_unfit = $(this).data('reason_unfit');
                var company_id = $(this).data('company_id');

                $('#editWorkerModal #id').val(id);
                $('#editWorkerModal #name').val(name);
                $('#editWorkerModal #company_id').val(company_id);
                $('#editWorkerModal #father').val(father);
                $('#editWorkerModal #addresse').val(addresse);
                $('#editWorkerModal #designation').val(designation);
                $('#editWorkerModal #identification_mark').val(identification_mark);
                $('#editWorkerModal #work_at_hazardous_process').val(work_at_hazardous_process);
                $('#editWorkerModal #work_at_dangerous_operation').val(work_at_dangerous_operation);
                $('#editWorkerModal #mobile_no').val(mobile_no);
                $('#editWorkerModal #dob').val(dob);
                $('#editWorkerModal #age').val(age);
                $('#editWorkerModal #employee_id').val(employee_id);
                $('#editWorkerModal input[name="gender"][value="' + gender + '"]').prop('checked', true);
                $('#editWorkerModal #blood_group').val(blood_group);
                $('#editWorkerModal #last_donate_date').val(last_donate_date);
                $('#editWorkerModal #height').val(height);
                $('#editWorkerModal #weight').val(weight);
                $('#editWorkerModal #blood_pressure').val(blood_pressure);
                $('#editWorkerModal #bmi').val(bmi);
                $('#editWorkerModal #pulse').val(pulse);
                $('#editWorkerModal #cin').val(cin);
                $('#editWorkerModal #present_complaints').val(present_complaints);
                $('#editWorkerModal #treatment_history').val(treatment_history);
                $('#editWorkerModal #past_history').val(past_history);
                $('#editWorkerModal #family_history').val(family_history);
                $('#editWorkerModal #occupational_risk').val(occupational_risk);
                $('#editWorkerModal #allergy').val(allergy);
                $('#editWorkerModal #cardio').val(cardio);
                $('#editWorkerModal #resp').val(resp);
                $('#editWorkerModal #enr').val(enr);
                $('#editWorkerModal #dental').val(dental);
                $('#editWorkerModal #eye').val(eye);
                $('#editWorkerModal #remarks').val(remarks);
                $('#editWorkerModal #fit_unfit').val(fit_unfit);
                $('#editWorkerModal #reason_unfit').val(reason_unfit);
                $('#editWorkerModal #company_id').val(company_id);

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
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit-worker" href="javascript:void(0);"
                                            data-id="{{ $worker->id }}" data-company-id="{{ $worker->company_id }}"
                                            data-name="{{ $worker->name }}" data-father="{{ $worker->father }}"
                                            data-address="{{ $worker->address }}"
                                            data-designation="{{ $worker->designation }}"
                                            data-identification-mark="{{ $worker->identification_mark }}"
                                            data-work-at-hazardous-process="{{ $worker->work_at_hazardous_process }}"
                                            data-work-at-dangerous-operation="{{ $worker->work_at_dangerous_operation }}"
                                            data-mobile-no="{{ $worker->mobile_no }}" data-dob="{{ $worker->dob }}"
                                            data-age="{{ $worker->age }}" data-employee-id="{{ $worker->employee_id }}"
                                            data-gender="{{ $worker->gender }}"
                                            data-blood-group="{{ $worker->blood_group }}"
                                            data-last-donate-date="{{ $worker->last_donate_date }}"
                                            data-height="{{ $worker->height }}" data-weight="{{ $worker->weight }}"
                                            data-blood-pressure="{{ $worker->blood_pressure }}"
                                            data-bmi="{{ $worker->bmi }}" data-pulse="{{ $worker->pulse }}"
                                            data-present-complaints="{{ $worker->present_complaints }}"
                                            data-treatment-history="{{ $worker->treatment_history }}"
                                            data-past-history="{{ $worker->past_history }}"
                                            data-family-history="{{ $worker->family_history }}"
                                            data-occupational-risk="{{ $worker->occupational_risk }}"
                                            data-allergy="{{ $worker->allergy }}" data-cardio="{{ $worker->cardio }}"
                                            data-resp="{{ $worker->resp }}" data-enr="{{ $worker->enr }}"
                                            data-dental="{{ $worker->dental }}" data-eye="{{ $worker->eye }}"
                                            data-remarks="{{ $worker->remarks }}"
                                            data-fit-unfit="{{ $worker->fit_unfit }}"
                                            data-reason-unfit="{{ $worker->reason_unfit }}"
                                            data-company-id="{{ $worker->company_id }}">
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
                    @method('PUT')
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
