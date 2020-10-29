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
Route::post('/dispensers/update', 'App\Http\Controllers\DispenserController@update')->name('dispensers_update');
Route::post('/dispensers/maintenance', 'App\Http\Controllers\DispenserController@maintenance')->name('dispensers_maintenance');

Route::get('/records', 'App\Http\Controllers\PatientRecordController@index')->name('records');

Route::get('/assignments', 'App\Http\Controllers\TaskAssignmentController@index')->name('assignments');

Route::get('/nurses', 'App\Http\Controllers\NurseController@index')->name('nurses');
Route::post('/nurses/create', 'App\Http\Controllers\NurseController@create')->name('nurses_create');
Route::post('/nurses/update', 'App\Http\Controllers\NurseController@update')->name('nurses_update');
Route::post('/nurses/delete', 'App\Http\Controllers\NurseController@delete')->name('nurses_delete');

Route::get('/patients', 'App\Http\Controllers\PatientController@index')->name('patients');
Route::post('/patients/create', 'App\Http\Controllers\PatientController@create')->name('patients_create');
Route::post('/patients/update', 'App\Http\Controllers\PatientController@update')->name('patients_update');
Route::post('/patients/delete', 'App\Http\Controllers\PatientController@delete')->name('patients_delete');

Route::get('/medicines', 'App\Http\Controllers\MedicineController@index')->name('medicines');
Route::post('/medicines/create', 'App\Http\Controllers\MedicineController@create')->name('medicines_create');
Route::post('/medicines/update', 'App\Http\Controllers\MedicineController@update')->name('medicines_update');
Route::post('/medicines/delete', 'App\Http\Controllers\MedicineController@delete')->name('medicines_delete');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

