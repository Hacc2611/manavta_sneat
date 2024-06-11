<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupDrive extends Model
{
    use HasFactory;

    protected $table = 'checkup_drives';
    protected $fillable = ['name', 'title', 'date'];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
