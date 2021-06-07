<?php

use App\Http\Controllers\IniciarSesionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistroController;
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

/*Route::get('/', function () {
    return view('home');
});*/

Route::view('/','home')->name('home');

Route::get("/iniciarSesion", [IniciarSesionController::class, 'iniciarsesion'])->name('iniciarsesion');
Route::post("/iniciarSesion", [IniciarSesionController::class, 'signin'])->name('signin');

Route::get("/registrarse", [RegistroController::class, 'registro'])->name("registrarse");
Route::post("/registrarse", [RegistroController::class, 'signup'])->name("signup");

Route::get("/home", [InicioController::class, 'index'])->name('usuario.home');