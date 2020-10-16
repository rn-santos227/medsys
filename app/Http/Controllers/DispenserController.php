<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use Illuminate\Http\Request;

class DispenserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dispenser.index');
    }

    public function create(Request $request) {

    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
