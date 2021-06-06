<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //vista login
    public function loginView()
    {
        return view("administrador.loginAdministrador");
    }
}
