<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::orderBy('created_at', 'DESC')->get();
        return view('inicio', ['peliculas'=>$peliculas]);
    }

    public function verPelicula($id)
    {
        $pelicula = Pelicula::where('idpelicula', $id)->first();

        return view('ver-pelicula', ['pelicula'=>$pelicula]);
    }
}
