@extends('layout')

@section('css')
	<style>
		input[type="text"],
		input[type="email"],
		input[type="password"]{
			background: transparent;
			color: #fff;
			border: none;
			border-bottom: 2px solid #067a22;
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="password"]:focus{
			background: none;
			color: #fff;
		}
	</style>
@endsection

@section("Registo")

@section('content')
	<div class="container">
		<div class="card bg-dark col-lg-6 col-md-12 col-sm-12 m-auto">
			<div class="card-head">
				<h4 class="text-center text-white">Crea una cuenta</h4>
			</div>
			<div class="card-body">
				@if (isset($status))
					@if ($status == "warning")
						<div class="alert alert-warning">
							{{ $msj }}
						</div>
					@endif
				@endif
				<form action="{{ route('signup') }}" id="signup" method="POST">
					@csrf
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent text-white">Nombre</label>
						<input type="text" required class="form-control" name="nombre" placeholder="Nombre">
					</div>
					<div class="row mb-2">
						<div class="form-group col-6">
							<label for="" class="form-control bg-transparent text-white">Apellido paterno</label>
							<input type="text" required class="form-control" name="app" placeholder="Apellido paterno">
						</div>
						<div class="form-group col-6">
							<label for="" class="form-control bg-transparent text-white">Apellido materno</label>
							<input type="text" required class="form-control" name="apm" placeholder="Apellido Materno">
						</div>
					</div>
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent text-white">Correo</label>
						<input type="email" required class="form-control" name="email" placeholder="ejemplo@gmail.com">
						@error('email')
							<small class="text-danger">
								* Debe de ser un correo válido
							</small>
						@enderror
					</div>
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent text-white">Dirección</label>
						<input type="text" required class="form-control" name="address" placeholder="Direccion">
					</div>
					<div class="row mb-2">
						<div class="form-group col-6">
							<label for="" class="form-control bg-transparent text-white">Contraseña</label>
							<input type="password" required class="form-control" name="pass1" placeholder="Contraseña">
						</div>
						<div class="form-group col-6">
							<label for="" class="form-control bg-transparent text-white">Repetir contraseña</label>
							<input type="password" required class="form-control" name="pass2" placeholder="Repite la contraseña">
						</div>
					</div>
					<input type="submit" class="btn btn-success col-12" name="enviar" value="Crear cuenta">
				</form>
			</div>
		</div>
	</div>
@endsection

@section('js')

@endsection