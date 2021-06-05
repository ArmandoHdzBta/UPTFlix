<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroController extends Controller
{
    public function registro(){
    	return view('registro');
    }

    public function signup(Request $datos)
    {
    	//validation empy inputs
    	if(!$datos->nombre || !$datos->app || !$datos->apm || !$datos->email || !$datos->address || !$datos->pass1 || !$datos->pass2)
    		return view('registro', ["status"=>"warning", "msj"=>"Debes de completar todos los campos"]);
    	//validation email
    	$datos->validate([
    		'email' => "required|email"
    	]);

    	//email is not in BD
    	$usuario = Usuario::where('correo', $datos->email);
    }
}
