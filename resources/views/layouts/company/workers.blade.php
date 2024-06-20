@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"> --}}
    <style>
        .no-text-decoration {
            text-decoration: none;
            color: inherit;
        }

        .no-text-decoration:hover {
            text-decoration: none;
            color: inherit;
        }

        .sortable-icon {
            font-size: 0.75em;
            margin-left: 5px;
        }

        .dataTables_length,
        .dataTables_filter {
            margin-bottom: 20px;
        }

        .dataTables_info {
            margin: 20px 20px 0 20px;
        }

        .dataTables_paginate ul {
            margin: 15px;
            margin-left: 7rem;
        }

        .dataTables_length label {
            padding-left: 20px;
            padding-top: 10px;
            display: flex;
        }

        .custom-select {
            width: 3rem;
            margin: 0 10px;
        }

        .dataTables_filter label {
            padding-top: 10px;
            margin-left: 10rem;
            display: flex;
            align-items: center;
        }

        .dataTables_filter input {
            margin-left: 5px;
            width: 12rem;
        }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('.edit-worker').click(function() {
                var id = $(this).data('id');
                var company_id = $(this).data('company_id');
                var name = $(this).data('name');
                var father = $(this).data('father');
                var addresse = $(this).data('addresse');
                var designation = $(this).data('designation');
                var mark = $(this).data('mark');
                var haza = $(this).data('haza');
                var dange = $(this).data('dange');
                var mobile_no = $(this).data('mobile_no');
                var dob = $(this).data('dob');
                var age = $(this).data('age');
                var employee_id = $(this).data('employee_id');
                var gender = $(this).data('gender');
                var blood_group = $(this).data('blood_group');
                var last_donate_date = $(this).data('last_donate_date');
                var height = $(this).data('height');
                var weight = $(this).data('weight');
                var bp = $(this).data('bp');
                var bmi = $(this).data('bmi');
                var pulse = $(this).data('pulse');
                var present_complaints = $(this).data('present_complaints');
                var treat_history = $(this).data('treat_history');
                var past_history = $(this).data('past_history');
                var family_history = $(this).data('family_history');
                var occu_risk = $(this).data('occu_risk');
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

                var upload_pdf = $(this).data('upload_pdf');
                var upload_pdf_1 = $(this).data('upload_pdf_1');
                var upload_pdf_2 = $(this).data('upload_pdf_2');
                var upload_pdf_3 = $(this).data('upload_pdf_3');
                var upload_pdf_4 = $(this).data('upload_pdf_4');


                $('#editWorkerModal #id').val(id);
                $('#editWorkerModal #name').val(name);
                $('#editWorkerModal #company_id').val(company_id);
                $('#editWorkerModal #father').val(father);
                $('#editWorkerModal #addresse').val(addresse);
                $('#editWorkerModal #designation').val(designation);
                $('#editWorkerModal #mark').val(mark);
                $('#editWorkerModal #haza').val(haza);
                $('#editWorkerModal #dange').val(dange);
                $('#editWorkerModal #mobile_no').val(mobile_no);
                $('#editWorkerModal #dob').val(dob);
                $('#editWorkerModal #age').val(age);
                $('#editWorkerModal #employee_id').val(employee_id);
                $('#editWorkerModal input[name="gender"][value="' + gender + '"]').prop('checked', true);
                $('#editWorkerModal #blood_group').val(blood_group);
                $('#editWorkerModal #last_donate_date').val(last_donate_date);
                $('#editWorkerModal #height').val(height);
                $('#editWorkerModal #weight').val(weight);
                $('#editWorkerModal #bp').val(bp);
                $('#editWorkerModal #bmi').val(bmi);
                $('#editWorkerModal #pulse').val(pulse);
                $('#editWorkerModal #cin').val(cin);
                $('#editWorkerModal #present_complaints').val(present_complaints);
                $('#editWorkerModal #treat_history').val(treat_history);
                $('#editWorkerModal #past_history').val(past_history);
                $('#editWorkerModal #family_history').val(family_history);
                $('#editWorkerModal #occu_risk').val(occu_risk);
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

                // Show and populate the PDF upload fields
                if (upload_pdf) {
                    $('#editWorkerModal_upload_pdf_div').show();
                    $('#editWorkerModal_upload_pdf_div label').text('Uploaded PDF : ' + upload_pdf);
                } else {
                    $('#editWorkerModal_upload_pdf_div').hide();
                }

                if (upload_pdf_1) {
                    $('#editWorkerModal_upload_pdf_1_div').show();
                    $('#editWorkerModal_upload_pdf_1_div label').text('Uploaded PDF 1 : ' + upload_pdf_1);
                } else {
                    $('#editWorkerModal_upload_pdf_1_div').hide();
                }

                if (upload_pdf_2) {
                    $('#editWorkerModal_upload_pdf_2_div').show();
                    $('#editWorkerModal_upload_pdf_2_div label').text('Uploaded PDF 2 : ' + upload_pdf_2);
                } else {
                    $('#editWorkerModal_upload_pdf_2_div').hide();
                }

                if (upload_pdf_3) {
                    $('#editWorkerModal_upload_pdf_3_div').show();
                    $('#editWorkerModal_upload_pdf_3_div label').text('Uploaded PDF 3 : ' + upload_pdf_3);
                } else {
                    $('#editWorkerModal_upload_pdf_3_div').hide();
                }

                if (upload_pdf_4) {
                    $('#editWorkerModal_upload_pdf_4_div').show();
                    $('#editWorkerModal_upload_pdf_4_div label').text('Uploaded PDF 4 : ' + upload_pdf_4);
                } else {
                    $('#editWorkerModal_upload_pdf_4_div').hide();
                }

                $('#editWorkerModal').modal('show');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addMorePdfButtons = document.querySelectorAll('.add_more_pdf');

            addMorePdfButtons.forEach(button => {
                let currentPdfIndex = 1;
                button.addEventListener('click', function() {
                    const modalId = button.closest('.modal').id;
                    if (currentPdfIndex <= 4) {
                        document.getElementById(`${modalId}_upload_pdf_${currentPdfIndex}_div`)
                            .style.display = 'block';
                        currentPdfIndex++;
                        if (currentPdfIndex > 4) {
                            button.style.display =
                                'none'; // Hide the button when all fields are shown
                        }
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ], // Items per page options
                "columnDefs": [{
                        "orderable": false,
                        "targets": 5
                    } // Disable sorting on the Actions column
                ]
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
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('layouts-workers', ['sort_by' => 'id', 'sort_order' => $sort_by === 'id' && $sort_order === 'asc' ? 'desc' : 'asc']) }}"
                                class="no-text-decoration">
                                Id
                                @if ($sort_by === 'id')
                                    @if ($sort_order === 'asc')
                                        <i class="fas fa-sort-up sortable-icon"></i>
                                    @else
                                        <i class="fas fa-sort-down sortable-icon"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort sortable-icon"></i>
                                @endif
                            </a>
                        </th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Company</th>
                        <th>
                            <a href="{{ route('layouts-workers', ['sort_by' => 'employee_id', 'sort_order' => $sort_by === 'employee_id' && $sort_order === 'asc' ? 'desc' : 'asc']) }}"
                                class="no-text-decoration">
                                Employee ID
                                @if ($sort_by === 'employee_id')
                                    @if ($sort_order === 'asc')
                                        <i class="fas fa-sort-up sortable-icon"></i>
                                    @else
                                        <i class="fas fa-sort-down sortable-icon"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort sortable-icon"></i>
                                @endif
                            </a>
                        </th>
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
                            <td style="display: flex; gap: 10px;">
                                <a class="dropdown-item edit-worker" href="javascript:void(0);"
                                    data-id="{{ $worker->id }}" data-company_id="{{ $worker->company_id }}"
                                    data-name="{{ $worker->name }}" data-father="{{ $worker->father }}"
                                    data-addresse="{{ $worker->addresse }}" data-designation="{{ $worker->designation }}"
                                    data-mark="{{ $worker->mark }}" data-haza="{{ $worker->haza }}"
                                    data-dange="{{ $worker->dange }}" data-mobile_no="{{ $worker->mobile_no }}"
                                    data-dob="{{ $worker->dob }}" data-age="{{ $worker->age }}"
                                    data-employee_id="{{ $worker->employee_id }}" data-gender="{{ $worker->gender }}"
                                    data-blood_group="{{ $worker->blood_group }}"
                                    data-last_donate_date="{{ $worker->last_donate_date }}"
                                    data-height="{{ $worker->height }}" data-weight="{{ $worker->weight }}"
                                    data-bp="{{ $worker->bp }}" data-bmi="{{ $worker->bmi }}"
                                    data-pulse="{{ $worker->pulse }}"
                                    data-present_complaints="{{ $worker->present_complaints }}"
                                    data-treat_history="{{ $worker->treat_history }}"
                                    data-past_history="{{ $worker->past_history }}"
                                    data-family_history="{{ $worker->family_history }}"
                                    data-occu_risk="{{ $worker->occu_risk }}" data-allergy="{{ $worker->allergy }}"
                                    data-cardio="{{ $worker->cardio }}" data-resp="{{ $worker->resp }}"
                                    data-enr="{{ $worker->enr }}" data-dental="{{ $worker->dental }}"
                                    data-eye="{{ $worker->eye }}" data-remarks="{{ $worker->remarks }}"
                                    data-fit_unfit="{{ $worker->fit_unfit }}"
                                    data-reason_unfit="{{ $worker->reason_unfit }}"
                                    data-company_id="{{ $worker->company_id }}"
                                    data-upload_pdf="{{ $worker->upload_pdf }}"
                                    data-upload_pdf_1="{{ $worker->upload_pdf_1 }}"
                                    data-upload_pdf_2="{{ $worker->upload_pdf_2 }}"
                                    data-upload_pdf_3="{{ $worker->upload_pdf_3 }}"
                                    data-upload_pdf_4="{{ $worker->upload_pdf_4 }}" style="font-size: 1.2rem;">
                                    <i class="bx bx-edit-alt"></i>
                                </a>

                                <a class="dropdown-item delete-worker"
                                    href="{{ route('worker.destroy', ['worker' => $worker->id]) }}"
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $worker->name }}?')) { document.getElementById('delete-form-{{ $worker->id }}').submit(); }"
                                    style="font-size: 1.2rem;">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <form id="delete-form-{{ $worker->id }}"
                                    action="{{ route('worker.destroy', ['worker' => $worker->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="dropdown-item"
                                    href="{{ route('workers.generate_pdf', ['worker' => $worker->id]) }}"
                                    style="font-size: 1.2rem;">
                                    <i class="bx bx-file"></i>
                                </a>
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
                            <label for="company_id" class="form-label">Company Name <span
                                    style="color: red;">*</span></label>
                            <select class="form-select" id="company_id" name="company_id" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">This field is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="father" class="form-label">Father's Name </label>
                            <input type="text" class="form-control" id="father" name="father">
                        </div>
                        <div class="mb-3">
                            <label for="addresse" class="form-label">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="addresse" name="addresse">
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="mb-3">
                            <label for="mark" class="form-label">Identification Mark</label>
                            <input type="text" class="form-control" id="mark" name="mark">
                        </div>
                        <div class="mb-3">
                            <label for="haza" class="form-label">Work at Hazadous Process</label>
                            <input type="text" class="form-control" id="haza" name="haza">
                        </div>
                        <div class="mb-3">
                            <label for="dange" class="form-label">Work at Dangerous
                                Operation</label>
                            <input type="text" class="form-control" id="dange" name="dange">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label">Mobile Number <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth <span
                                    style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age (Years) <spa style="color: red;">
                                    *</span></label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
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
                            <label for="blood_group" class="form-label">Blood Group <span
                                    style="color: red;">*</span></label>
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
                            <label for="bp" class="form-label">Blood Pressure (mm of Hg)</label>
                            <input type="text" class="form-control" id="bp" name="bp">
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
                            <label for="treat_history" class="form-label">Treatment History Details</label>
                            <input type="text" class="form-control" id="treat_history" name="treat_history">
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
                            <label for="occu_risk" class="form-label">Occupational Risk</label>
                            <input type="text" class="form-control" id="occu_risk" name="occu_risk">
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

                        <!-- Additional PDF upload fields, initially hidden -->
                        <div class="mb-3" id="upload_pdf_1_div" style="display: none;">
                            <label for="upload_pdf_1" class="form-label">Upload Pdf 1</label>
                            <input type="file" class="form-control" id="upload_pdf_1" name="upload_pdf_1">
                        </div>
                        <div class="mb-3" id="upload_pdf_2_div" style="display: none;">
                            <label for="upload_pdf_2" class="form-label">Upload Pdf 2</label>
                            <input type="file" class="form-control" id="upload_pdf_2" name="upload_pdf_2">
                        </div>
                        <div class="mb-3" id="upload_pdf_3_div" style="display: none;">
                            <label for="upload_pdf_3" class="form-label">Upload Pdf 3</label>
                            <input type="file" class="form-control" id="upload_pdf_3" name="upload_pdf_3">
                        </div>
                        <div class="mb-3" id="upload_pdf_4_div" style="display: none;">
                            <label for="upload_pdf_4" class="form-label">Upload Pdf 4</label>
                            <input type="file" class="form-control" id="upload_pdf_4" name="upload_pdf_4">
                        </div>

                        <!-- Button to add more PDFs -->
                        <button type="button" id="add_more_pdf" class="btn btn-primary btn-sm"
                            style="margin-bottom: 10px">Add More PDF</button>

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
                            <label for="company_id" class="form-label">Company Name <span style="color: red;">*</span>
                            </label>
                            <select class="form-select" id="company_id" name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span style="color: red;">*</span> </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="father" class="form-label">Father's Name </label>
                            <input type="text" class="form-control" id="father" name="father">
                        </div>
                        <div class="mb-3">
                            <label for="addresse" class="form-label">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="addresse" name="addresse">
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="mb-3">
                            <label for="mark" class="form-label">Identification Mark</label>
                            <input type="text" class="form-control" id="mark" name="mark">
                        </div>
                        <div class="mb-3">
                            <label for="haza" class="form-label">Work at Hazadous Process</label>
                            <input type="text" class="form-control" id="haza" name="haza">
                        </div>
                        <div class="mb-3">
                            <label for="dange" class="form-label">Work at Dangerous
                                Operation</label>
                            <input type="text" class="form-control" id="dange" name="dange">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label">Mobile Number
                                <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth
                                <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age (Years) <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID <span style="color: red;">*</span>
                            </label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male">
                                    <label class="form-check-label" style="margin-right: 1rem;"
                                        for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
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
                            <label for="blood_group" class="form-label">Blood Group
                                <span style="color: red;">*</span></label>
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
                            <label for="bp" class="form-label">Blood Pressure (mm of Hg)</label>
                            <input type="text" class="form-control" id="bp" name="bp">
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
                            <label for="treat_history" class="form-label">Treatment History Details</label>
                            <input type="text" class="form-control" id="treat_history" name="treat_history">
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
                            <label for="occu_risk" class="form-label">Occupational Risk</label>
                            <input type="text" class="form-control" id="occu_risk" name="occu_risk">
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
                        <div class="mb-3" id="editWorkerModal_upload_pdf_div">
                            <label for="upload_pdf" class="form-label">Upload Pdf</label>
                            <input type="file" class="form-control" id="upload_pdf" name="upload_pdf">
                        </div>

                        <!-- Additional PDF upload fields, initially hidden -->
                        <div class="mb-3" id="editWorkerModal_upload_pdf_1_div" style="display: none;">
                            <label for="upload_pdf_1" class="form-label">Upload Pdf 1</label>
                            <input type="file" class="form-control" id="upload_pdf_1" name="upload_pdf_1">
                        </div>
                        <div class="mb-3" id="editWorkerModal_upload_pdf_2_div" style="display: none;">
                            <label for="upload_pdf_2" class="form-label">Upload Pdf 2</label>
                            <input type="file" class="form-control" id="upload_pdf_2" name="upload_pdf_2">
                        </div>
                        <div class="mb-3" id="editWorkerModal_upload_pdf_3_div" style="display: none;">
                            <label for="upload_pdf_3" class="form-label">Upload Pdf 3</label>
                            <input type="file" class="form-control" id="upload_pdf_3" name="upload_pdf_3">
                        </div>
                        <div class="mb-3" id="editWorkerModal_upload_pdf_4_div" style="display: none;">
                            <label for="upload_pdf_4" class="form-label">Upload Pdf 4</label>
                            <input type="file" class="form-control" id="upload_pdf_4" name="upload_pdf_4">
                        </div>
                        <!-- Button to add more PDFs -->
                        <button type="button" id="addWorkerModal_add_more_pdf"
                            class="btn btn-primary btn-sm add_more_pdf" style="margin-bottom: 10px">Add More PDF</button>

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
