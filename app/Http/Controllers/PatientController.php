<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //check user is authenticated
    public function __construct()
    {
        $this->middleware('auth');
    }

    //load patient page.
    public function index()
    {
        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('patients.index', compact('patients'));
    }

    //create new patient record.
    public function create(PatientRequest $request) {
        $validated = $request->validated();
        $id = Patient::count() + 1;
        $patient = Patient::firstOrCreate([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
        ],[
            'ref_code' => "P" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'home_address' => $request->home_address,
            'notes' => $request->notes,
            'priority' => 0,
            'active' => 1
        ]);

        $patients = Patient::where('active', 1)->get();
        return view('patients.index', compact(
            'patients'
        ));
    }

    //updates a patient record.
    public function update(PatientRequest $request) {
        $validated = $request->validated();
        $patient = Patient::findOrFail($request->id);

        $patient->update([
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'home_address' => $request->home_address,
            'notes' => $request->notes,
            'priority' => $request->priority,
        ]);

        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('patients.index', compact('patients'));
    }

    //delets a patient record.
    public function delete(Request $request) {
        $patient = Patient::findOrFail($request->id);
        $patient->update([
            'active' => 0
        ]);
        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('patients.index', compact('patients'));
    }
}


