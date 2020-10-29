<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patients = Patient::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('patients.index', compact('patients'));
    }

    public function create(PatientRequest $request) {
        $validated = $request->validated();
        $id = Patient::count() + 1;
        $patients = Patient::firstOrCreate([
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

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
