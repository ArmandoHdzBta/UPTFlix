<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    //Esta vista muestra las peliculas desde la perspectiva del admin
    public function peliculasViewAdmin()
    {
        $peliculas = Pelicula::get();
        return view("administrador.peliculas.peliculas",["peliculas"=>$peliculas]);
    }
    //Esta  funcion registra las peliculas
    public function registrarPelicula()
    {
        # code...
    }
    //Esta funcion edita las peliculas
    public function editarPelicula()
    {
        # code...
    }
    //Esta funcion elimina las peliculas
    public function deletePelicula()
    {
        # code...
    }
    //Esta vista muestra las peliculas desde la perspectiva del admin
    public function peliculasList()
    {
        return view("administrador.peliculas.peliculasList");
    }
    //Esta funcion muestra las categorias de las peliculas
    public function categoriasView()
    {
        return view("administrador.peliculas.categoriaView");
    }
    //Esta funcion las peliculas de una misma categorias
    public function categoriasPelicula()
    {
        return view("administrador.peliculas.categoriaPeliculas");
    }
}
