<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;

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

Route::view('/home', 'home')->middleware('auth');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');

// Department Resource
Route::get('/depart/{id}/delete', 'App\Http\Controllers\DepartmentController@destroy');
Route::resource('/depart', 'App\Http\Controllers\DepartmentController');

// Designation Resource
Route::get('/designation/{id}/delete', 'App\Http\Controllers\DesignationController@destroy');
Route::resource('/designation', 'App\Http\Controllers\DesignationController');

// Employee Resource
Route::get('/employee/{id}/delete', 'App\Http\Controllers\EmployeeController@destroy');
Route::resource('/employee', 'App\Http\Controllers\EmployeeController');

