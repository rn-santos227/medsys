<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if (Auth::check()) {
		return redirect('/home');
	} else {
		return view('auth.login');
	}
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::get('/schedule', 'App\Http\Controllers\ScheduleController@index')->name('schedule');

Route::get('/dispensers', 'App\Http\Controllers\DispenserController@index')->name('dispensers');

Route::get('/records', 'App\Http\Controllers\PatientRecordController@index')->name('records');

Route::get('/assignments', 'App\Http\Controllers\TaskAssignmentController@index')->name('assignments');

Route::get('/nurses', 'App\Http\Controllers\NurseController@index')->name('nurses');
Route::post('/nurses/create', 'App\Http\Controllers\NurseController@create')->name('nurses_create');


Route::get('/patients', 'App\Http\Controllers\PatientController@index')->name('patients');

Route::get('/medicines', 'App\Http\Controllers\MedicineController@index')->name('medicines');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

