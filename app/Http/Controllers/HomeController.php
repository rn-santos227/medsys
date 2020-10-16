<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;

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

    public function index()
    {
        $dispensers = Dispenser::where('active', 1)->get();
        return view('dispensers.index', compact('dispensers'));
    }
}
