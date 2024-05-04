<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\reclamController;
use App\Http\Controllers\servicesController;

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


// user routes
Route::get('/add', [UserController::class, "Correcthomepage"]);
Route::post('/login', [UserController::class, "login"]);
Route::get('/login', [UserController::class, "loggedIN"])->name('logedIn');
Route::post('/register', [UserController::class, "register"]);
Route::get('/logout', [UserController::class, "logout"]);

//services routes
Route::get('/services', [servicesController::class, "services"]);


// reclamation routes
Route::get('/reclamer', [reclamController::class, "Reclamation"]);
Route::post('/reclamer', [reclamController::class, "storeReclamation"]);
Route::get('/reclamList', [reclamController::class, "show"]);
//Route::get('/reclamer', [reclamController::class, "StoreReclamation"]);

Route::get('/admin', [AdminController::class, "administration"]);
Route::get('/update/{id}', [AdminController::class, "update"]);
Route::get('/admin', [UserController::class, "show"]);
Route::get('/', [AdminController::class, "home"]);
