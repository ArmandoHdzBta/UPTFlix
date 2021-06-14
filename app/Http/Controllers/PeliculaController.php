<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function peliculasViewAdmin()
    {
        return view("administrador.peliculas");
    }

    public function peliculasList()
    {
        return view("administrador.peliculasList");
    }
}
