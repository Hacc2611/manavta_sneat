<?php

namespace App\Http\Controllers;

use App\Models\CheckupDrive;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Workers;
use Carbon\Carbon;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

    public function workers(Request $request)
    {
        $sort_by = $request->query('sort_by', 'id');
        $sort_order = $request->query('sort_order', 'asc');
        $companies = Company::all();
        $workers = Workers::with('company')
            ->orderBy($sort_by, $sort_order)
            ->get();
        return view('layouts.company.workers', compact('workers', 'companies', 'sort_by', 'sort_order'));
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
            $worker->addresse = $request->input('addresse');
            $worker->designation = $request->input('designation');
            $worker->mark = $request->input('mark');
            $worker->haza = $request->input('haza');
            $worker->dange = $request->input('dange');
            $worker->age = $request->input('age');
            $worker->last_donate_date = $request->input('last_donate_date');
            $worker->height = $request->input('height');
            $worker->weight = $request->input('weight');
            $worker->bp = $request->input('bp');
            $worker->bmi = $request->input('bmi');
            $worker->pulse = $request->input('pulse');
            $worker->present_complaints = $request->input('present_complaints');
            $worker->treat_history = $request->input('treat_history');
            $worker->past_history = $request->input('past_history');
            $worker->family_history = $request->input('family_history');
            $worker->occu_risk = $request->input('occu_risk');
            $worker->allergy = $request->input('allergy');
            $worker->cardio = $request->input('cardio');
            $worker->resp = $request->input('resp');
            $worker->enr = $request->input('enr');
            $worker->dental = $request->input('dental');
            $worker->eye = $request->input('eye');
            $worker->remarks = $request->input('remarks');
            $worker->fit_unfit = $request->input('fit_unfit');
            $worker->reason_unfit = $request->input('reason_unfit');

            // Add more fields as needed
            if ($request->hasFile('upload_pdf')) {
                $pdfFile = $request->file('upload_pdf');
                $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
                $pdfFile->storeAs('pdf_files', $pdfFileName); // Store file in storage/pdf_files directory
                $worker->upload_pdf = $pdfFileName; // Save file name to database
            }
            if ($request->hasFile('worker_signature')) {
                $signatureFile = $request->file('worker_signature');
                $signatureFileName = time() . '_' . $signatureFile->getClientOriginalName();
                $signatureFile->storeAs('signatures', $signatureFileName); // Store file in storage/signatures directory
                $worker->worker_signature = $signatureFileName; // Save file name to database
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

            // Find the worker by ID
            $worker = Workers::findOrFail($id);

            // Update worker attributes
            $worker->fill($validatedData);

            // Handle PDF file upload if present
            if ($request->hasFile('upload_pdf')) {
                // Delete the old file if it exists
                if ($worker->upload_pdf) {
                    Storage::delete($worker->upload_pdf);
                }
                $pdfFile = $request->file('upload_pdf');
                $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
                $pdfFile->storeAs('pdf_files', $pdfFileName); // Store file in storage/pdf_files directory
                $worker->upload_pdf = $pdfFileName; // Save file name to database
            }

            // Handle worker signature file upload if present
            if ($request->hasFile('worker_signature')) {
                // Delete the old file if it exists
                if ($worker->worker_signature) {
                    Storage::delete($worker->worker_signature);
                }
                // Store the new file and update the database column
                $worker->worker_signature = $request->file('worker_signature')->store('signatures');
            }

            // Save the updated worker to the database
            $worker->save();

            return redirect()->back()->with('success', 'Worker updated successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('An error occurred while updating the worker: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the worker: ' . $e->getMessage());
        }
    }

    public function destroyWorkers($workers)
    {
        $worker = Workers::findOrFail($workers);
        $worker->delete();
        return redirect()->back()->with('success', 'Worker deleted successfully.');
    }
    public function generateWorkerPDF($id)
    {
        $companies = Company::all();
        $worker = Workers::findOrFail($id);
        $pdf = PDF::loadView('layouts.company.worker_pdf', compact('worker', 'companies'));
        return $pdf->stream('worker_' . $id . '.pdf');
    }
    public function physicalExamination()
    {
        return view('layouts.company.physical-examination');
    }
}
