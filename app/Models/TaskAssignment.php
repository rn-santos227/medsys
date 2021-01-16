<?php

namespace App\Models;


use App\Models\Dispenser; //imports dispenser model
use App\Models\Patient; //imports patient model
use App\Models\Nurse; //import nurse model

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;
    //indicate task_assignments table from database
    protected $table = 'task_assignments';
    //fillable field of task assignment
    protected $fillable = [
        'ref_code',
        'dispenser_id', //connects to dispenser
        'patient_id', //connects to patient
        'nurse_id', //connects to nurse
        'notes',
        'active'
    ];

    //gets the dispenser name from dispenser model.
    public function getDispenserName() {
        $dispenser = Dispenser::where('id', $this->dispenser_id)->first();
        return $dispenser->name;
    }

    public function getDispenserMedicine() {
        $dispenser = Dispenser::where('id', $this->dispenser_id)->first();
        return $dispenser->getMedicineName();
    }

    //gets the patient name from patient model
    public function getPatientName() {
        $patient = Patient::where('id', $this->patient_id)->first();
        return $patient->last_name.', '.$patient->first_name.' '.$patient->middle_name;
    }

    //gets the nurse name from the nurse model
    public function getNurseName() {
        $nurse = Nurse::where('id', $this->nurse_id)->first();
        return $nurse->last_name.', '.$nurse->first_name.' '.$nurse->middle_name;
    }

    //gets the nurse contact numbee from the nurse model
    public function getNurseContact() {
        $nurse = Nurse::where('id', $this->nurse_id)->first();
        return $nurse->contact;
    }
}
