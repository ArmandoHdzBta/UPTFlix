<?php

namespace App\Http\Controllers;

use App\Models\TipoTarjeta;
use App\Models\Tarjeta;
use App\Models\Usuario;
use App\Models\UsuarioPelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UsuarioController extends Controller
{
    public function registro(){
        return view('registro');
    }

    public function iniciarsesion()
    {
        return view('inicio-sesion');
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
        $usuario->avatar = "default.jpg";
        $usuario->correo = $datos->email;
        $usuario->password = bcrypt($pass1);
        $usuarioOk = $usuario->save();

       if($usuarioOk){
            return json_encode(['status'=>'success', 'msj'=>"¡Felicidades acabas de registrarte correctamente!"]);
       }
    }

    public function signin(Request $datos)
    {
        //validation empy inputs
        if(!$datos->email || !$datos->pass)
            return view('inicio-sesion', ['status'=>'warning', 'msj'=>'Todos los campos deben de completarse']);
        //get the user
        $usuario = Usuario::where('correo', $datos->email)->first();

        if(!$usuario)
            return view('inicio-sesion', ['status'=>'error', 'msj'=>'El correo aún no ah sido registrado']);
        //validate credentials (passwords)
        if(!Hash::check($datos->pass, $usuario->password))
            return;
        //start session
        Session::put('usuario',$usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.home');
        }
    }

    public function profile()
    {
        //obtener los datos correspondites [tarjetas, perfiles, peliculas vistas] y mandarlas
        //Usuer's movies
        $usuarioPeliculas = UsuarioPelicula::
                            select('usuarioPelicula.idusuarioPelicula', 'usuarioPelicula.idusuario', 'usuarioPelicula.tiempovisualizacion', 'p.idpelicula', 'p.titulo', 'p.time', 'p.cover', 'usuarioPelicula.updated_at')
                            ->join('peliculas as p', 'usuarioPelicula.idpelicula', '=', 'p.idpelicula')
                            ->where('usuarioPelicula.idusuario', session('usuario')->idusuario)
                            ->orderBy('usuarioPelicula.updated_at', 'ASC')
                            ->get();
        //User's Cards
        $usuarioTarjetas = Tarjeta::where('idusuario', session('usuario')->idusuario)
                                    ->get();
        //Kind of cards
        $tipoTarjetas = TipoTarjeta::all();

        return view('user.config-usuario', ['usuarioPeliculas'=>$usuarioPeliculas, 'usuarioTarjetas'=>$usuarioTarjetas, 'tipoTarjetas'=>$tipoTarjetas]);
    }

    public function findCard($idtarjeta)
    {
        $tarjeta = Tarjeta::where('idmetodoPago', $idtarjeta)->first();

        if (!$tarjeta){
            return json_encode(['status'=>'error', 'mjs'=>'No se encontro la tarjeta']);
        }else{
            return json_encode(['status'=>'success', 'tarjeta'=>$tarjeta]);
        }
    }

    public function editCard(Request $datos)
    {
        //if it's empty it's a new card
        if(!$datos->idtarjeta){
            $tarjeta = Tarjeta::where('idusuario', session('usuario')->idusuario)
                                ->get()
                                ->count();
            if($tarjeta >= 6)
                return json_encode(['status'=>'error', 'msj'=>'Solo puedes añadir un maximo de 6 tarjetas']);
            //validation empty inputs
            if(!$datos->nomTitular || !$datos->appTitular || !$datos->numTarjeta || !$datos->dateVencimiento || !$datos->cvv)
                return json_encode(['status'=>'warning', 'msj'=>'Todos los campos deben de estar llenos']);
            //validaton of select
            if($datos->tipoTarjeta == 0)
                return json_encode(['status'=>'warning', 'msj'=>'Selecciona un tipo de tarjeta valido']);
            //validate if it's number
            if(!is_numeric($datos->cvv))
                return json_encode(['status'=>'error', 'msj'=>'El campo CVV debe de ser numérico y solo 3 números']);
            //make the registration
            $tarjeta = new Tarjeta();

            $tarjeta->idusuario = session('usuario')->idusuario;
            $tarjeta->nombreTitular = $datos->nomTitular;
            $tarjeta->apellidoTitular = $datos->appTitular;
            $tarjeta->idtipoTarjeta = $datos->tipoTarjeta;
            $tarjeta->numeroTarjeta = $datos->numTarjeta;
            $tarjeta->vencimiento = $datos->dateVencimiento;
            $tarjeta->cvv = $datos->cvv;
            $ok = $tarjeta->save();
            if ($ok) {
                return json_encode(['status'=>'success', 'msj'=>'La tarjeta ha sido guardada corectamente']);
            }
        }else{
            //validation empty inputs
            if(!$datos->nomTitular || !$datos->appTitular || !$datos->numTarjeta || !$datos->dateVencimiento || !$datos->cvv)
                return json_encode(['status'=>'warning', 'msj'=>'Todos los campos deben de estar llenos']);

            //validaton of select
            if($datos->tipoTarjeta == 0)
                return json_encode(['status'=>'warning', 'msj'=>'Selecciona un tipo de tarjeta valido']);
            //validate if it's number
            if(!is_numeric($datos->cvv))
                return json_encode(['status'=>'error', 'msj'=>'El campo CVV debe de ser numérico y solo 3 números']);

            $tarjeta = Tarjeta::where('idmetodoPago', $datos->idtarjeta)->first();

            $tarjeta->idusuario = session('usuario')->idusuario;
            $tarjeta->nombreTitular = $datos->nomTitular;
            $tarjeta->apellidoTitular = $datos->appTitular;
            $tarjeta->idtipoTarjeta = $datos->tipoTarjeta;
            $tarjeta->numeroTarjeta = $datos->numTarjeta;
            $tarjeta->vencimiento = $datos->dateVencimiento;
            $tarjeta->cvv = $datos->cvv;

            $ok = $tarjeta->save();

            if ($ok) {
                return json_encode(['status'=>'success', 'msj'=>'La tarjeta ha sido actualizada']);
            }
        }
    }

    public function signout()
    {
        if (Session::has('usuario')) {
            Session::forget('usuario');
        }
        return redirect()->route('signin');
    }
}
