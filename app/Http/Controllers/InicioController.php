<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Usuario;
use App\Models\UsuarioPelicula;
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
        //verificar si la pelicula va a ver no la ah visto antes
        $usuarioPelicula = UsuarioPelicula::where('idusuario', session('usuario')->idusuario)
                                        ->where('idpelicula', $id)
                                        ->first();
        if(!$usuarioPelicula)
        {
            $usuarioPelicula = new UsuarioPelicula();
            $usuarioPelicula->idusuario = session('usuario')->idusuario;
            $usuarioPelicula->idpelicula = $id;
            $usuarioPelicula->tiempoVisualizacion = 20;
            $usuarioPelicula->save();
        }


        $pelicula = Pelicula::where('idpelicula', $id)->first();

        return view('ver-pelicula', ['pelicula'=>$pelicula]);
    }
}
