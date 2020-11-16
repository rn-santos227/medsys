<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\Models\Patient;
use App\Models\Nurse;

use App\Models\TaskAssignment;

use App\Http\Requests\TaskAssignmentRequest;
use Illuminate\Http\Request;

class TaskAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nurses = Nurse::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $dispensers = Dispenser::where([
            ['active', 1],
            ['maintenance', 1]
        ])->orderBy('created_at', 'DESC')->get();
        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('assignments.index', compact(
            'assignments', 'nurses', 'dispensers', 'patients'
        ));
    }

    public function create(TaskAssignmentRequest $request) {
        $validated = $request->validated();
        $id = TaskAssignment::count() + 1;
        $patients = TaskAssignment::firstOrCreate([
            'patient_id' => $request->patient_id, 
            'nurse_id' => $request->nurse_id,
            'dispenser_id' => $request->dispenser_id,
        ],[
            'ref_code' => "A" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'patient_id' => $request->patient_id, 
            'nurse_id' => $request->nurse_id,
            'dispenser_id' => $request->dispenser_id,
            'notes' => $request->notes,
            'active' => 1
        ]);

        $nurses = Nurse::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('assignments.index', compact(
            'assignments', 'nurses', 'dispensers', 'patients'
        ));
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
