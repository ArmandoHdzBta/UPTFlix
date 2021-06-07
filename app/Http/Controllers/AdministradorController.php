<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller
{
    //vista login
    public function loginView()
    {
        return view("administrador.loginAdministrador");
    }
    //Verificar login
    public function verificarLogin(Request $datos)
    {
        $administrador = Administrador::where("correo",$datos->correo)->first();
        if(!$administrador)
            return response()->json(["estatus" => "correo","mensaje" => "Correo incorrecto"]);

        if(!Hash::check($datos->password,$administrador->password))
            return response()->json(["estatus" => "password","mensaje" => "Contraseña incorrecta"]);

        Session::put('usuario',$administrador);

        /*if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.menu');
        }*/
    }
    //Registar admin
    public function registrarseAdmin()
    {
        return view("administrador.registrarseAdministrador");
    }
    //Verificar login
    public function verificarRegistro(Request $datos)
    {
        $administrador = Administrador::where("correo",$datos->correo)->first();
        if(!$administrador)
            return response()->json(["estatus" => "correo","mensaje" => "Correo incorrecto"]);

        if(!Hash::check($datos->password,$administrador->password))
            return response()->json(["estatus" => "password","mensaje" => "Contraseña incorrecta"]);

        Session::put('usuario',$administrador);

        /*if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.menu');
        }*/
    }
}
