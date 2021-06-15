<div class="row">
	@forelse ($usuarioPeliculas as $usuarioPelicula)
		{{--<div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center">
										    <div class="card border-card-orange" style="width: 18rem;">
										        <img src="{{ Storage::url('cover/'.$usuarioPelicula->cover) }}" class="card-img-top" alt="...">
										        <div class="card-body">
										            <h5 class="card-title text-dark">{{ $usuarioPelicula->titulo }}</h5>
										            <h6 class="card-subtitle mb-2 text-muted">{{ $usuarioPelicula->time }}</h6>
										            <a href="{{ route('user.watchMovie', ['id'=>$usuarioPelicula->idpelicula]) }}" class="btn btn btn-orange col-12 text-white">Ver Pelicula</a>
										        </div>
										    </div>
										</div>--}}
										{{ $usuarioPelicula }}
	@empty
		<div class="alert alert-secondary text-center">
            Aún no has visto alguna pelicula
        </div>
	@endforelse
</div>