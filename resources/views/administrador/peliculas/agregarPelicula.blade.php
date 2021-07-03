@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Peliculas</title>
    
@endsection

@section('css')
<style>
    input[type="number"]{
      width: 50px;
      border: none;
      color: rgb(208, 111, 38);
    }
    input[type="file"]{
        color: rgb(252, 252, 252);
        width: auto;
      }
    .btn-1{
        width: 120px;
        height: 50px;
        border: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 2%;
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
        background-color: darkslategrey ;
        margin-bottom: 2%;
    }
    .btn-1:hover {
        background-color: #a5522c;
        box-shadow: 0px 15px 20px darkslategrey;
        transform: translateY(-7px);
    }

</style>
@endsection

@section('titulo-pagina')

<div class="form">
    <div class="container">
        <div class="col-ms-12 col-md-12 col-lg-7 cont-1 container">
            <br>
            <h3 class="text-center titulo1" > Agregar peliculas </h3>
            <form action="{{route('agregar.pelicula.form')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <h5> Titulo de la pelicula </h5>
                    <input type="text" id="title" class="form-control" name="titulo" value="{{old('titulo')}}" placeholder="Titulo" enctype="multipart/form-data">
                    @error('titulo')
                        <small class="text-danger">°{{ $message }}</small>
                    @enderror
                    <h5 > Categoria </h5>
                    <select class="form-select form-select-sm" name="categoria" value="{{old('categoria')}}">
                        <option selected value="{{old('categoria')}}">{{old('categoria')}}</option>
                        <option value="accion">Accion</option>
                        <option value="comedia">Comedia</option>
                        <option value="aventuras">Aventuras</option>
                        <option value="ciencia ficcion">Ciencia Ficción</option>
                        <option value="drama">Drama</option>
                        <option value="terror">Terror</option>
                        <option value="animada">Animada</option>
                      </select>
                    @error('categoria')
                         <small class="text-danger">°{{ $message }}</small>
                    @enderror
                </div>
                <h5> Sipnosis </h5>
                <textarea type="text" class="form-control" name="sipnosis" value="{{old('sipnosis')}}" rows="8"> {{old('sipnosis')}} </textarea>
                @error('sipnosis')
                         <small class="text-danger">°{{ $message }}</small>
                @enderror

                <div class="card-body" style="width: 18rem">
                    <h5> Duracion </h5>
                    <div class="form-group">
                        <label>Horas <input type="number" name="hora" value="{{old('hora')}}" min="1" max="60"> </label> 
                        <label>Minutos <input type="number" name="minutos" value="{{old('hora')}}" min="1" max="59"> </label>
                    </div>
                    @error('hora')
                            <small class="text-danger">°{{ $message }}</small>
                    @enderror
                    <br>
                    @error('minutos')
                            <small class="text-danger">°{{ $message }}</small>
                    @enderror
                </div>
                <h5> Imagen </h5>
                <input type="file" accept=".png,.jpg" name="imagen" value="{{old('imagen')}}" >
                @error('imagen')
                         <small class="text-danger">°{{ $message }}</small>
                @enderror
                <br>
                <br>
                <button class="btn-1"  type="submit" > Agregar </button>
                <br>
            
            </form>
        </div>
    </div>
</div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection