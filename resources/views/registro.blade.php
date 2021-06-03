@extends('layout')

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
				<form action="{{ route('signup') }}" method="POST">
					@csrf
					<div class="form-group">
						<label for="" class="form-control">Nombre</label>
						<input type="text" required class="form-control" name="nombre" placeholder="Nombre">
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="" class="form-control">Apellido paterno</label>
							<input type="text" required class="form-control" name="app" placeholder="Apellido paterno">
						</div>
						<div class="form-group col-6">
							<label for="" class="form-control">Apellido materno</label>
							<input type="text" required class="form-control" name="apm" placeholder="Apellido Materno">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="form-control">Correo</label>
						<input type="text" class="form-control" name="email" placeholder="ejemplo@gmail.com">
					</div>
					<div class="form-group">
						<label for="" class="form-control">Dirección</label>
						<input type="text" required class="form-control" name="address" placeholder="Direccion">
					</div>
					<div class="form-group">
						<label for="" class="form-control">Contraseña</label>
						<input type="password" required class="form-control" name="pass1" placeholder="Contraseña">
					</div>
					<div class="form-group">
						<label for="" class="form-control">Repetir contraseña</label>
						<input type="password" required class="form-control" name="pass2" placeholder="Repite la contraseña">
					</div>
					<input type="submit" class="btn btn-success col-12" name="enviar" value="Crear cuenta">
				</form>
			</div>
		</div>
	</div>
@endsection
