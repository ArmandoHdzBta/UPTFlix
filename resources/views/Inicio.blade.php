@extends('layout.layout')

@section('css')
    <style>
        .cover{
            width: 100%;
            background-size: cover;
        }
        .border-card-orange{
            border: 3.5px solid rgb(255,69,0);
        }
    </style>
@endsection

@section('title', 'UPTFlix')

@section('content')
    <!-- BANNER -->
    <img src="https://lh3.googleusercontent.com/AeBQfsxRtNJznIAX2UWc1FXVpekl2niEPyobyX1otwiwFt9u4wMJ8yPFU40CfGlABqPKuxoJjxjcZOBGLx2ily9wqg=w800?s=300" alt="" class="cover">
    <!-- CONTAINER -->
    <div class="container mt-5">
        <div class="row" id="contenido">
            <div class="col-md-4 col-sm-6 mb-2 d-flex justify-content-center">
                <div class="card border-card-orange" style="width: 18rem;">
                    <img src="{{ Storage::url('cover/coverP.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-dark">UP: Una aventura de altura</h5>
                        <h6 class="card-subtitle mb-2 text-muted">1:30h</h6>
                        <a href="" class="btn btn btn-orange col-12 text-white">Ver Pelicula</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2 d-flex justify-content-center">
                <div class="card bg-secondary" style="width: 18rem;">
                    <img src="{{ Storage::url('cover/coverP.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-dark">titulo</h5>
                        <h6 class="card-subtitle mb-2 text-muted">time</h6>
                        <a href="" class="btn btn btn-orange col-12 text-white">Ver Pelicula</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2 d-flex justify-content-center" id="cardP">
                <div class="card bg-secondary border-card-orange" style="width: 18rem;">
                    <img src="{{ Storage::url('cover/coverP.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-dark">titulo</h5>
                        <h6 class="card-subtitle mb-2 text-muted">time</h6>
                        <a href="" class="btn btn btn-orange col-12 text-white">Ver Pelicula</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /*$(document).ready(function() {
            window.onscroll = function(){
                if((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight){
                    const section = document.getElementById('contenido');
                    section.innerHTML += ;
                }
            }
        });*/
    </script>
@endsection