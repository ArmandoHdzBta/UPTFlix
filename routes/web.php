<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuarioController;
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


Route::view('/','home')->name('home');

Route::get("/iniciarSesion", [UsuarioController::class, 'iniciarsesion'])->name('iniciarsesion');
Route::post("/iniciarSesion", [UsuarioController::class, 'signin'])->name('signin');

Route::get("/registrarse", [UsuarioController::class, 'registro'])->name("registrarse");
Route::post("/registrarse", [UsuarioController::class, 'signup'])->name("signup");

Route::get('/signout', [UsuarioController::class, 'signout'])->name('signout');

//user verificated
Route::prefix('/user')->middleware('verificarUsuario')->group(function (){
    Route::get("/home", [InicioController::class, 'index'])->name('usuario.home');

    Route::get('/ver-pelicula/{id}', [InicioController::class, 'verPelicula'])->name('user.watchMovie');
});

//Inicio de sesion administrador
Route::get('/Uptflix/login/admin',[AdministradorController::class,'loginView'])->name('loginAdmin');
Route::get('/loginAdmin',[AdministradorController::class,'loginAdmin'])->name('loginAdmin');

