<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <style>
        .landscape-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }
    </style>


</head>

<body>

    <center>
        <img src="https://manavtahospital.org//uploads/applehealth/applehealth.png" alt="logo" width="100%"
            height="10%" class="image" /></br>
    </center>
    <center>
        <h4 class="modal-title" id="exampleModalLabel">
            Medical Examination Report
            {{-- {{ __('messages.report_apple.medical_examination_report') }} --}}
        </h4>
    </center>
    <hr>
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12 col-sm-12 ">
                <div class="invoice">
                    <table>
                        <tr>
                            <th style="padding-right: 74;">Name: {{ $worker->name }}</th>
                            <th style="padding-right: 60;">DOB: {{ date('d-m-Y', strtotime($worker->dob)) }}</th>
                            <th>Gender : @if ($worker['gender'] == 'Male')
                                    Male
                                @elseif($worker['gender'] == 'Female')
                                    Female
                                @endif
                            </th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="padding-right: 70px;">Examination Date:
                                {{ date('d-m-Y', strtotime($worker->last_donate_date)) }}
                            </th>
                            <th style="padding-right: 96;">Age : {{ $worker->age }}</th>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th>Physical Examination : </th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="padding-right: 55;">Height: {{ $worker->height }} cm</th>
                            <th style="padding-right: 55;">Pulse: {{ $worker->pulse }} bpm</th>
                            <th style="padding-right: 55px;">Blood Group: {{ $worker->blood_group }}</th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th style="padding-right: 60;">Weight: {{ $worker->weight }} kg</th>
                            <th style="padding-right: 57;">BMI: {{ $worker->bmi }} kg/m<sup>2</sup></th>
                            <th style="padding-right: 60;">Blood Pressure: {{ $worker->bp }}</th>
                        </tr>
                    </table>
                    <h3>Detailed History:</h3>
                    {{-- <div style="padding-top: 8px;">History of Present Complaints:{{ $worker->past_history }}</div> --}}
                    <div class="section1">
                        <style>
                            .DH {
                                display: inline-block;
                                width: 200px;
                                font-weight: bold;
                            }

                            .val {
                                display: inline-block;
                                width: calc(100% - 160px);
                                margin-left: 10px;
                            }

                            .section1 div {
                                padding-top: 8px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
                        </style>
                        <div><span class="DH">Present Complaints:</span><span
                                class="val">{{ $worker->present_complaints }}</span></div>
                        <div><span class="DH">Past History:</span><span
                                class="val">{{ $worker->past_history }}</span></div>
                        <div><span class="DH">Past Surgery Details:</span><span
                                class="val">{{ $worker->treat_history }}</span></div>
                        <div><span class="DH">Family History:</span><span
                                class="val">{{ $worker->family_history }}</span></div>
                        <div><span class="DH">Occupational Risk:</span><span
                                class="val">{{ $worker->occu_risk }}</span></div>
                        <div><span class="DH">Allergies Skin/Risks:</span><span
                                class="val">{{ $worker->allergy }}</span></div>
                    </div>

                    <h3>Systematic Examination:</h3>

                    <div><span class="DH">Cardiovascular System:</span><span
                            class="val">{{ $worker->cardio }}</span></div>
                    <div><span class="DH">Respiratory System:</span><span class="val">{{ $worker->resp }}</span>
                    </div>
                    <div><span class="DH">Ear, Nose, Roat:</span><span class="val">{{ $worker->enr }}</span>
                    </div>
                    <div><span class="DH">Dental Exam:</span><span class="val">{{ $worker->dental }}</span>
                    </div>
                    <div style="padding-top: 8px;">
                        <h3>Examination of Eye:</h3>
                    </div>

                    <div class="form-group col-sm-12 mb-5">
                        <table style="width:100%; border:1px solid black;">
                            <tr>
                                <th style="border:1px solid black;">Visual</th>
                                <th style="border:1px solid black;">Right</th>
                                <th style="border:1px solid black;">Left</th>
                                <th style="border:1px solid black;">Near Vision</th>
                            </tr>
                            <tr>
                                <th style="border:1px solid black;">With Glass</th>
                                <td style="border:1px solid black;">{{ $worker->right_with }}</td>
                                <td style="border:1px solid black;">{{ $worker->left_with }}</td>
                                <td style="border:1px solid black;">{{ $worker->near_with }}</td>
                            </tr>
                            <tr>
                                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Without Glass</th>
                                <td style="border:1px solid black;">{{ $worker->right_without }}</td>
                                <td style="border:1px solid black;">{{ $worker->left_without }}</td>
                                <td style="border:1px solid black;">{{ $worker->near_without }}</td>
                            </tr>
                        </table>
                    </div>

                    <div style="padding-top: 8px;">Color Vision: {{ $worker->eye }}</div>

                    <div style="padding-top: 8px;">Remarks: {{ $worker->remarks }}</div>

                    <div style="padding-top: 8px;">Reason for Unfit: {{ $worker->reason_unfit }}</div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <center>
        <p>Email : aapplehealthcare@gmail.com || For Home Visit : +91 9870035563, 94280 30662</p>
        <p>Addresse : 9-10, Vallabh Heights, Beside Kanha gold, Dabhoi Road Vadodara-25.</p>
    </center>
    <br>
    <br>
    <br>
    <div style="padding-top: 30px;">
        <img src="https://manavtahospital.org//uploads/applehealth/applehealth.png" alt="logo" width="100%"
            height="10%" class="image" />

        <center>
            <h4 class="modal-title" id="exampleModalLabel">
                Medical Examination Report
                {{-- {{ __('messages.report_apple.medical_examination_report') }} --}}
            </h4>
        </center>
        <hr>
    </div>

    <table>
        <tr>
            <th style="padding-right: 80px;">Name: {{ $worker->name }}</th>
            <th style="padding-right: 100px;">Age : {{ $worker->age }}</th>

            <th>Gender : @if ($worker['gender'] == 'Male')
                    Male
                @elseif($worker['gender'] == 'Female')
                    Female
                @endif
            </th>
        </tr>
    </table>

    <table>
        <tr>
            <th style="padding-right: 147px;">Designation: {{ $worker->designation }}</th>
            <th>Employee ID: {{ $worker->employee_id }}</th>
        </tr>
    </table>

    <table>
        <tr>
            <th style="padding-right: 105px;">Company Name: {{ $worker->company->name }}</th>
            <th>Examination Date: {{ date('d-m-Y', strtotime($worker->last_donate_date)) }}</th>
        </tr>
    </table>

    <p>
    <h3>Visual Activity :</h3>
    </p>
    <div class="form-group col-sm-12 mb-5">
        <table style="width:100%; border:1px solid black;">
            <tr>
                <th style="border:1px solid black;">Visual</th>
                <th style="border:1px solid black;">Right</th>
                <th style="border:1px solid black;">Left</th>
                <th style="border:1px solid black;">Near Vision</th>
            </tr>
            <tr>
                <th style="border:1px solid black;">With Glass</th>
                <td style="border:1px solid black;">{{ $worker->right_with }}</td>
                <td style="border:1px solid black;">{{ $worker->left_with }}</td>
                <td style="border:1px solid black;">{{ $worker->near_with }}</td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Without Glass</th>
                <td style="border:1px solid black;">{{ $worker->right_without }}</td>
                <td style="border:1px solid black;">{{ $worker->left_without }}</td>
                <td style="border:1px solid black;">{{ $worker->near_without }}</td>
            </tr>
        </table>
    </div>
    <div class="form-group col-sm-12 mb-5" style="padding-top: 10px;">
        <table style="width:100%; border:1px solid black;">
            <tr>
                <th style="border:1px solid black;">Visual</th>
                <th style="border:1px solid black;">Right</th>
                <th style="border:1px solid black;">Left</th>
            </tr>
            <tr>
                <th style="border:1px solid black;">Lids</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Lacrimal </th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Cornea</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Iris/Sclera</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Anterior Chamber</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Pupil</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Lens</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Cover Test</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
            <tr>
                <th class="form-group col-sm-4 mb-5" style="border:1px solid black;">Ocular Movement</th>
                <td style="border:1px solid black;"><label id ="reportRight_">NORMAL</label></td>
                <td style="border:1px solid black;"><label id ="reportLeft_">NORMAL</label></td>
                </td>
            </tr>
        </table>
    </div>

    <p>Color Vision:{{ $worker->eye }}</p>
    <p>Remarks:{{ $worker->remarks }}</p>
    <div>
        <img src="https://manavtahospital.org//uploads/applehealth/caresign.png" alt="sign" width="40%"
            height="" style="margin-left:470px" class="image" /></br>
    </div>
    <div class="modal-footer justify-content-center addBorder">
        <center>Addresse : 9-10, Vallabh Heights, Beside Kanha gold, Dabhoi Road Vadodara-25.</center>
        <center>Email : aapplehealthcare@gmail.com || For Home Visit : +91 9870035563, 94280 30662</center>
        <center>Website : <a href="https://manavtahospital.org/">https://manavtahospital.org/</a></center>
    </div>


    <center>
        <h3>CERTIFICATE</h3>
    </center>

    <div style="padding-left: 100px; padding-top: 8px;">In my opinion he /she is unfit for employment in the said
        manufacturing</div>
    <div style="padding-left: 100px; padding-top: 8px;"> process/operation for the
        reason................................He/She is referred for futher examination to the </div>

    <h4 style="padding-left: 100px; padding-top: 8px;">Certifying Surgeon.</h4>

    <div style="padding-left: 100px; padding-top: 8px;">The serial number for of previous certificate
        of...........................................................................................</div>

    <div style="padding-top: 10px;">
        <div class="container col-sm-8" style="padding-bottom: 600px;">
            <div class="form-group col-sm-6 mb-5">
                <img src="https://manavtahospital.org//uploads/applehealth/caresign.png" alt="sign"
                    width="40%" height="" style="margin-left:400px" class="image" /></br>
            </div>
        </div>
    </div>

    <center>
        <h3>FORM NO. 33</h3>
    </center>

    <div>
        <div style="padding-left: 150px;"> (Prescribed under Rule 69-T and 102)</div>
        <div style="padding-left: 150px;"> Certificate of Fitness of employer in hazardous process and Operations.
        </div>
        <div style="padding-left: 150px;">(TO BE ISSUED BY FACTORY MEDICAL OFFICER)</div>
    </div>
    <hr>

    <div style="padding-top: 8px;">1. Serial Number in the Register of Adult Workers: {{ $worker->employee_id }}</div>

    <div style="padding-top: 8px;">2. Name: {{ $worker->name }}</div>

    <div style="padding-top: 8px;">3. Father Name: {{ $worker->father }}</div>

    <div style="padding-top: 8px;">4. Gender : @if ($worker['gender'] == 'Male')
            Male
        @elseif($worker['gender'] == 'Female')
            Female
        @endif
    </div>
    <div style="padding-top: 8px;">5. Residence: {{ $worker->addresse }}</div>

    <div style="padding-top: 8px;">6. Date Of Birth: {{ date('d-m-Y', strtotime($worker->dob)) }}</div>

    <div style="padding-top: 8px;">7. Name of address of the factory: {{ $worker->blood_group }}</div>

    <div style="padding-top: 8px;">8. The worker is employed/proposed for: {{ $worker->name }}</div>

    <div style="padding-left: 15px; padding-top: 8px;">a.Hazardous process: {{ $worker->haza }}</div>

    <div style="padding-left: 15px; padding-top: 8px;">b.Dangerous Operation: {{ $worker->dange }}</div>

    <p style="padding-left: 30px; padding-top: 20px;">I certify that i have personally examined the above named person
        whose identification marks are {{ $worker->mark }} nd who is desirous of being employed in above mentioned
        process/operation and that his/her, age, as nearly as can be ascertating from my examination , is
        {{ $worker->age }} Years.</p>

    <p style="padding-left: 30px;">In my opinion he/she is fit for emloyment in the said manufacturing
        process/operation.</p>
    <p style="padding-left: 30px;">In my opinion he /she is unfit for employment in the said manufacturing
        process/operation for the reason................................He/She is referred for futher examinationn to
        the </p>

    <h3 style="padding-left: 30px;">Certifying Surgeon.</h3>

    <p style="padding-left: 30px;">The serial number for of previous certificate </p>
    <p style="padding-left: 30px;">
        of......................................................................
    </p>

    <table style="padding-left: 45px; padding-top: 200px;">
        <tr>
            <th style="padding-right: 150px;">Signation of Left hands thumb impression of the person examined</th>
            <th>Signature of the Factory Medical Officer</th>
        </tr>
        <tr>
            <th style="padding-right: 150;"></th>
            <th>Stamp of Factory</th>
        </tr>
        <tr>
            <th style="padding-right: 150;"></th>
            <th>Medical Officer with</th>
        </tr>
        <tr>
            <th style="padding-right: 150;"></th>
            <th>Name of the Factory</th>
        </tr>
    </table>


    <center>
        <h3 style="padding-top: -20px;">FORM NO. 32</h3>
        <h4 style="padding-top: -40px;">(Prescribed under Rule 68-T and 102)</h4>
        <h3 style="padding-top: -20px;">Health Register</h3>
    </center>
    <hr>

    <div style="padding-top: 8px;">1. Serial Number in the Register of Adult Workers: {{ $worker->employee_id }}</div>

    <div style="padding-top: 8px;">2. Name: {{ $worker->name }}</div>

    <div style="padding-top: 8px;">4. Gender : @if ($worker['gender'] == '1')
            Male
        @elseif($worker['gender'] == '0')
            Female
        @endif
    </div>

    <div style="padding-top: 8px;">6. Date Of Birth: {{ date('d-m-Y', strtotime($worker->dob)) }}</div>

    <div style="padding-top: 16px;">

        <table class="landscape-table" border="2">
            <tr>
                <td class="col1" width="" rowspan="2">Department Works</td>
                <td class="col2" width="" rowspan="2">Name of Hazzardons Process</td>
                <td class="col3" width="" rowspan="2">Dangerous process/ operation</td>
                <td class="col4" width="" rowspan="2">Nature of job or occupation</td>
                <td class="col5" width="" height="" rowspan="2">Raw materials, products or
                    By-products likely to be exposed to </td>
                <td class="col6" width="" rowspan="2">Date of posting</td>
                <td class="col7" width="" rowspan="2">Date of leaving/transfer in or transfer</td>
                <td class="col8" width="" rowspan="2">Reasons for Discharge/ leaving or </td>
                <td width="" height="" colspan="4">Medical examination Result thereof</td>
                <td width="" height="" colspan="4">If declared unit for work</td>
                <td class="col17" width="" rowspan="2">Signature with date of the factory Medical Officer/
                    the certifynig Surgeon</td>
            </tr>
            <tr>
                <td class="col9" width="6%">Date</td>
                <td class="col10" width="6%">Signs and symtoms observed during examination</td>
                <td class="col11" width="6%">Nature of test & Result thereof</td>
                <td class="col12" width="6%">Result Fit/Unfit</td>
                <td class="col13" width="6%">Period temporary withdrawal from that work</td>
                <td class="col14" width="6%">Reasons for such withdrawal</td>
                <td class="col15" width="6%">Date of declaring him Unfit for that work</td>
                <td class="col16" width="6%">Date of issuing fitness certificate</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
            </tr>
            <tr>
                <td class=""><label id="reportDesignation">{{ $worker->designation }}</label></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td class="">
                    </br>
                    <div class=""><input type="date"
                            id="datetesting">{{ date('d-m-Y', strtotime($worker->last_donate_date)) }} </div>
                </td>
                <td><br><br><br><br><br></td>
                <td class=""></br> <label id="reportRemarks1">{{ $worker->remarks }}</label></td>
                <td class=""></br> <label id="fitunfit">{{ $worker->fit_unfit }}</label>

                </td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
            </tr>
        </table>
    </div>
    <div class="">
        <table>
            <tr>
                <td>
                    <h3><b>Note:</b></h3>
                </td>
                <td>1.Separate page should be maintained for individual worker.</td>
            </tr>
            <tr>
                <td></td>
                <td>2.fresh entry should be made for each examination.</td>
            </tr>
        </table>
    </div>

</body>

</html>
