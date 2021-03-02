<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
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
    return view('welcome');
});

Route::get('Login/authenticate', function () {
    return app()->make('App\Http\Controllers\\Login')->authenticate();
});
Route::get('EmployeeList/get', function () {
    return app()->make('App\Http\Controllers\\EmployeeList')->get();
});


