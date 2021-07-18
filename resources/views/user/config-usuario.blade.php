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

@section('title')
	{{ session('usuario')->nombre }} | Configuración
@endsection

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				@include('user.partials.sub-menu')
			</div>
			<div class="col-lg-7 col-md-12">
				@if (request()->routeIs('user.profile'))
					@include('user.views.profile')
				@elseif(request()->routeIs('user.myCards'))
					{{-- mandar las variables a la vista  --}}
					@include('user.views.mis-tarjetas', ['usuarioTarjetas'=>$usuarioTarjetas, 'tipoTarjetas'=>$tipoTarjetas])
				@elseif(request()->routeIs('user.myProfiles'))
					@include('user.views.mis-perfiles')
				@elseif(request()->routeIs('user.myMovies'))
					@include('user.views.mis-peliculas', ['usuarioPeliculas'=>$usuarioPeliculas])
				@endif
			</div>
		</div>
	</div>
@endsection