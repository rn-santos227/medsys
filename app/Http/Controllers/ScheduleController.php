<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use App\Http\Requests\ScheduleRequest;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules'));
    }

    public function create(ScheduleRequest $request) {
        $validated = $request->validated();
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
