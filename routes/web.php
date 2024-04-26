<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\reclamController;

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

Route::get('/test', function () {
    return view('test');
});
Route::get('/moud', function (Request $request) {
    return [
        "name" => $request-->url(),
        "article" => "article1"
    ];
});
// user routes
Route::get('/add', [UserController::class, "Correcthomepage"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);

// reclamation routes
Route::get('/reclamer', [reclamController::class, "Reclamation"]);
//Route::get('/reclamer', [reclamController::class, "StoreReclamation"]);

Route::get('/admin', [AdminController::class, "administration"]);
Route::get('/admin', [UserController::class, "show"]);
Route::get('/', [AdminController::class, "home"]);
