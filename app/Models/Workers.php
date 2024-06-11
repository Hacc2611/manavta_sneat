<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'father',
        'address',
        'designation',
        'identification_mark',
        'work_at_hazardous_process',
        'work_at_dangerous_operation',
        'mobile_no',
        'dob',
        'age',
        'employee_id',
        'gender',
        'blood_group',
        'last_donate_date',
        'height',
        'weight',
        'blood_pressure',
        'bmi',
        'pulse',
        'present_complaints',
        'treatment_history',
        'past_surgery_details',
        'family_history',
        'occupational_risk',
        'allergies_skin_risks',
        'cardiovascular_system',
        'respiratory_system',
        'ear_nose_throat',
        'dental_exam',
        'color_vision',
        'remarks',
        'fit_unfit',
        'reason_for_unfit',
        'upload_pdf',
        'worker_signature'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
