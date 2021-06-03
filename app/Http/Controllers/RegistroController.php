<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registro(){
    	return view('registro');
    }

    public function signup(Request $datos)
    {
    	if($datos->nombre || $datos->app || $datos->apm || $datos->email || $datos->direccion || $datos->pass1 || $datos->pass1)
    		return view('registro', ["status"=>"warning", "msj"=>"Debes de completar todos los campos"]);
    }
}
