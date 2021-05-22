<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\ClientController;

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
	if(session()->has("user")) {
		session()->forget('user');
		session()->flush();
	}

	return view('login');
});

Route::post("user", [UserAuth::class, "userLogin"]);

Route::view("login", "login");

Route::view("home", "home")->middleware('sessionExists');


// Client Routes
Route::get("client", [ClientController::class, "clients"])->middleware('sessionExists');
Route::post("newClient", [ClientController::class, 'postClient'])->middleware('sessionExists');
Route::post("editClient", [ClientController::class, 'editClient'])->middleware('sessionExists');
Route::delete("/deleteClient/{pid}", [ClientController::class, 'deleteClient']);

// Manager Routes
Route::view("manager", "manager");

// Employee Routes
Route::view("employee", "employee");

// Intervention Routes
Route::view("intervention", "intervention");