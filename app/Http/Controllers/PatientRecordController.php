<?php

namespace App\Http\Controllers;

use App\Models\PAtientRecord;
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

    public function create(Request $request) {
        $validated = $request->validated();
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
