<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\DataTables\NurseDataTable;

use Illuminate\Http\Request;


class NurseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(NurseDataTable $dataTable)
    {
        return $dataTable->render('nurses.index');
    }

    public function create(Request $request) {

    }

    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }
}
