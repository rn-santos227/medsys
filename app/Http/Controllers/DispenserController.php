<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\DataTables\DispenserDataTable;

use Illuminate\Http\Request;

class DispenserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DispenserDataTable $dataTable)
    {
        return $dataTable->render('dispensers.index');
    }

    public function update(Request $request) {
        $validated = $request->validated();
    }

    public function delete(Request $request) {

    }
}
