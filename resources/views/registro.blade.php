@extends('layout.layout')

@section('css')
	<style>
		input[type="text"],
		input[type="email"],
		input[type="password"]{
			background: transparent;
			color: #fff;
			border: none;
			border-bottom: 2.5px solid rgb(255,69,0);
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="password"]:focus{
			background: none;
			color: #fff;
		}
	</style>
@endsection

@section("title", "UPTFlix | Registo")

@section('content')
	<div class="container">
		<div class="card bg-dark col-lg-6 col-md-12 col-sm-12 m-auto">
			<div class="card-head">
				<h2 class="text-center text-white">Crea una cuenta</h2>
			</div>
			<div class="card-body">
				<div id="msj-w" class="alert alert-warning">

				</div>
				<div id="msj-e" class="alert alert-danger">

				</div>
				<div id="msj-s" class="alert alert-success">

				</div>
				<form action="" id="signupF" method="POST">
					@csrf
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Nombre</label>
						<input type="text" required class="form-control" value="" name="nombre" placeholder="Nombre">
					</div>
					<div class="row mb-2">
						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label for="" class="form-control bg-transparent border-orange text-white">Apellido paterno</label>
							<input type="text" required class="form-control" name="app" placeholder="Apellido paterno">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label for="" class="form-control bg-transparent border-orange text-white">Apellido materno</label>
							<input type="text" required class="form-control" name="apm" placeholder="Apellido Materno">
						</div>
					</div>
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Correo</label>
						<input type="email" required class="form-control" name="email" placeholder="ejemplo@gmail.com">
						@error('email')
							<small class="text-danger">
								* Debe de ser un correo válido
							</small>
						@enderror
					</div>
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Dirección</label>
						<input type="text" required class="form-control" name="address" placeholder="Direccion">
					</div>
					<div class="row mb-2">
						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label for="" class="form-control bg-transparent border-orange text-white">Contraseña</label>
							<input type="password" required class="form-control" name="pass1" placeholder="Contraseña">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label for="" class="form-control bg-transparent border-orange text-white">Repetir contraseña</label>
							<input type="password" required class="form-control" name="pass2" placeholder="Repite la contraseña">
						</div>
					</div>
					<input type="button" id="registrar" class="btn btn-orange text-white col-12" name="enviar" value="Crear cuenta">
				</form>
			</div>
			<div class="card-footer">
				<small>Inicia sesión <a href="#" class="">aqí</a></small>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		//Hide div massajes
		$("#msj-w").hide();
		$("#msj-e").hide();
		$("#msj-s").hide();
		//Send form with ajax
		$('#registrar').click(function(event) {
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route("signup") }}',
				type: 'POST',
				dataType: 'json',
				data: $("#signupF").serialize(),
			})
			.done(function(data) {
				if (data.status == "warning") {
					$("#msj-e").hide();
					$("#msj-s").hide();
					$("#msj-w").show();
					$("#msj-w").empty();
					$("#msj-w").append(data.msj);
				}else if(data.status == "success"){
					$("#msj-w").hide();
					$("#msj-e").hide();
					$("#msj-s").show("");
					$("#msj-s").empty();
					$("#msj-s").append(data.msj);
				} else{
					$("#msj-w").hide();
					$("#msj-s").hide();
					$("#msj-e").show("");
					$("#msj-e").empty();
					$("#msj-e").append(data.msj);
				}
			});
		});
	</script>
@endsection