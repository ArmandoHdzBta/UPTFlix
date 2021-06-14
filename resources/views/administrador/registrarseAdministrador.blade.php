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
                <label class"label">Nombre</label>
                <input type="text" id="inputNombre" name="nombre" class="form-control" style="background-color:transparent" placeholder="Nombre"  aria-required="true">
            </div>
          <div class="input-group row mb-1">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label class="label">Apellido Paterno</label>
                <input type="text" id="inputApellidoP" name="apellidoP" class="form-control" style="background-color:transparent" placeholder="Apellido Paterno" aria-required="true">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label class"label">Apellido Materno</label>
                <input type="text" id="inputApellidoM" name="apellidoM" class="form-control" style="background-color:transparent" placeholder="Apellido Materno" aria-required="true">
            </div>
          </div>
            <div class="row mb-1 form-group col-lg-12 col-md-6 col-sm-12">
                <label class="label">Correo electronico</label>
                <input type="email" id="inputEmail" name="correo" class="form-control" style="background-color:transparent" placeholder="Example@gmail.com" aria-required="true">
                <p id="email" class="text-danger"> </p>
            </div>
              <p id="contraseña" class="text-danger"> </p>
          <div class="input-group row mb-1">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label class="label">Contraseña</label>
              <input type="password" id="inputPassword" name="password" class="form-control" style="background-color:transparent" placeholder="Contraseña" aria-required="true">
              <p id="contraseña" class="text-danger"> </p>
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label class="label">Confirmar Contraseña</label>
              <input type="password" id="inputCPassword" name="password2" class="form-control" style="background-color:transparent" placeholder="Confirmar Contraseña"  aria-required="true">
              <p id="contraseña2" class="text-danger"> </p>
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
      event.preventDefault()
      document.getElementById("Mensaje").innerHTML = " ";
      document.getElementById("email").innerHTML = " ";
      document.getElementById("contraseña").innerHTML = " ";
      document.getElementById("success").innerHTML = " ";
       //Este bloque de codigo se encarga de pasar los datos por medio de ajax
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                dataType: 'json',
                data: $("#registrarAdmin").serialize(),
                url: "{{route('signinAdmin')}}",
            })
                .done(function (data){
                  //Da una alerta por si faltan datos
                  if(data.estatus == "warning"){
                    document.getElementById("Mensaje").innerHTML = data.mensaje;
                  }
                  //Regresa un mensaje si hay problemas con el correo
                  if(data.estatus == "email"){
                    document.getElementById("email").innerHTML = data.mensaje;
                    $("#inputEmail").focus(); 
                  }
                  //Avisa acerca de errores en la contraseña
                  
                  if(data.estatus == "password"){
                    document.getElementById("contraseña").innerHTML = data.mensaje;
                    $("#inputPassword").focus(); 
                  }
                  //Avisa que se creo la cuenta
                  if(data.estatus == "success"){
                    document.getElementById("success").innerHTML = data.mensaje;
                  }
                })
    });
  });

  
</script>
</html>