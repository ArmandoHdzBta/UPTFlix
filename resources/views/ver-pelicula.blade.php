@extends('layout.layout')

@section('css')
	<style>
		.cover{
			background-image: linear-gradient(rgba(0,0,0,1), rgba(0,0,0,.2)), url({{ Storage::url('cover/'.$pelicula->cover) }});
			background-size: cover;
			width: 100%;
			margin: 0;
			min-height: 100vh;
			background-position: center;
  			background-repeat: no-repeat;
		}
	</style>
@endsection

@section('title')
	{{ $pelicula->titulo }}
@endsection

@section('content')
	<div class="container-fluid cover d-flex align-items-center">
		<div class="container">
			<div class="col-md-8 col-sm-12">
				<h2 class="text-white">{{ $pelicula->titulo }}</h2>
			</div>
			<div class="col-md-8 col-sm-12">
				<p class="text-white-50 text-justify">{{ $pelicula->sinopsis }}</p>
			</div>
			<div class="col-md-8 col-sm-12">
				<span class="text-white-50">{{ $pelicula->time }}</span>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
@endsection