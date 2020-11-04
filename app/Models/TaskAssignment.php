<?php

namespace App\Models;

use App\Models\Dispenser;
use App\Models\Patient;
use App\Models\Nurse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;
    protected $table = 'task_assignments';
    protected $fillable = [
        'ref_code',
        'dispenser_id',
        'patient_id',
        'nurse_id',
        'notes',
        'active'
    ];

    public function getDispenserName() {
        $dispenser = Dispenser::where('id', $this->dispenser_id)->first();
        return $dispenser->name;
    }

    public function getPatientName() {
        $patient = Patient::where('id', $this->patient_id)->first();
        return $patient->last_name.','.$patient->first_name.' '.$patient->middle_name;
    }

    public function getNurseName() {
        $nurse = Nurse::where('id', $this->nurse_id)->first();
        return $nurse->last_name.','.$nurse->first_name.' '.$nurse->middle_name;
    }
}
