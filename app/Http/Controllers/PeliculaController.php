<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    //Esta vista muestra las peliculas desde la perspectiva del admin
    public function peliculasViewAdmin()
    {
        $peliculas = Pelicula::where('estatus',"enable")->get();
        if(!$peliculas)
        {
            $mensaje = "No hay peliculas disponibles";
            return view("administrador.peliculas.peliculas",["mensaje"=>$mensaje]);

        }else{
            return view("administrador.peliculas.peliculas",["peliculas"=>$peliculas]);
        }

    }
    //Registrar vista
    public function agregarPeliculaView()
    {
        return view("administrador.peliculas.agregarPelicula");
    }
    //Esta  funcion registra las peliculas
    public function agregarPelicula(Request $request)
    {
        $request->validate([
            'titulo'=>'required|min:4|max:32|',
            'categoria'=>'required',
            'sipnosis'=>'required|max:450',
            'hora'=>'required',
            'minutos'=>'required',
            'imagen'=>'required|image|mimes:jpeg,png|max:4096'
        ]);

        $imagen = $request->file('imagen')->store('public/imagenes/peliculas');
        $url = storage::url($imagen);

        $duracion = $request->hora.':'.$request->minutos.':'.'00';
        
        $peliculas = new Pelicula();
        $peliculas->titulo = $request->titulo;
        $peliculas->categoria = $request->categoria;
        $peliculas->sinopsis = $request->sipnosis;
        $peliculas->time = $duracion;
        $peliculas->cover = $url;
        $peliculas->estatus = "enable";
        $peliculas->idAdministrador =  session('admin')->idadministrador;
        $peliculas->save();
        return redirect()->route('admin.peliculas');

    }
    //Esta funcion edita las peliculas
    public function editarPeliculaView($id)
    {
        $pelicula = Pelicula::find($id);
        return view('administrador.peliculas.editarPelicula',["pelicula"=>$pelicula]);
    }
    //Esta funcion edita las peliculas
    public function editarPelicula($id, Request $request)
    {
        $request->validate([
            'titulo'=>'max:22',
            'sipnosis'=>'max:500',
            'imagen'=>'image|mimes:jpeg,png|max:4096'
        ]);
        //Duracion
        $duracion = 0;
        if($request->hora || $request->minutos )
        {
            $duracion = $request->hora.':'.$request->minutos.':'.'00';
        }else{
            $duracion = $request->duracion;
        }
        //Imagen
        $url = "";
        if($request->imagen)
        {
            $imagen = $request->file('imagen')->store('public/imagenes/peliculas');
            $url = storage::url($imagen);
        }else{
            $url = $request->cover;
        }
        $pelicula = Pelicula::find($id);
        $pelicula->titulo = $request->titulo;
        $pelicula->categoria = $request->categoria;
        $pelicula->sinopsis = $request->sipnosis;
        $pelicula->time = $duracion;
        $pelicula->cover = $url;
        $pelicula->estatus = "enable";
        $pelicula->idAdministrador =  session('admin')->idadministrador;
        $pelicula->update();
        return redirect()->route('admin.peliculas');

    }
    //Esta funcion elimina las peliculas
    public function eliminarPelicula($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->estatus = "disable";
        $pelicula->update();
        return redirect()->route('admin.peliculas');
    }
}
