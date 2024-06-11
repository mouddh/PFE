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
Route::get('/profile', [UserController::class, "profile"])->middleware('auth');
Route::post('/profile/update/telephone', [UserController::class, 'updateTelephone'])->name('profile.update.telephone');
Route::post('/profile/update/password', [UserController::class, 'updatePassword'])->name('profile.update.password');


//services routes
Route::get('/services', [servicesController::class, "services"])->middleware('can:AdminPages');
Route::get('/ajoutSer', [servicesController::class, "ajoutSer"]);
Route::post('/ajouter', [servicesController::class, "ajouter"]);
Route::delete('/services/{id}', [servicesController::class, "delete"]);




// reclamation routes
Route::get('/reclamer', [reclamController::class, "Reclamation"])->middleware('auth');
Route::post('/reclamer', [reclamController::class, "storeReclamation"])->middleware('auth');
Route::get('/reclamList/{user:username}', [reclamController::class, "show"])->middleware('auth');
Route::get('/Details/{post}', [reclamController::class, "details"])->middleware('auth');
Route::delete('/Details/{post}', [reclamController::class, "delete"])->middleware('auth');
Route::get('/Details/{post}/edit', [reclamController::class, "showEditForme"])->middleware('auth');
Route::put('/Details/{post}', [reclamController::class, "Updated"])->middleware('auth');

Route::put('/reclamation/{id}', [ReclamController::class, 'assignEngineer'])->name('reclamation.assignEngineer')->middleware('auth');



//admin routes
// Route::get('/admin', [AdminController::class, "administration"])->middleware('can:AdminPages');
Route::get('/update/{id}', [AdminController::class, "update"])->middleware('can:AdminPages');
Route::post('/update/{id}', [AdminController::class, "update_user"])->middleware('can:AdminPages');
Route::delete('/admin/{user}', [AdminController::class, "delete"])->middleware('can:AdminPages');
Route::get('/admin', [AdminController::class, "show"])->middleware('auth')->middleware('can:AdminPages');
Route::get('/home/{user:username}', [AdminController::class, "home"])->middleware('auth');


//technicien routes
Route::get('/TecPage', [TechnicienController::class, "showTecPage"])->middleware('auth')->middleware('can:TecPages');
Route::put('/changeStatus/{id}', [TechnicienController::class, "updateStatus"])->middleware('auth')    ;

//engineer routes
Route::get('/engineer/reclamations', [EngineerController::class, 'index'])->name('engineer.reclamations')->middleware('auth');
Route::put('/reject/{id}', [reclamController::class, 'rejectReclamation'])->name('reclamation.reject');

