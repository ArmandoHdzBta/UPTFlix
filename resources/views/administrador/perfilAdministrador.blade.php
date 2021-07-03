@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Perfil Administrador</title>
@endsection

@section('css')
<style>
h1{
    margin-top: 5%;
    color: orangered;
}
label{
    margin-top: 5%;
}
.contenido{
    margin-top: 8%;
    margin-bottom: 8%;;
}
.contenido-2{
    padding-top: 2%;
    padding-bottom: 3%;
}
boton{
    position: relative;
    scroll-padding-top: 5%;
}
</style>
@endsection

@section('titulo-pagina')
<div class="container bg-white contenido">
    <div class="row contenido-2" style="justify-content: center">
        <h1 class="text-center"> PERFIL </h1>
            <form class="col-sm-5 bg-light">
                <div class="form-group col-md-5 ">
                    <label> Nombre de usuario </label>
                    <label class="form-control">{{session('admin')->nombre}}</label>
                </div>
                <div class="form-group col-xs-1 col-md-5">
                     <label>Apellido paterno </label>
                    <label class="form-control" value="" >{{session('admin')->apellido_pat}}</input>
                </div>
                <div class="form-group col-xs-1 col-md-5">
                    <label>Apellido materno</label>
                    <label class="form-control" value="">{{session('admin')->apellido_mat}}</input>
                </div>
                <div class="form-group col-xs-1 col-md-5">
                    <label> Correo electronico </label>
                    <label class="form-control" >{{session('admin')->correo}}</label>
                </div>
            </form>
        <div class=" col-md-2 bg-gradient">
            <div class="imagen col-md-2 back " id="imagen">
                <img src="{{asset(session('admin')->avatar)}}"  width="175" height="175">
            </div>
        </div>
        <a href="{{route('perfil.editar.view')}}" class="btn btn-warning text-white btn-format col-sm-6" style="margin-top: 2%;"><i class="fas fa-edit"></i>EDITAR PERFIL</a>
    </div>
</div
@endsection

@section('contenido')

@endsection

@section('js')

@endsection