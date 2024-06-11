<?php

namespace App\Http\Controllers;

use App\Models\CheckupDrive;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Workers;
use Carbon\Carbon;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function companyDetails()
    {
        $companies = Company::all();
        return view('layouts.company.company-details', compact('companies'));
    }
    public function storeCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_size' => 'required|integer',
            'address' => 'required|string|max:255',
            'gstin' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
        ]);

        Company::create([
            'name' => $request->name,
            'employee_size' => $request->employee_size,
            'address' => $request->address,
            'gstin' => $request->gstin,
            'cin' => $request->cin,
        ]);

        return redirect()->route('layouts-company-details')->with('success', 'Company details added successfully!');
    }

    public function updateCompany(Request $request, Company $company)
    {
        $company->update([
            'name' => $request->name,
            'employee_size' => $request->employee_size,
            'address' => $request->address,
            'gstin' => $request->gstin,
            'cin' => $request->cin,
        ]);

        return redirect()->route('layouts-company-details')->with('success', 'Company details added successfully!');
    }

    public function destroyCompany(Company $company)
    {
        $company->delete();

        return redirect()->route('layouts-company-details')->with('success', 'Company details added successfully!');
    }

    public function checkupDrive()
    {
        $companies = Company::all();
        $checkupDrives = CheckupDrive::all();
        return view('layouts.company.checkup-drive', compact('companies', 'checkupDrives'));
    }
    public function storeCheckupdrive(Request $request)
    {
        // Validate the request data if needed
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string',
            'date' => 'required|date_format:Y-m'
        ]);
        $date = Carbon::createFromFormat('Y-m', $request->date)->startOfMonth();
        $checkupDrives = CheckupDrive::with('company')->get();
        $checkupDrives = new CheckupDrive;
        $checkupDrives->company_id = $request->company_id;
        $checkupDrives->title = $request->title;
        $checkupDrives->date = $date;
        $checkupDrives->save();
        $companies = Company::all();
        return redirect()->route('layouts-checkup-drive')->with('success', 'Checkup Drive saved successfully!');
    }
    public function updateCheckupDrive(Request $request, $id)
    {
        $checkupDrive = CheckupDrive::find($id);
        if (!$checkupDrive) {
            return redirect()->back()->with('error', 'Checkup Drive not found.');
        }
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string',
            'date' => 'required|date_format:Y-m'
        ]);
        $date = Carbon::createFromFormat('Y-m', $request->date)->startOfMonth();
        $checkupDrive->update([
            'company_id' => $request->company_id,
            'title' => $request->title,
            'date' => $date
        ]);
        return redirect()->route('layouts-checkup-drive')->with('success', 'Checkup Drive updated successfully!');
    }

    public function destroyCheckupDrive($checkupDrive)
    {
        $checkupDrive = CheckupDrive::findOrFail($checkupDrive);
        $checkupDrive->delete();
        return redirect()->back()->with('success', 'Checkup Drive deleted successfully.');
    }

    public function workers()
    {
        $companies = Company::all();
        $workers = Workers::all();
        return view('layouts.company.workers', compact('workers', 'companies'));
    }
    public function storeWorkers(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'mobile_no' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'employee_id' => 'required',
            'blood_group' => 'required',
            'upload_pdf' => 'nullable|file|mimes:pdf|max:2048', // Max file size: 2MB
            'worker_signature' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Max file size: 2MB
        ]);

        try {
            // Create a new Workers instance
            $worker = new Workers;
            $worker->company_id = $validatedData['company_id'];
            $worker->name = $validatedData['name'];
            $worker->mobile_no = $validatedData['mobile_no'];
            $worker->dob = $validatedData['dob'];
            $worker->gender = $validatedData['gender'];
            $worker->employee_id = $validatedData['employee_id'];
            $worker->blood_group = $validatedData['blood_group'];
            // Assign additional fields from the request
            $worker->father = $request->input('father');
            $worker->address = $request->input('address');
            $worker->designation = $request->input('designation');
            $worker->identification_mark = $request->input('identification_mark');
            $worker->work_at_hazardous_process = $request->input('work_at_hazardous_process');
            $worker->work_at_dangerous_operation = $request->input('work_at_dangerous_operation');
            $worker->age = $request->input('age');
            $worker->last_donate_date = $request->input('last_donate_date');
            $worker->height = $request->input('height');
            $worker->weight = $request->input('weight');
            $worker->blood_pressure = $request->input('blood_pressure');
            $worker->bmi = $request->input('bmi');
            $worker->pulse = $request->input('pulse');
            $worker->present_complaints = $request->input('present_complaints');
            $worker->treatment_history = $request->input('treatment_history');
            $worker->past_history = $request->input('past_history');
            $worker->family_history = $request->input('family_history');
            $worker->occupational_risk = $request->input('occupational_risk');
            $worker->allergies_skin_risks = $request->input('allergy');
            $worker->cardiovascular_system = $request->input('cardio');
            $worker->respiratory_system = $request->input('resp');
            $worker->ear_nose_throat = $request->input('enr');
            $worker->dental_exam = $request->input('dental');
            $worker->color_vision = $request->input('eye');
            $worker->remarks = $request->input('remarks');
            $worker->fit_unfit = $request->input('fit_unfit');
            $worker->reason_for_unfit = $request->input('reason_unfit');

            // Add more fields as needed
            if ($request->hasFile('upload_pdf')) {
                $pdfFile = $request->file('upload_pdf');
                $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
                $pdfFile->move(public_path('pdf_files'), $pdfFileName);
                $worker->upload_pdf = $pdfFileName;
            }
            if ($request->hasFile('worker_signature')) {
                $signatureFile = $request->file('worker_signature');
                $signatureFileName = time() . '_' . $signatureFile->getClientOriginalName();
                $signatureFile->move(public_path('signatures'), $signatureFileName);
                $worker->worker_signature = $signatureFileName;
            }
            // Save the worker to the database
            $worker->save();

            return redirect()->back()->with('success', 'Worker added successfully!');
        } catch (\Exception $e) {
            Log::error('An error occurred while saving the worker: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'An error occurred while saving the worker: ' . $e->getMessage());
        }
    }

    public function updateWorkers(Request $request, $id)
    {
        try {
            // Find the worker by ID
            $worker = Workers::findOrFail($id);

            // Validate the request data
            $validatedData = $request->validate([
                'company_id' => 'required',
                'name' => 'required',
                'mobile_no' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'employee_id' => 'required',
                'blood_group' => 'required',
                'upload_pdf' => 'nullable|file|mimes:pdf|max:2048', // Max file size: 2MB
                'worker_signature' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Max file size: 2MB
            ]);

            // Update worker attributes
            $worker->fill($validatedData);

            // Handle file uploads if present
            if ($request->hasFile('upload_pdf')) {
                $worker->upload_pdf = $request->file('upload_pdf')->store('pdf_files');
            }
            if ($request->hasFile('worker_signature')) {
                $worker->worker_signature = $request->file('worker_signature')->store('signatures');
            }

            // Save the updated worker to the database
            $worker->save();

            return redirect()->back()->with('success', 'Worker updated successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the worker: ' . $e->getMessage());
        }
    }
    public function destroyWorkers($workers)
    {
        $worker = Workers::findOrFail($workers);
        $worker->delete();
        return redirect()->back()->with('success', 'Worker deleted successfully.');
    }

    public function physicalExamination()
    {
        return view('layouts.company.physical-examination');
    }
}
