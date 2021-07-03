@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Peliculas</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.btn-flotante {
	font-size: 12px;
	text-transform: uppercase; 
	font-weight: bold;
	color: #ffffff; 
	border-radius: 5px; 
	letter-spacing: 2px;
	background-color: #06b506; 
	padding: 18px 30px; 
	position: fixed;
	bottom: 40px;
	right: 40px;
	transition: all 300ms ease 0ms;
}
.btn-flotante:hover {
	background-color: #a5522c;
	box-shadow: 0px 15px 20px rgba(22, 223, 99, 0.967);
	transform: translateY(-7px);
}

.btnr{
    position: relative;
    margin-left: 28%;
}
.txt-justify{
    text-align: justify;
}
.pelicula-2{
    margin-left: 5%;
    margin-right: 5%;
    margin-top: 6%;
}
//Nuevos estilos
.imgagen-1{
    position: relative;
    width: 100px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin-top: 5%;
    margin: auto;

}
.imagen{
    display: flex;
	//width: 175px;
    max-height: 290px;
    min-height: auto;
	justify-content: center;
	align-items: center;
	background: #666;

}
.contenido{
    position:absolute;
    left: 17%;
    right: 19%;
    
}
.contenedor{
    margin-top: 2%;
    margin-bottom: 2%;
    margin-right: 2%;
}
.text-cont{
    height: 150px;
    text-align: justify;
}
.back{
    background: darkslategrey;
}
.btn-contenedor{
    height: 50px;
    justify-content: flex-end;
    border-block-color: dark;
    display: flex;
}
.btn-format{
    margin-bottom: 2%;
}
.contenedor-2{
    justify-content: center;
    margin-top: 2%;
    margin-bottom: 1%;
}

</style>
@endsection

@section('titulo-pagina')
<div class="card-body text-center ">
    <h1 class="h1 tittle text-white">Peliculas </h1>
    <h3 class="h3 mb-4  tittle text-white">Aqui podras ver informacion de las peliculas </h3>
</div>
@foreach($peliculas as $p)
<div class="container">
    <div class="row contenedor-2" >
            <div class="imagen col-md-2 back " id="imagen">
                <img src="{{asset($p->cover)}}" class="imgagen-1"  width="150" height="225">
            </div>
            <div class="col col-md-6 texto-cont back">
                <div class="contenedor">
                    <h5 class="text text-center text-white">{{$p->titulo}}</h5>
                    <h6 class="text text-justify text-white">Categoria: {{$p->categoria}}</h6>
                    <h6 class="text text-white">Duracion: {{$p->time}}</h6>
                    <h6 class="text text-left text-white">Sipnosis:</h6>
                    <p class=" text-justify text-cont text-white">{{$p->sinopsis}}</p>
                </div>
                </div>
            <div class="col col-md-8 back btn-contenedor">
                <a href="{{route('editar.pelicula.view',["id"=>$p->idpelicula])}}" class="btn btn-warning text-white btn-format"><i class="fas fa-edit"></i>EDITAR</a>
                <a href="{{route('eliminar.pelicula',["id"=>$p->idpelicula])}}" onclick="
                return confirm('¿Estas seguro de eliminar esta pelicula?')"
                class="btn btn-danger btn-format"><span class="glyphicon glyphicon-remove-circle "
                aria-hidden="true"> <i class="fas fa-trash-alt"></i>ELIMINAR</span></a>
            </div>
    </div>
</div>
@endforeach

<a href="{{route('agregar.pelicula.view')}}" type="button" class="btn-flotante" role="button"  ><spam><i class="fas fa-plus-circle"></i>Agregar</spam></a>

@endsection

@section('contenido')

@endsection

@section('js')

@endsection