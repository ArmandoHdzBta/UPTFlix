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
    <style>
      *{
        padding: 0px;
        margin: 0px;
      }
      body{
        background: black;
      }
      .btn-summit{
        background: orangered;
        border: none;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-left: 30%;
        width: 33.33%;
      }
      .title-1{
        width: auto;
        font-size: 32px;
        border-top-color: black;
        border-right-color: black;
        border-bottom-color:black;
        border-left-color: black;
      }
      img{
        width: 180px; height: 180px;
        display: block;
        margin: auto;
        border-radius: 12px;
      }
      input[type="text"],
	  	input[type="email"],
	  	input[type="password"],
      input[type="file"]{
			background: transparent;
			color: #fff;
			border: none;
			border-bottom: 2.5px solid rgb(255,69,0);
		  }
      .fondo{
        background-color: black;
      }
      label{
        color: white;
      }
      .input:focus{
        border-color: orangered;
        outline: 0 none;
      }
		
  </style>
    <!------------------------------>
</head>
<body>
  <div class="contenedor">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto container">
      <div class="card card-signin my-5 fondo">
        <div class="card-body">
            <P class="title-1 text-center form-control bg-transparent border-orange text-white">Registrar  Administrador</p>  
            <form class="form-signin" action="" id="registrarAdmin" method="POST">
              {{csrf_field()}}
              <br>
            <div class="row mb-1 form-group col-lg-12 col-md-6 col-sm-12">
                <label class"label">Nombre</label>
                <input type="text" id="inputNombre" name="nombre" class="form-control" style="background-color:transparent" placeholder="Nombre"  >
                <p id="nombre" class="text-danger"> </p>
            </div>
          <div class="input-group row mb-1">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label class="label">Apellido Paterno</label>
                <input type="text" id="inputApellidoP" name="apellidoP" class="form-control" style="background-color:transparent" placeholder="Apellido Paterno">
                <p id="apellidoP" class="text-danger"> </p>
                
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label class"label">Apellido Materno</label>
                <input type="text" id="inputApellidoM" name="apellidoM" class="form-control" style="background-color:transparent" placeholder="Apellido Materno" >
                <p id="apellidoM" class="text-danger"> </p>
            </div>
          </div>
            <div class="row mb-1 form-group col-lg-12 col-md-6 col-sm-12">
                <label class="label">Correo electronico</label>
                <input type="email" id="inputEmail" name="correo" class="form-control" style="background-color:transparent" placeholder="Example@gmail.com" >
                <p id="email" class="text-danger"> </p>
            </div>
            <br>
            <div class="row mb-1 form-group col-lg-12 col-md-6 col-sm-12">
              <label class"label">Avatar</label>
              <input accept="image/png,image/jpeg" type="file" id="inputAvatar" name="avatar" class="form-control" style="background-color:transparent" placeholder="Elige un avatar"  >
              <p id="avatar" class="text-danger"> </p>
            </div>
              <br>
              <p id="contraseña" class="text-danger"> </p>
          <div class="input-group row mb-1">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label class="label">Contraseña</label>
              <input type="password" id="inputPassword" name="password" class="form-control" style="background-color:transparent" placeholder="Contraseña" >
              <p id="contraseña" class="text-danger"> </p>
              <br>
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-12">
              <label class="label">Confirmar Contraseña</label>
              <input type="password" id="inputCPassword" name="password2" class="form-control" style="background-color:transparent" placeholder="Confirmar Contraseña" >
              <p id="contraseña2" class="text-danger"> </p>
              <br>
           </div>
          </div>
          <p class="text-success" id="Mensaje"> </p>
              <button class="btn-summit btn-success text-light" id="registrarse" type="submit">Registrarse</button>
            </form>
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
    var datos = $("loginAdmin");
    $("#registrarse").click( function (){
      //Este metodo evitada que la pagina se recrague
      event.preventDefault()
      //Este bloque de codigo se encarga de verificar que el usuario ingrese datos en el formulario
      //Haciednole focus en el campo que le falto llenar
        if($("#inputNombre").val() == ""){
        document.getElementById("nombre").innerHTML = "Ingresa un nombre";
        $("#inputNombre").focus(); 
        return false;
        }else{
          document.getElementById("nombre").innerHTML = "";
        }
        if($("#inputApellidoP").val() == ""){
        document.getElementById("apellidoP").innerHTML = "Ingresa un apellido";
        $("#inputApellidoP").focus(); 
        return false;
        }else{
          document.getElementById("apellidoP").innerHTML = "";
        }
        if($("#inputApellidoM").val() == ""){
        document.getElementById("apellidoM").innerHTML = "Ingresa un apellido";
        $("#inputApellidoM").focus(); 
        return false;
        }else{
          document.getElementById("apellidoM").innerHTML = "";
        }
        if($("#inputEmail").val() == ""){
        document.getElementById("email").innerHTML = "Ingresa correo correo";
        $("#inputEmail").focus(); 
        return false;
        }else{
          document.getElementById("email").innerHTML = "";
        }
        if($("#inputAvatar").val() == ""){
        document.getElementById("avatar").innerHTML = "Elije un avatar";
        $("#inputAvatar").focus(); 
        return false;
        }else{
          document.getElementById("avatar").innerHTML = "";
        }
        if($("#inputPassword").val() == ""){
          document.getElementById("contraseña").innerHTML = "Ingresa una contraseña";
          $("#inputPassword").focus(); 
          return false;
          }else{
            document.getElementById("contraseña").innerHTML = "";
          }
       if($("#inputCPassword").val() == ""){
        document.getElementById("contraseña2").innerHTML = "Ingresa una contraseña";
        $("#inputCPassword").focus();
        return false;
       }if($("#inputCPassword").val()!=""){
        document.getElementById("contraseña2").innerHTML = "";
       }
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
                    alert(data.mensaje);
                  }
                  //Regresa un mensaje si hay problemas con el correo
                  if(data.estatus == "email"){
                    document.getElementById("email").innerHTML = data.mensaje;
                    $("#inputEmail").focus(); 
                  }
                  //Avisa que se creo la cuenta
                  if(data.estatus == "success"){
                    window.location.replace("{{route('loginAdminView')}}");
                  }
                  //Avisa acerca de errores en la contraseña
                  if(data.estatus == "password"){
                    document.getElementById("contraseña").innerHTML = data.mensaje;
                    $("#inputPassword").focus(); 
                  }
                })
    });
  });

  
</script>
</html>