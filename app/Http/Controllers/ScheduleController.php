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
        $schedule = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedule'));
    }

    public function create(ScheduleRequest $request) {
        $validated = $request->validated();
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
