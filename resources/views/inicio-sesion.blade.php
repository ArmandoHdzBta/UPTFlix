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
		.h-vh{
			height: 100vh;
		}
		.bg-dark-rgba{
			background: rgba(0, 0, 0, .8);
		}
	</style>
@endsection

@section("title", "UPTFlix | Inicio de sesión")

@section('content')
	<div class="container d-flex justify-content-center align-items-center h-vh">
		<div class="card bg-dark-rgba col-md-6 col-sm-12">
			<div class="card-body">
				<h1 class="card-title text-center mb-2">Inicia sesión</h1>
				@if(isset($status))
					@if($status == 'warning')
						<div id="msj-w" class="alert alert-warning">
							{{ $msj }}
						</div>
					@elseif($status == 'error')
						<div id="msj-e" class="alert alert-danger">
							{{ $msj }}
						</div>
					@endif
				@endif
				<form action="{{ route('signin') }}" method="POST">
					@csrf
					<div class="form-group mb-5">
						<label for="" class="form-control bg-transparent border-orange text-white">Correo</label>
						<input type="email" required class="form-control" name="email" placeholder="ejemplo@gmail.com">
					</div>
					<div class="form-group mb-5">
						<label for="" class="form-control bg-transparent border-orange text-white">Contraseña</label>
						<input type="password" required class="form-control" name="pass" placeholder="Contraseña">
					</div>
					@if(isset($_GET["oops"]))
				   		<input type="hidden" name="url" value="{{$_GET["oops"]}}">
				    @endif
					<input type="submit" class="btn btn-orange text-white col-12">
				</form>
				<hr>
				<small class="text-info"><a href="">¿No tienes cuenta? registrate</a></small>
				<small class="text-info"><a href="#">¿Olvidate tu contraseña?</a></small>
			</div>
		</div>
	</div>
@endsection