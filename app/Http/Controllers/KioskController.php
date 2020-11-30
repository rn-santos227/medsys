<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;

use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function index() {
        $dispensers = Dispenser::where('active', 1)->get();
        $temp = shell_exec("python /home/pi/temp.py 2>&1");
        return view('kiosk.index', compact(
            'dispensers', 'temp'
        ));
    }
}
