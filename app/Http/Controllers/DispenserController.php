<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\Models\Medicine;

use App\Http\Requests\DispenserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DispenserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    public function update(DispenserRequest $request) {
        $validated = $request->validated();
        $dispenser = Dispenser::findOrFail($request->id);

        $dispenser->update([
            'name' => $request->name,
            'medicine_id' => $request->medicine_id, 
            'capacity' => $request->capacity,
            'ceiling' => $request->ceiling,
            'critical' => $request->critical,
            'notes' => $request->notes
        ]);

        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    public function maintenance(Request $request) {
        $dispenser = Dispenser::findOrFail($request->id);
        $dispenser->update([
            'maintenance' => $request->has('maintenance') ? 0 : 1 
        ]); 
        
        $dispensers = Dispenser::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('dispensers.index', compact('dispensers', 'medicines'));
    }

    public function door() {
        shell_exec("python /home/pi/door-relay.py 2>&1");
        return response()->json([
            'status' => 'okay',
        ]);
    }

    public function relay(Request $request) {
        $user = Auth::user();
        $id = $request->id;

        $dispenser = Dispenser::findOrFail($request->id);
        $quantity = $dispenser->quantity;
        if($quantity > 0) {
            shell_exec("python /home/pi/test-relay".$id.".py 2>&1");
            $dispenser->update([
                'quantity' => $quantity - 1,
                'answered' => 1
            ]);
        }

        return response()->json([
            'status' => 'okay',
        ]);
    }
}
