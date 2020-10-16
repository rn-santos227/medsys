<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
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
        return view('nurses.index', compact('nurses'));
    }

    public function create(Request $request) {

    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
