<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;
    protected $table = 'task_assignments';
    protected $fillable = [
        'dispenser_id',
        'patient_id',
        'nurse_id',
        'notes',
        'active'
    ];
}
