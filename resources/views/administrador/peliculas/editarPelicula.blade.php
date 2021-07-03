@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Editar pelicula</title>
    
@endsection

@section('css')
<style>
    input[type="time"]{
      width: 120px;
      border: none;
    }
    .btn-1{
        width: 120px;
        height: 50px;
        border: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10%;
      }
    .form{
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        
    }
    h5{
        margin-top: 3%;
        margin-bottom: 3%;
        color: rgb(255, 255, 255);
        font-weight: 500;
    }
    label{
        margin-top: 3%;
        margin-bottom: 3%;
        color: rgb(255, 255, 255);
        font-weight: 450;
    }
    .titulo1{
        text-align: center;
        color: rgb(255, 255, 255);
        
    }
    .cont-1{
        background-color: darkslategrey;
        margin-bottom: 2%;
    }
    .btn-1:hover {
        background-color: #a5522c;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-7px);
    }
    .img-cont{
        margin-left: 38%;
    }

</style>
@endsection

@section('titulo-pagina')
<div class="form">
    <div class="container">
        <div class="col-ms-12 col-md-12 col-lg-7 cont-1 container">
            <br>
            <h3 class="text-center titulo1" > Editar peliculas </h3>
            <form action="{{route('editar.pelicula.form',["id"=>$pelicula->idpelicula])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h5> Titulo de la pelicula </h5>
                    <input type="text" id="title" class="form-control" name="titulo" value="{{$pelicula->titulo}}" placeholder="Titulo">
                    @error('titulo')
                        <small class="text-danger">* {{ $message }}</small>
                    @enderror
                    <h5 > Categoria </h5>
                    <select class="form-select form-select-sm" name="categoria" value="{{$pelicula->categoria}}" aria-label="Default select example">
                        <option selected>{{$pelicula->categoria}}</option>
                        <option value="accion">Accion</option>
                        <option value="comedia">Comedia</option>
                        <option value="aventuras">Aventuras</option>
                        <option value="ciencia ficcion">Ciencia Ficción</option>
                        <option value="drama">Drama</option>
                        <option value="terror">Terror</option>
                        <option value="animada">Animada</option>
                      </select>
                    @error('categoria')
                         <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <h5> Sipnosis </h5>
                <textarea type="text" class="form-control" name="sipnosis" rows="8"> {{$pelicula->sinopsis}} </textarea>
                @error('sipnosis')
                         <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="card-body" style="width: 18rem">
                    <h5> Duracion <input type="time" name="duracion" value="{{$pelicula->time}}"step="1" readonly> </h5>
                    <div class="form-group">
                        <label>Hora <input type="number" name="hora" min="1" max="59"> </label> 
                        <label>Minutos <input type="number" name="minutos" min="1" max="59"> </label>
                    </div>
                    @error('hora')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <br>
                    @error('minutos')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="img-cont">
                    <h5 class="text-jusrify"> Imagen </h5>
                    <small class="text-warning"> Imagen actual </small><br>
                    <img src="{{ asset($pelicula->cover)}}" class="img" width="150" height="175">
                    <br>
                    <label> Elegir una imagen </label>
                    <input type="file" accept="image/jpeg/png" name="imagen" value="{{$pelicula->cover}}"> 
                    <input type="hidden" name="cover" value="{{$pelicula->cover}}">
                    @error('imagen')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <br>
                <button class="btn-1" type="submit" > Agregar </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection