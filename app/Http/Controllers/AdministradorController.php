<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdministradorController extends Controller
{
 
    public function vistaLogin()
    {
        return view("administrador.loginAdministrador");
    }
    //Verificar login
    public function verificarLogin(Request $datos)
    {
        /*if(isset($datos))
            return json_encode(["estatus" => "pruebas","mensaje" => "Si pasan"]);*/
        $administrador = Administrador::where("correo",$datos->correo)->first();

        if(!$administrador)
            //return json_encode(["estatus" => "correo","mensaje" => "Correo no encotrado"]);
            return view("administrador.loginAdministrador",["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);

        if(!Hash::check($datos->password,$administrador->password))
            //return json_encode(["estatus" => "password","mensaje" => "Contraseña incorrecta"]);
            return view("administrador.loginAdministrador",["estatus"=> "error", "mensaje"=> "Contraseña incorrecta!"]);

            Session::put('admin',$administrador); 
            

            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                //return json_encode(["estatus" => "success","mensaje" => "Sesion iniciada"]);
                return redirect()->route('admin.inicio');
               
            }
    }

    //Signin admin- Vista registrarse administrador
    public function vistaRegistrase()
    {
        return view("administrador.registrarseAdministrador");
    }
    //Verificar Signin
    public function verificarAdmin(Request $datos)
    {

        //Esta funcion informa que faltan datos por llenar
        if(!$datos->nombre || !$datos->apellidoP || !$datos->apellidoM || !$datos->correo || !$datos->password || !$datos->password2)
            return json_encode(["estatus"=>"warning", "mensaje"=>"Faltan datos, revisa los campos"]);

        //Se verifica que si sea un correo el correo ingresado

        //validation email
        $datos->validate([
            'correo' => "required|email"
        ]);


        //Esta funcion se encarga de revisar si el correo no esta registrado
        $usuario = Administrador::where('correo',$datos->correo)->first();
        if($usuario)
            return json_encode(["estatus"=>"email", "mensaje"=>"El correo ya existe elige otro"]);

        //Verificar contraseña
        //Esta funcion se encarga de verificar que la contraseña tenga mas de 8 caracyeres y menos de 32
        if(strlen($datos->password) < 8){
            return json_encode(["estatus"=>"password", "mensaje"=>"Contraseña minimo de 8 caracteres"]);
          }
        if(strlen($datos->password) > 32){
            return json_encode(["estatus"=>"password", "mensaje"=>"Contraseña maximo de 9 caracteres"]);
         }
        //Estanciar valores
        $nombre = $datos->nombre;
        $apellidoP = $datos->apellidoP;
        $apellidoM = $datos->apellidoM;
        $correo = $datos->correo;
        $password1 = $datos->password;
        $password2 = $datos->password2;

        //Verificar imagen
        
        //Verificar imagen

        //Comprobar si las contraseñas son iguales
        if($password1 != $password2)
            return json_encode(["estatus"=>"password", "mensaje"=>"Las contraseñas no son iguales"]);

        //
        $administrador = new Administrador();
        $administrador->nombre = $nombre;
        $administrador->apellido_pat = $apellidoP;
        $administrador->apellido_mat = $apellidoM;
        $administrador->correo = $correo;
        $administrador->avatar = "";
        $administrador->password = bcrypt($password1);
        $administrador->save();
        return json_encode(["estatus"=>"success", "mensaje"=>"Se ha registrado como Admin"]);
    }

    public function logout()
    {
        if(Session::has('admin'))
            Session::forget('admin');
        //Retornar a vista login
        return redirect()->route('loginAdminView');

    }

    public function vistaInicio()
    {
        return view("administrador.inicioAdmin");
    }
}
