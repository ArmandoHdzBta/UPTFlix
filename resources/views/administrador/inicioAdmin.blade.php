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
    .peliculas-left{
        float: left;
        height: 200px;
    }
    .categorias-center{
        float: right;
        background-color: aliceblue;
        height: 200px;
    }
    .perfil-right{
        display:inline-block;
        height: 200px;
    }
</style>
@endsection

@section('titulo-pagina')
<div class="card-body text-center ">
    <h1 class="h1 mb-4 text-warning">Bienvenido : {{session('admin')->nombre}} </h1>
    <img src=/{{session('admin')->avatar}}
     width="150"
     height="150">
</div>
<h1 class=" text-warning">En la interfaz de administrador puedes:</h1>
    <ul class="list-group bg-transparent">
        <li class="list-group-item bg-transparent text-warning">Agregar peliculas</li>
        <li class="list-group-item bg-transparent text-warning">Editar y eliminar peliculas</li>
        <li class="list-group-item bg-transparent text-warning">Ver listado de peliculas disponibles</li>
      </ul>

    <div class="col-md-4 col-sm-4 mb-2 d-flex peliculas-left bg-white justify-text">
        <div class="" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title text-dark">Peliculas</h5>
                <h6 class="card-subtitle mb-2 text-muted">Aqui puedes ver que peliculas hay en existencia, como agregar, eliminar y editar peliculas<br><br></h6>
                <a href="{{route('admin.peliculas')}}" class="btn btn btn-orange col-12 text-dark">Ver Pelicula</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 mb-2 d-flex categorias-center bg-white">
        <div class="" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title text-dark">Categorias de peliculas</h5>
                <h6 class="card-subtitle mb-2 text-muted">Puedes ver las categorias de las peliculas<br> <br></h6>
                <a href="{{route('admin.categoria.view')}}" class="btn btn btn-orange col-12 text-dark">Ver categorias</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 mb-2 d-flex perfil-right bg-white">
        <div class="" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title text-dark">Perfil</h5>
                <h6 class="card-subtitle mb-2 text-muted">En esta seccion puedes configurar tu informacion de administrador</h6>
                <a href="{{route('admin.Perfil')}}" class="btn btn btn-orange col-12 text-dark">Ir a perfil</a>
            </div>
        </div>
    </div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection
