<?php

namespace App\Http\Controllers;

use App\Models\Medicine;

use App\Http\Requests\MedicineRequest;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    //Check if user is authenticated to use the controller.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //loads the page.
    public function index()
    {
        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('medicines.index', compact('medicines'));
    }

    //creates new medicine.
    public function create(MedicineRequest $request) {
        $validated = $request->validated();

        $id = Medicine::count() + 1;
        $medicines = Medicine::firstOrCreate([
            'name' => $request->name, 
            'generic_name' => $request->generic_name,
            'brand' => $request->brand,
        ],[
            'ref_code' => "M" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'name' => $request->name, 
            'generic_name' => $request->generic_name,
            'brand' => $request->brand,
            'measurement' => $request->measurement,
            'expiration' => $request->expiration,
            'active' => 1
        ]);

        $medicines = Medicine::where('active', 1)->get();
        return view('medicines.index', compact(
            'medicines'
        ));
    }

    //updates a medicine.
    public function update(MedicineRequest $request) {
        $validated = $request->validated();
        $medicine = Medicine::findOrFail($request->id);

        $medicine->update([
            'name' => $request->name, 
            'generic_name' => $request->generic_name,
            'brand' => $request->brand,
            'measurement' => $request->measurement,
            'expiration' => $request->expiration,
        ]);

        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('medicines.index', compact('medicines', 'medicines')); 
    }

    //deletes a medicine.
    public function delete(Request $request) {
        $medicine = Medicine::findOrFail($request->id);
        $medicine->update([
            'active' => 0
        ]);

        $medicines = Medicine::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('medicines.index', compact('medicines', 'medicines')); 
    }
}
