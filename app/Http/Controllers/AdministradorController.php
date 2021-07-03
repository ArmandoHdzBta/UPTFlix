<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Pelicula;
use Dotenv\Exception\ValidationException;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class AdministradorController extends Controller
{
 
    public function vistaLogin()
    {
        return view("administrador.loginAdministrador");
    }
    //Verificar login
    public function verificarLogin(Request $request)
    {
        //Se validan que se recivan datos
        $request->validate([
            'correo'=>'required|email',
            'password'=>'required|min:6|max:32'
        ]);
        //Se verifica si existe alguna cuenta con este correo
        $administrador = Administrador::where("correo",$request->correo)->first();
        if(!$administrador)
            throw ValidationValidationException::withMessages([
            'correo' => __('auth.fallo')
        ]);
        //Se comprueba que la contraseña coincida con la del correo
        if(!Hash::check( $request->password,$administrador->password))
            throw ValidationValidationException::withMessages([
                 'password' => __('auth.password')
            ]);
            
            //Se creea la sesion
            Session::put('admin',$administrador); 
            
            //Esta funcion redirecciona a la siguiente vista
            if(isset($request->url)){
                $url = decrypt($request->url);
                return redirect($url);
            }else{
                return redirect()->route('admin.inicio');
            }
    }

    //Signin admin- Vista registrarse administrador
    public function editarView()
    {
        return view("administrador.editarPerfil");
    }
    //Verificar Signin
    public function editarForm(Request $request)
    {
        
        $request->validate([
            'nombre' => 'max:16',
            'apellidoP' => 'max:16',
            'apellidoM' => 'max:16',
            'correo' => 'email|max:32',
            'password' => 'max:32',
            'avatar' => 'image|mimes:jpeg,png|max:4096',
            'password1' => 'required|max:32',
            'password2' => 'required|max:32'
        ]);

    
        //Esta funcion se encarga de revisar si el correo no esta registrado
        if($request->correo != session('admin')->correo){
            $usuario = Administrador::where('correo',$request->correo)->first();
            if($usuario)
                throw ValidationValidationException::withMessages([
                     'correo' => __('auth.email')
                ]);
        }
       
        //Comprobar si las contraseñas son iguales
        if($request->password1 != $request->password2)
            throw ValidationValidationException::withMessages([
                'password1' => __('auth.contrasena')
            ]);
            
        //Se comprueba que la contraseña coincida con la del correo en la base de datos
        $datosP = Administrador::where('correo',session('admin')->correo)->first();
       
        if(!Hash::check($request->password1,$datosP->password))
            throw ValidationValidationException::withMessages([
                 'password1' => __('auth.error01')
            ]);
        
        //Validar imagen
        //Imagen
        $url = "";
        if($request->avatar)
        {
            $imagen = $request->file('avatar')->store('public/imagenes/perfil');
            $url = Storage::url($imagen);
        }else{
            $url = $request->cover;
        }
        //
        //Password
        $pass = "";
        if($request->password){
            $pass = bcrypt($request->password); 
        }else{
            $pass =  session('admin')->password;
        }
        //
        $datos = Administrador::find( session('admin')->idadministrador);
        $datos->nombre = $request->nombre;
        $datos->apellido_pat = $request->apellidoP;
        $datos->apellido_mat = $request->apellidoM;
        $datos->correo = $request->correo;
        $datos->avatar = $url;
        $datos->password =$pass;
        $datos->save();
        //Actualizar datos de la sesion
        session('admin')->nombre = $request->nombre;
        session('admin')->apellido_pat = $request->apellidoP;
        session('admin')->apellido_mat = $request->apellidoM;
        session('admin')->correo = $request->correo;
        session('admin')->avatar = $url;
        session('admin')->password = $pass;
        $datos = Administrador::find( session('admin')->idadministrador);

        //return
        return redirect()->route('admin.Perfil');
        
    }
    //Funcion para cerrar sesion
    public function logout()
    {
        if(Session::has('admin'))
            Session::forget('admin');
        //Retornar a vista login
        return redirect()->route('loginAdminView');

    }

    //Vista de inicio del administrador
    public function vistaInicio()
    {  
        $peliculas = Pelicula::orderBy('created_at', 'DESC')->get();
        return view("administrador.inicioAdmin",  ['peliculas'=>$peliculas]);
    }
    //Datos administrador
    public function perfilView()
    {  
        return view("administrador.perfilAdministrador");
    }
}
