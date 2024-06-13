<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;
    protected $table = 'blood_donors';
    protected $fillable = [
        'company_id',
        'name',
        'father',
        'addresse',
        'mark',
        'haza',
        'dange',
        'mobile_no',
        'dob',
        'age',
        'employee_id',
        'gender',
        'designation',
        'blood_group',
        'last_donate_date',
        'height',
        'weight',
        'bp',
        'bmi',
        'pulse',
        'present_complaints',
        'past_history',
        'treat_history',
        'family_history',
        'occu_risk',
        'allergy',
        'cardio',
        'resp',
        'enr',
        'dental',
        'eye',
        'remarks',
        'fit_unfit',
        'reason_unfit',
        'upload_pdf',
        'worker_signature'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
