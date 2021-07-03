@extends('administrador.layout.layoutAdmin')

@section('titulo')
    <title>Ediatr perfil</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('fav icon link') }}"/>
@endsection

@section('css')
<style>
    input[type="text"],
    input[type="password"],
    input[type="file"],
    input[type="email"]{
        border-bottom-color: orangered;
    }
h1{
    margin-top: 5%;
    color: orangered;
}
label{
    margin-top: 5%;
}
.contenido{
    margin-left: 25%;
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
.formulario{
    padding-left: 5%;
    padding-bottom: 5%;
}
.btn-1{
    width: 120px;
    height: 50px;
    border: none;
    display: block;
    margin-left: auto;
    margin-right: auto;

  }
  .btn-1:hover {
    transform: translateY(-3px);
}
small{
    size: 22px;
}
</style>
@endsection

@section('titulo-pagina')
<div class=" col-md-6 bg-white contenido" style="justify-content: center">
        <h1 class="text-center"> PERFIL </h1>
            <form class="col-dm-6 bg-light formulario" action="{{route('perfil.editar.form')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group col-md-11 ">
                    <label> Nombre de usuario </label>
                    <input type="text" name="nombre" class="form-control" value="{{session('admin')->nombre}}">
                </div>
                <div class="row input-group">
                    <div class="form-group col-xs-1 col-md-6">
                        <label>Apellido paterno </label>
                       <input type="text" name="apellidoP" class="form-control" value="{{session('admin')->apellido_pat}}">
                       @error('apellidoP')
                        <small class="text-danger">* {{ $message }}</small>
                        @enderror
                   </div>
                   <div class="form-group col-xs-1 col-md-6">
                       <label>Apellido materno</label>
                       <input type="text" name="apellidoM" class="form-control" value="{{session('admin')->apellido_mat}}">
                        @error('apellidoM')
                            <small class="text-danger">* {{ $message }}</small>
                        @enderror
                   </div>
                </div>
                <div class="row input-group">
                    <div class="form-group col-xs-1 col-md-6">
                        <label> Correo electronico </label>
                        <input type="email" name="correo" class="form-control" value="{{session('admin')->correo}}">
                        @error('correo')
                            <small class="text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-1 col-md-6">
                        <label> Contraseña </label>
                        <input type="password" name="password" class="form-control" >
                        @error('password')
                            <small class="text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-xs-1 col-md-6">
                    <label>Avatar</label>
                    <input name="avatar" class="form-control" accept=".png,.jpg" type="file" >
                    @error('avatar')
                        <small class="text-danger">* {{ $message }}</small>
                    @enderror
                    <input type="hidden" name="cover" value="{{session('admin')->avatar}}">
                </div>
                <div class="row input-group">
                    <div class="form-group col-xs-1 col-md-6">
                        <label>Contraseña </label>
                        <input class="form-control" name="password1" type="password"  placeholder="password1" required>
                        @error('password1')
                            <small class="text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-1 col-md-6">
                        <label>Contraseña confirmar </label>
                        <input type="password" class="form-control"  name="password2" placeholder="password2" required>
                        @error('password2')
                            <small class="text-danger">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="btn-1" style="margin-top: 5%">
                    <button class="btn btn-warning" type="submit" > Actualizar </button>
                </div>
            </form>
 </div>
@endsection

@section('contenido')

@endsection

@section('js')

@endsection