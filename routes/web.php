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
Route::get('/add', [UserController::class, "Correcthomepage"])->name('login');
Route::post('/login', [UserController::class, "login"]);
Route::get('/', [UserController::class, "loggedIN"])->name('logedIn');
Route::post('/register', [UserController::class, "register"]);
Route::get('/logout', [UserController::class, "logout"]);

//services routes
Route::get('/services', [servicesController::class, "services"]);
Route::get('/ajoutSer', [servicesController::class, "ajoutSer"]);
Route::post('/ajouter', [servicesController::class, "ajouter"]);



// reclamation routes
Route::get('/reclamer', [reclamController::class, "Reclamation"]);
Route::post('/reclamer', [reclamController::class, "storeReclamation"]);
Route::get('/reclamList/{user:username}', [reclamController::class, "show"])->middleware('auth');
Route::get('/Details/{post}', [reclamController::class, "details"])->middleware('auth');
Route::get('/Details/{post}', [reclamController::class, "details"])->middleware('auth');
Route::delete('/Details/{post}', [reclamController::class, "delete"]);
Route::get('/Details/{post}/edit', [reclamController::class, "showEditForme"]);
Route::put('/Details/{post}', [reclamController::class, "Updated"]);
//Route::get('/reclamer', [reclamController::class, "StoreReclamation"]);

//admin routes
Route::get('/admin', [AdminController::class, "administration"])->middleware('auth');
Route::get('/update/{id}', [AdminController::class, "update"]);
Route::post('/update/{id}', [AdminController::class, "update_user"]);
Route::delete('/admin/{user}', [AdminController::class, "delete"]);
Route::get('/admin', [AdminController::class, "show"])->middleware('auth');
Route::get('/home', [AdminController::class, "home"])->middleware('auth');
