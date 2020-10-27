<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;
class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedule = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedule'));
    }

    public function create(Request $request) {
        $validated = $request->validated();
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
