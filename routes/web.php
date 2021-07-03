<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PeliculaController;
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
    //profile routes
    Route::get('/perfil', [UsuarioController::class, 'profile'])->name('user.profile');
    Route::get('/mis-tarjetas', [UsuarioController::class, 'profile'])->name('user.myCards');
    Route::get('/mis-perfiles', [UsuarioController::class, 'profile'])->name('user.myProfiles');
    Route::get('/mis-peliculas', [UsuarioController::class, 'profile'])->name('user.myMovies');

    Route::get('/ver-pelicula/{id}', [InicioController::class, 'verPelicula'])->name('user.watchMovie');
});

//Rutas
//login Admin -
Route::get('/Uptflix/login/admin',[AdministradorController::class,'vistaLogin'])->name('loginAdminView');
Route::post('/Uptflix/login/admin',[AdministradorController::class,'verificarLogin'])->name('loginAdmin');
//signin Admin
Route::get('/Uptflix/signin/admin',[AdministradorController::class,'vistaRegistrase'])->name('signinAdminView');
Route::post('/signinAdmin',[AdministradorController::class,'verificarAdmin'])->name('signinAdmin');
//cerrar sesion
Route::get('/Uptflix/logout/admin',[AdministradorController::class,'logout'])->name('logoutAdmin');
//Rutas administrador
Route::prefix('/admin')->middleware('verificarAdministrador')->group(function(){
    //Datos de administrador
    Route::get("/perfil",[AdministradorController::class,'perfilView'])->name('admin.Perfil'); 
    Route::get("/perfil/editar",[AdministradorController::class,'editarView'])->name('perfil.editar.view'); 
    Route::post("/perfil/editar",[AdministradorController::class,'editarForm'])->name('perfil.editar.form'); 
    //Vistas
    Route::get("/inicio",[AdministradorController::class,'vistaInicio'])->name('admin.inicio');
    Route::get("/peliculas",[PeliculaController::class,'peliculasViewAdmin'])->name('admin.peliculas');
    Route::get("/peliculas/agregar",[PeliculaController::class,'agregarPeliculaView'])->name('agregar.pelicula.view');
    Route::post("/peliculas/agregar",[PeliculaController::class,'agregarPelicula'])->name('agregar.pelicula.form');
    Route::get("/peliculas/eliminar/{id?}",[PeliculaController::class,'eliminarPelicula'])->name('eliminar.pelicula');
    Route::get("/peliculas/editar/{id?}",[PeliculaController::class,'editarPeliculaView'])->name('editar.pelicula.view');
    Route::post("/peliculas/editar/{id?}",[PeliculaController::class,'editarPelicula'])->name('editar.pelicula.form');
});

