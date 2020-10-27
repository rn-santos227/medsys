<?php

namespace App\Http\Controllers;

use App\Models\Nurse;

use App\Http\Requests\NurseRequest;
use Illuminate\Http\Request;


class NurseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nurses = Nurse::where('active', 1)->get();
        return view('nurses.index', compact(
            'nurses'
        ));
    }

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

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
