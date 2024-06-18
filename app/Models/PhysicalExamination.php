<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExamination extends Model
{
    use HasFactory;

    protected $table = 'blood_donations';
    protected $fillable = [
        'blood_donor_id',
        'bags'
    ];
    public function worker()
    {
        return $this->belongsTo(Workers::class, 'blood_donor_id', 'id');
    }
}
