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

//Code for checking user is login in to the system.
Route::get('/', function () {
	if (Auth::check()) {
		return redirect('/home');
	} else {
		return view('auth.login');
	}
});

//Authentifying Routes.
Auth::routes();

//URL link assigned to kiosk.
Route::get('/kiosk', 'App\Http\Controllers\KioskController@index')->name('kiosk');
//URL link assigned to dashboard
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

//URL links for creating, reading, updeting, deleting schedules.
Route::get('/schedule', 'App\Http\Controllers\ScheduleController@index')->name('schedule');
Route::post('/schedule/create', 'App\Http\Controllers\ScheduleController@create')->name('schedule_create');
Route::post('/schedule/update', 'App\Http\Controllers\ScheduleController@update')->name('schedule_update');
Route::post('/schedule/delete', 'App\Http\Controllers\ScheduleController@delete')->name('schedule_delete');

//URL links for maintaining dispensers.
Route::get('/dispensers', 'App\Http\Controllers\DispenserController@index')->name('dispensers');
Route::get('/dispensers/door', 'App\Http\Controllers\DispenserController@door')->name('dispenser_door');
Route::post('/dispensers/update', 'App\Http\Controllers\DispenserController@update')->name('dispensers_update');
Route::post('/dispensers/maintenance', 'App\Http\Controllers\DispenserController@maintenance')->name('dispensers_maintenance');
Route::post('/dispensers/relay', 'App\Http\Controllers\DispenserController@relay')->name('dispenser_relay');

Route::get('/records', 'App\Http\Controllers\PatientRecordController@index')->name('records');

//URL links for creating, reading, updeting, deleting assignments.
Route::get('/assignments', 'App\Http\Controllers\TaskAssignmentController@index')->name('assignments');
Route::post('/assignments/create', 'App\Http\Controllers\TaskAssignmentController@create')->name('assignments_create');
Route::post('/assignments/update', 'App\Http\Controllers\TaskAssignmentController@update')->name('assignments_update');
Route::post('/assignments/delete', 'App\Http\Controllers\TaskAssignmentController@delete')->name('assignments_delete');

//URL links for creating, reading, updeting, deleting nurses.
Route::get('/nurses', 'App\Http\Controllers\NurseController@index')->name('nurses');
Route::get('/nurses/fingerprint', 'App\Http\Controllers\NurseController@biometric')->name('nurses_biometric');
Route::post('/nurses/create', 'App\Http\Controllers\NurseController@create')->name('nurses_create');
Route::post('/nurses/update', 'App\Http\Controllers\NurseController@update')->name('nurses_update');
Route::post('/nurses/delete', 'App\Http\Controllers\NurseController@delete')->name('nurses_delete');

//URL links for creating, reading, updeting, deleting patients.
Route::get('/patients', 'App\Http\Controllers\PatientController@index')->name('patients');
Route::post('/patients/create', 'App\Http\Controllers\PatientController@create')->name('patients_create');
Route::post('/patients/update', 'App\Http\Controllers\PatientController@update')->name('patients_update');
Route::post('/patients/delete', 'App\Http\Controllers\PatientController@delete')->name('patients_delete');

//URL links for creating, reading, updeting, deleting medicine.
Route::get('/medicines', 'App\Http\Controllers\MedicineController@index')->name('medicines');
Route::post('/medicines/create', 'App\Http\Controllers\MedicineController@create')->name('medicines_create');
Route::post('/medicines/update', 'App\Http\Controllers\MedicineController@update')->name('medicines_update');
Route::post('/medicines/delete', 'App\Http\Controllers\MedicineController@delete')->name('medicines_delete');

//URL links for creating, reading, updeting, deleting users accounts.
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('accounts');
Route::post('/users', 'App\Http\Controllers\UserController@create')->name('accounts_create');
Route::post('/users', 'App\Http\Controllers\UserController@update')->name('accounts_update');
Route::post('/users', 'App\Http\Controllers\UserController@delete')->name('accounts_delete');

//URL test URL for profile.
Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

