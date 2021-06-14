<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse administrador</title>
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
            <P class="title-1 text-center form-control bg-transparent border-orange text-white">Registrar  Administrador</p>  
            <form class="form-signin" action="" id="registrarAdmin" method="POST" enctype="multipart/form-data"
              {{csrf_field()}}
              <h4 class="text-warning" id="Mensaje"> </h4>
            <div class="row mb-1 form-group col-lg-12 col-md-6 col-sm-12">
                <label class"label">Elige una imagen de perfil</label>
                <input type="input" id="inputAvatar" name="avatar" class="form-control" style="background-color:transparent" placeholder="Nombre"  aria-required="true">
            </div>
           <p><a class="text-success text-center text-nowrap" id="success" href="{{route('loginAdminView')}}" ></a></p>
          </div>
              <button class="btn-summit btn-success text-light" id="registrarse" type="submit">Registrarse</button>
            <br>
            <p id="pruebas" class="text-danger"> </p>
            <a class="text-success text-sm-right" id="Mensaje" href="{{route('loginAdminView')}}" >Inicia sesion</a><br>
            <a class="text-primary text-sm-left" id="Mensaje" href="{{route('home')}}" >Ir a vista de inicio</a><br>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function (){
    //var datos = $("loginAdmin");
    $("#registrarse").click( function (){
      //Este metodo evitada que la pagina se recrague
       //Este bloque de codigo se encarga de pasar los datos por medio de ajax
        .done(function (data){
            //Informa si una imagen no cumple con los requerimientos
            if(data.estatus == "pruebas"){
            document.getElementById("pruebas").innerHTML = data.mensaje;
            }
        })
    });
  });

  
</script>
</html>