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
    	if(!$datos->nombre || !$datos->app || !$datos->apm || !$datos->email || !$datos->address || !$datos->pass1 || !$datos->pass2){
            return json_encode(["status"=>"warning", "msj"=>"Debes de completar todos los campos"]);
        }
    	//validation email
    	$datos->validate([
    		'email' => "required|email"
    	]);

    	//email is not in BD
    	$usuario = Usuario::where('correo', $datos->email)->first();

    	if($usuario)
    		return json_encode(["status"=>"error", "msj"=>"El correo ya esta registrado"]);

    	//password validate
    	$pass1 = $datos->pass1;
    	$pass2 = $datos->pass2;

    	if($pass1 != $pass2)
    		return json_encode(["status"=>"error", "msj"=>"Las contraseñas no coinciden"]);

        //crate a new user
        $usuario = new Usuario();
        $usuario->nombre = $datos->nombre;
        $usuario->apellido_pat = $datos->app;
        $usuario->apellido_mat = $datos->apm;
        $usuario->direccion = $datos->address;
        $usuario->avatar = "default.png";
        $usuario->correo = $datos->email;
        $usuario->password = bcrypt($pass1);
        $usuarioOk = $usuario->save();

       if($usuarioOk){
            return json_encode(['status'=>'success', 'msj'=>"¡Felicidades acabas de registrarte correctamente!"]);
       }
    }
}
