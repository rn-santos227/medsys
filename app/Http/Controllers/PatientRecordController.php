<?php

namespace App\Http\Controllers;

use App\Models\PatientRecord;

use App\Models\PatientRecordRequest;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = PatientRecord::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('records.index', compact('records'));
    }

    public function create(PatientRecordRequest $request) {
        $validated = $request->validated();
        $id = Patient::count() + 1;
        $records = Patient::firstOrCreate([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
        ],[
            'ref_code' => "P" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
            'email' => $request->email,
            'home_address' => $request->home_address,
            'notes' => $request->notes,
            'priority' => 0,
            'active' => 1
        ]);

        $records = Patient::where('active', 1)->get();
        return view('records.index', compact(
            'records'
        ));
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
