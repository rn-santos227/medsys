<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;
    protected $table = 'patient_records';
    protected $fillable = [
        'patient_id',
        'prescription',
        'condition',
        'notes',
        'active'
    ];
}
