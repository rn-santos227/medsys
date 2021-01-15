<?php

namespace App\Http\Controllers;

use App\Models\Nurse;

use App\Http\Requests\NurseRequest;
use Illuminate\Http\Request;


class NurseController extends Controller
{
    //check if user is authenticated
    public function __construct()
    {
        $this->middleware('auth');
    }

    //load nurse page
    public function index()
    {
        $nurses = Nurse::where('active', 1)->get();
        return view('nurses.index', compact(
            'nurses'
        ));
    }

    //create new nurse record
    public function create(NurseRequest $request) {
        $validated = $request->validated();

        $id = Nurse::count() + 1;
        $nurse = Nurse::firstOrCreate([
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
        ],[
            'ref_code' => "N" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'notes' => $request->notes,
            'active' => 1
        ]);

        $nurses = Nurse::where('active', 1)->get();
        return view('nurses.index', compact(
            'nurses'
        ));
    }

    public function biometric(NurseRequest $request) {
        echo shell_exec("sudo python /usr/share/doc/python-fingerprint/examples/example_enroll.py 2>&1");
        $nurses = Nurse::where('active', 1)->get();
        return view('nurses.index', compact(
            'nurses'
        ));
    }

    //update nurse record.
    public function update(Request $request) {
        $validated = $request->validated();
        $nurse = Nurse::findOrFail($request->id);

        $nurse->update([
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);

        $nurses = Nurse::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('nurses.index', compact('nurses', 'medicines')); 
    }

    //delete nurse record.
    public function delete(Request $request) {
        $nurse = Patient::findOrFail($request->id);
        $nurse->update([
            'active' => 0
        ]);
   
        $nurses = Nurse::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('nurses.index', compact('nurses', 'medicines'));   
    }
}
