<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('accounts.index', compact('users'));
    }

    public function create(UserRequest $request) {
        $validated = $request->validated();

        $user = User::firstOrCreate([
            'email' => $request->email
        ],[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'active' => 1
        ]);

        $users = User::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('accounts.index', compact('users'));
    }

    public function update(UserRequest $request) {
        
        $users = User::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('accounts.index', compact('users'));
    }

    public function delete(Request $request) {
        $user = User::findOrFail($request->id);
        $user->update([
            'active' => 0
        ]);
 
        $users = User::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('accounts.index', compact('users'));
    }
}
