<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\reclamController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\TechnicienController;
;

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
Route::get('/profile', [UserController::class, "profile"]);
Route::post('/profile/update/telephone', [UserController::class, 'updateTelephone'])->name('profile.update.telephone');
Route::post('/profile/update/password', [UserController::class, 'updatePassword'])->name('profile.update.password');

//services routes
Route::get('/services', [servicesController::class, "services"])->middleware('can:AdminPages');
Route::get('/ajoutSer', [servicesController::class, "ajoutSer"]);
Route::post('/ajouter', [servicesController::class, "ajouter"]);
Route::delete('/services/{id}', [servicesController::class, "delete"]);




// reclamation routes
Route::get('/reclamer', [reclamController::class, "Reclamation"]);
Route::post('/reclamer', [reclamController::class, "storeReclamation"]);
Route::get('/reclamList/{user:username}', [reclamController::class, "show"])->middleware('auth');
Route::get('/Details/{post}', [reclamController::class, "details"])->middleware('auth');
Route::delete('/Details/{post}', [reclamController::class, "delete"]);
Route::get('/Details/{post}/edit', [reclamController::class, "showEditForme"]);
Route::put('/Details/{post}', [reclamController::class, "Updated"]);

Route::put('/reclamation/{id}', [ReclamController::class, 'assignEngineer'])->name('reclamation.assignEngineer')->middleware('auth');



//admin routes
// Route::get('/admin', [AdminController::class, "administration"])->middleware('can:AdminPages');
Route::get('/update/{id}', [AdminController::class, "update"]);
Route::post('/update/{id}', [AdminController::class, "update_user"]);
Route::delete('/admin/{user}', [AdminController::class, "delete"])->middleware('can:AdminPages');
Route::get('/admin', [AdminController::class, "show"])->middleware('auth')->middleware('can:AdminPages');
Route::get('/home/{user:username}', [AdminController::class, "home"])->middleware('auth');

//technicien routes
Route::get('/TecPage', [TechnicienController::class, "showTecPage"])->middleware('auth')->middleware('can:TecPages');
Route::put('/changeStatus/{id}', [TechnicienController::class, "updateStatus"])->middleware('auth')    ;

//engineer routes
Route::get('/engineer/reclamations', [EngineerController::class, 'index'])->name('engineer.reclamations')->middleware('auth');

