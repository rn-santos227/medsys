<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\Models\Log;
use App\Models\Medicine;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\PatientRecord;
use App\Models\Schedule;
use App\Models\TaskAssignment;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //loads the dashboard
    public function index()
    {
        //get all available dispensers.
        $dispensers = Dispenser::where('active', 1)->get();
        //get the total number of active nurses.
        $nurse_count = Nurse::where('active', 1)->count();
        //get the total number of active medicines.
        $medicine_count = Medicine::where('active', 1)->count();   
        //get the total number of active patients.   
        $patient_count = Patient::where('active', 1)->count();
         //get the total number of active schedules.
        $schedule_count = Schedule::where('active', 1)->count();
        //get the total number of active task assignments.
        $assignment_count = TaskAssignment::where('active', 1)->count();

        return view('dashboard', compact(
            'dispensers', 'nurse_count', 'medicine_count', 'patient_count', 'schedule_count', 'assignment_count'
        ));
    }
}



