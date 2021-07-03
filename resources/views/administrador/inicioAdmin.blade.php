@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')
<style>
    .cover{
        width: 100%;
        background-size: cover;
    }
 
    .contenido{
        height: 150px;
    }
    .cont{
        justify-content: flex-end;
        height: 25px;
        display: flex;
    }
    .contenedor{
        height:105px;
    }
    h1{
        margin-left: 2%;
    }
    li{
        margin-left: 2%;
    }
</style>
@endsection

@section('titulo-pagina')
<div class="card-body text-center ">
    <h1 class="h1 mb-4 text-white">Bienvenido : {{session('admin')->nombre}} </h1>
    <img src={{asset(session('admin')->avatar)}}
     width="150"
     height="150">
</div>
<h1 class=" text-white">En la interfaz de administrador puedes:</h1>
    <ul class="list-group bg-transparent">
        <li class="list-group-item bg-transparent text-white">Agregar peliculas</li>
        <li class="list-group-item bg-transparent text-white">Editar y eliminar peliculas</li>
        <li class="list-group-item bg-transparent text-white">Ver listado de peliculas disponibles</li>
      </ul>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 contenido bg-white text-justify">
            <div class="card-body bg-gradient contenedor">
                <h5 class="card-title text-dark">Peliculas</h5>
                <h6 class="card-subtitle">Aqui puedes ver que peliculas hay en existencia, como agregar, eliminar y editar peliculas<br><br></h6>
            </div>
            <div class="cont">                
                <a href="{{route('admin.peliculas')}}" class="btn text-dark ">Ver Pelicula</a>
            </div>
        </div>

        <div class="col-md-6 contenido bg-white text-justify">
            <div class="card-body contenedor">
                <h5 class="card-title text-dark">Perfil</h5>
                <h6 class="card-subtitle">En esta seccion puedes configurar tu informacion de administrador</h6>
            </div>
            <div class="cont"> 
                <a href="{{route('admin.Perfil')}}" class="btn text-dark">Ir a perfil</a>
            </div>
        </div>
    </div>
<div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection
