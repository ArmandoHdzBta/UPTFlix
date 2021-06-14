<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    <h1> Inicio Admin xd</h1>
</body>
</html>
>>>>>>> aaad5062190d5e1f1684f75b26e076f67619527a
