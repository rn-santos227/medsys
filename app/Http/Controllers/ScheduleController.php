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
        ($request->has('sun') ? '0' : '') . 
        ($request->has('mon') ? '1' : '') .
        ($request->has('tue') ? '2' : '') .
        ($request->has('wed') ? '3' : '') .
        ($request->has('thu') ? '4' : '') . 
        ($request->has('fri') ? '5' : '') . 
        ($request->has('sat') ? '6' : '');

        $id = Schedule::count() + 1;
        $schedule = Schedule::firstOrCreate([
            'task_id' => $request->task_id, 
            'schedule' => $request->schedule
        ],[
            'ref_code' => "S" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'task_id' => $request->task_id, 
            'days' => $days,
            'schedule' => $request->schedule,
            'notes' => $request->notes,
            'answered' => 0,
            'sent_count' => 0,
            'active' => 1
        ]);

        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules', 'assignments'));
    }

    public function update(ScheduleRequest $request) {
        $validated = $request->validated();
        $days = 
        ($request->has('sun') ? '0' : '') . 
        ($request->has('mon') ? '1' : '') .
        ($request->has('tue') ? '2' : '') .
        ($request->has('wed') ? '3' : '') .
        ($request->has('thu') ? '4' : '') . 
        ($request->has('fri') ? '5' : '') . 
        ($request->has('sat') ? '6' : '');

        $schedule = Schedule::findOrFail($request->id);
        $schedule->update([
            'task_id' => $request->task_id, 
            'days' => $days,
            'schedule' => $request->schedule,
            'notes' => $request->notes,
            'answered' => 0,
            'sent_count' => 0,
        ]);

        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules', 'assignments'));
    }

    public function delete(Request $request) {
        $schedules = Schedule::findOrFail($request->id);
        $schedules->update([
            'active' => 0
        ]);

        $assignments = TaskAssignment::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $schedules = Schedule::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('schedule.index', compact('schedules', 'assignments'));
    }
}
