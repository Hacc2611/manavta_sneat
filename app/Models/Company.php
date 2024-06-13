<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'employee_size',
        'address',
        'gstin',
        'cin',
    ];
    public function workers()
    {
        return $this->hasMany(Workers::class, 'company_id');
    }
}
