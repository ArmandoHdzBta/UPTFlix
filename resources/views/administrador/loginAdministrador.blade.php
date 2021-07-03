<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
    <!------------------------------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/../css/admin.css" rel="stylesheet" />
    <!------------------------------>
</head>
<body>
  <div class="contenedor">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto container">
      <div class="card card-signin my-5 fondo">
        <div class="card-body">
            <h3 class="tittle card-title text-center   bg-transparent border-orange text-white"><strong>Inicio de Sesion  Administrador</strong></h3>  <br><br>
            @if(isset($estatus))
              @if($estatus == "alert")
                  <small class="text-danger">{{$mensaje}}</small>
              @elseif($estatus == "error")
                  <small class="text-warning">{{$mensaje}}</small>
              @endif
            @endif
            <form class="form-login" id="loginAdmin" action="{{route('loginAdmin')}}" method="POST">
              {{csrf_field()}}
              <br>
              <div >
                <label class"form-control bg-transparent border-orange"> Correo electronico</label>
                <input type="email" id="inputEmail" name="correo" autofocus class="form-control" style="background-color:transparent" placeholder="example@gmail.com"  value="{{old('correo')}}" required>
                @error('correo')
                      <small class="text-danger">° {{ $message }}</small>
                @enderror
              </div>
              <br>
              <div >
                <label class="label">Contraseña</label>
                <input type="password" id="inputPassword" name="password" class="form-control" style="background-color:transparent" placeholder="Contraseña"  required>
                @error('password')
                      <small class="text-danger">° {{ $message }}</small>
                @enderror
                <br><br>
              </div>
              <button class="btn btn-summit btn-default text-light col-12" type="summit" >Iniciar Sesion</button>
            </hr>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>