@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Peliculas</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
<div class="card-body text-center ">
    <h1 class="h1 mb-4 text-warning">Peliculas </h1>
    @if(isset($peliculas))
        <h3 class="text-danger"> Por el momento de hay peliculas con ese criterio de busqueda</h3>
    @endif
</div>
@endsection

@section('contenido')
<div class="bg-secondary">
</div>
@endsection

@section('js')

@endsection