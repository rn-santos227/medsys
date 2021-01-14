<?php

namespace App\Http\Controllers;

//imports all models
use App\Models\Dispenser;
use App\Models\Log;
use App\Models\Medicine;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\PatientRecord;
use App\Models\Schedule;
use App\Models\TaskAssignment;

use Auth;

use App\Http\Requests\DispenserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DispenserController extends Controller
{
    //checks the user if authenticated to use the controller.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //loads the dispenser
    public function index()
    {
        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    //update changes for selected dispenser.
    public function update(DispenserRequest $request) {
        $validated = $request->validated(); //validate if all required fields are filled.
        $dispenser = Dispenser::findOrFail($request->id); //check the dispenser if exists.

        $dispenser->update([ //updates the fillable value of the dispenser.
            'name' => $request->name,
            'medicine_id' => $request->medicine_id, 
            'capacity' => $request->capacity,
            'quantity' => $request->capacity,
            'ceiling' => $request->ceiling,
            'critical' => $request->critical,
            'notes' => $request->notes
        ]);

        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    //toggle maintenance mode of dispenser
    public function maintenance(Request $request) {
        $dispenser = Dispenser::findOrFail($request->id);
        $dispenser->update([
            'maintenance' => $request->has('maintenance') ? 0 : 1 
        ]); 
        
        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    //unlocks the dispenser's door.
    public function door() {
        //run python code that unlocks the dispenser door.
        shell_exec("python /home/pi/door-relay.py 2>&1");
        return response()->json([
            'status' => 'okay',
        ]);
    }

    //recieves relay either manually or through fingerprint.
    public function relay(Request $request) {
        $user = Auth::user();
        $id = $request->id;
        
        $dispenser = Dispenser::findOrFail($request->id);
        $quantity = $dispenser->quantity;
        if($quantity > 0) {
            //if quantity is more than 1 then it will run the corresponding relay.
            shell_exec("python /home/pi/test-relay".$id.".py 2>&1");
            $dispenser->update([
                'quantity' => $quantity - 1,
                'answered' => 1
            ]);
        }

        $dispensers = Dispenser::where('active', 1)->get();

        $nurse_count = Nurse::where('active', 1)->count();
        $medicine_count = Medicine::where('active', 1)->count();      
        $patient_count = Patient::where('active', 1)->count();
        $schedule_count = Schedule::where('active', 1)->count();
        $assignment_count = TaskAssignment::where('active', 1)->count();

        return view('dashboard', compact(
            'dispensers', 'nurse_count', 'medicine_count', 'patient_count', 'schedule_count', 'assignment_count'
        ));
    }
}
