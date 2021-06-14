@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center ">
    <h1 class="h1 mb-4 text-warning">Bienvenido : {{session('admin')->nombre}} </h1>
    <img src=/{{session('admin')->avatar}}
     width="150"
     height="150">
</div>
<h1 class=" text-warning">En la interfaz de administrador puedes:</h1>
    <p class=" text-warning">* Agregar peliculas</p>
    <p class=" text-warning">* Editar y eliminar peliculas</p>
    <p class=" text-warning">* Ver listado de peliculas disponibles</p>
@endsection

@section('contenido')
<div class="bg-secondary">
</div>
@endsection

@section('js')

@endsection