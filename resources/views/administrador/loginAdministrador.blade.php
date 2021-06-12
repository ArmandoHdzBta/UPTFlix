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
        border-top-color: orangered;
        border-right-color: black;
        border-bottom-color:orangered;
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
	  	input[type="password"]{
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
            <P class="title-1 text-center form-control bg-transparent border-orange text-white">Inicio de Sesion  Administrador</p>  
            <img src="https://img.ecartelera.com/noticias/fotos/51900/51991/1.jpg">
            @if(isset($estatus))
                @if($estatus == "success")
                    <label class="text-success">{{$mensaje}}</label>
                @elseif($estatus == "error")
                    <label class="text-warning">{{$mensaje}}</label>
                @endif
            @endif
            <p class="text-danger" id="general"> <p>
            <form class="form-login" id="loginAdmin" action="{{ route('loginAdmin') }}" method="POST">
              {{csrf_field()}}
              <br>
              <div >
                <label class"form-control bg-transparent border-orange">Correo electronico</label>
                <input type="email" id="inputEmail" name="correo" class="form-control" style="background-color:transparent" placeholder="Correo Electronico"  >
                <p id="email" class="text-danger"> </p>
              </div>
              <br>
              <div >
                <label class="label">Contraseña</label>
                <input type="password" id="inputPassword" name="password" class="form-control" style="background-color:transparent" placeholder="Contraseña" >
                <p id="contraseña" class="text-danger"> </p>
                <br><br>
              </div>
              <button class="btn-summit btn-success text-light" id="iniciarSesion" type="submit">Iniciar Sesion</button>
              <p id="Mensaje" class="text-danger"> </p>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function (){
    
     

    $("#iniciarSesion").click( function (){
        //Verifican que tengan datos los campos
        if($("#inputEmail").val() == ""){
          document.getElementById("email").innerHTML = "Ingresa correo correo";
          $("#inputEmail").focus(); 
          return false;
        }else{
          document.getElementById("email").innerHTML = "";
        }
        if($("#inputPassword").val() == ""){
          document.getElementById("contraseña").innerHTML = "Ingresa contraseña";
          $("#inputPassword").focus();
          return false;
       }if($("#inputPassword").val()!=""){
          document.getElementById("contraseña").innerHTML = "";
       }
/*
      $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                dataType: 'json',
                data: $("#loginAdmin").serialize(),
                url: "{{route('loginAdmin')}}",
            })
*/
                
    });
    });

  
</script>
</html>