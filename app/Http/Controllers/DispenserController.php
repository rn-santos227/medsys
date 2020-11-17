<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\Models\Medicine;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Requests\DispenserRequest;
use Illuminate\Http\Request;

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

    public function relay(Request $request) {
        $id = $request->id;

        $process = new Process(['python', 'home/pi/test-relay.py']);
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json([
            'status' => $process->getOutput(),
        ]);
    }
}
