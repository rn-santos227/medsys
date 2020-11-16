<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\TaskAssignment;

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
        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules', 'assignments'));
    }

    public function create(ScheduleRequest $request) {
        $validated = $request->validated();
        $days = 
        ($request->has('mon') ? '0' : '') . 
        ($request->has('tue') ? '1' : '') .
        ($request->has('wed') ? '2' : '') .
        ($request->has('thu') ? '3' : '') .
        ($request->has('fri') ? '4' : '') . 
        ($request->has('sat') ? '5' : '') . 
        ($request->has('sun') ? '6' : '');

        $id = Schedule::count() + 1;
        $schedule = Schedule::firstOrCreate([
            'task_id' => $request->task_id, 
        ],[
            'ref_code' => "S" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'task_id' => $request->task_id, 
            'days' => $days,
            'schedule' => $request->schedule,
            'notes' => $request->notes,
            'active' => 1
        ]);

        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules', 'assignments'));
    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
