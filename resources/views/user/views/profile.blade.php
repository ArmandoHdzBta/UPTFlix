<div class="row">
	<div class="row mb-2">
		<div class="col-lg-12 d-flex justify-content-center">
			<img src="{{ Storage::url('avatar/'.session('usuario')->avatar) }}" alt="">
		</div>
	</div>
	<div class="col-lg-12 ml-5">
		<form action="" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Nombre</label>
						<input type="text" required class="form-control" name="nombre" placeholder="Nombre" value="{{ session('usuario')->nombre }}">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Apellido paterno</label>
						<input type="text" required class="form-control" name="app" placeholder="Apellido paterno" value="{{ session('usuario')->apellido_pat }}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Apellido materno</label>
						<input type="text" required class="form-control" name="apm" placeholder="Apellido materno" value="{{ session('usuario')->apellido_mat }}">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Correo</label>
						<input type="email" required class="form-control" name="email" placeholder="ejemplo@gmail.com" value="{{ session('usuario')->correo }}">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Direccion</label>
						<input type="text" required class="form-control" name="address" placeholder="Direccion" value="{{ session('usuario')->direccion }}">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group mb-2">
						<label for="" class="form-control bg-transparent border-orange text-white">Avatar</label>
						<input type="file" required class="form-control" name="avatar">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-orange text-white col-12" id="update" value="Guardar">
		</form>
	</div>
</div>