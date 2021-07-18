<div class="row">
	<div class="container-fluid mt-2 mb-2">
		<div class="container" id="formTarjetas">
			<small id="msj-w" class="text-warning"></small>
			<small id="msj-e" class="text-danger"></small>
			<small id="msj-s" class="text-success"></small>
			<form action="" method="POST" id="tarjetasForm">
				<input type="hidden" name="idtarjeta" id="idformapago">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">Nombre titular</label>
							<input type="text" id="nomTitular" required class="form-control" name="nomTitular" placeholder="Nombre titular">
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">Apellido titular</label>
							<input type="text" id="appTitular" required class="form-control" name="appTitular" placeholder="Apellido titular">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">Tarjeta</label>
							<select name="tipoTarjeta" id="">
								<option value="">Selcciona</option>
								@forelse ($tipoTarjetas as $tipoTarjeta)
									<option value="{{ $tipoTarjeta->idtipoTarjeta }}">
										{{ $tipoTarjeta->tarjeta }}
									</option>
								@empty
									<option value="0">No hay tarjetas</option>
								@endforelse
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">N° tarjeta</label>
							<input type="text" id="numTarjeta" required class="form-control" name="numTarjeta" placeholder="16 numeros de tarjeta">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">Fecha de vencimiento</label>
							<input type="text" id="dateVencimiento" required class="form-control" name="dateVencimiento" placeholder="mm/yy">
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group mb-2">
							<label for="" class="form-control bg-transparent border-orange text-white">CVV</label>
							<input type="text" minlength="3" maxlength="3" id="cvv" required class="form-control" name="cvv" placeholder="***">
						</div>
					</div>
				</div>
			</form>
		</div>
		<button id="save" class="btn btn-orange text-white">Guardar</button>
		<button id="cancel" class="btn btn-danger">Cancelar</button>
		<button id="add" class="btn btn-success">Añadir</button>
	</div>
	<table class="table table-bordered border-danger text-white">
		<thead>
			<tr>
				<th scope="col">Titular</th>
				<th scope="col">Tarjeta</th>
				<th scope="col">N° tarjeta</th>
				<th scope="col">Vencimiento</th>
				<th scope="coll">Ación</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($usuarioTarjetas as $usuarioTarjeta)
				<tr>
					<td>{{ $usuarioTarjeta->nombreTitular }}</td>
					<td>{{ $usuarioTarjeta->idtipoTarjeta }}</td>
					<td>{{ $usuarioTarjeta->numeroTarjeta }}</td>
					<td>{{ $usuarioTarjeta->vencimiento }}</td>
					<td>
						<button type="button" onclick="edit({{ $usuarioTarjeta->idmetodoPago }})" class="btn btn-warning">
							Editar
						</button>
					</td>
				</tr>
			@empty
				<div class="alert alert-danger text-center">
					Aún no tiene tarjetas registradas
				</div>
			@endforelse

		</tbody>
		<tfoot>
			<tr>
				<th scope="col">Titular</th>
				<th scope="col">Tarjeta</th>
				<th scope="col">N° tarjeta</th>
				<th scope="col">Vencimiento</th>
				<th scope="coll">Ación</th>
			</tr>
		</tfoot>
	</table>
</div>

@section('js')
	<script>
		$("#msj-w").hide();
		$("#msj-e").hide();
		$("#msj-s").hide();
		$("#formTarjetas").hide();
		$("#save").prop('disabled', true);

		$("#cancel").click(function(event) {
			$("#formTarjetas").hide();
			$("#save").prop('disabled', true);
			$("#add").prop('disabled', false);
			clean();
		});
		//send the from to save or edit the card
		$("#save").click(function(event) {
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route('user.myCardEdit') }}',
				type: 'POST',
				dataType: 'json',
				data: $("#tarjetasForm").serialize()
			})
			.done(function(data) {
				if (data.status == "warning"){
					$("#msj-w").show();
					$("#msj-e").hide();
					$("#msj-s").hide();
					$("#msj-w").empty();
					$("#msj-w").append(data.msj);
				}else if(data.status == "error"){
					$("#msj-w").hide();
					$("#msj-e").show();
					$("#msj-s").hide();
					$("#msj-e").empty();
					$("#msj-e").append(data.msj);
				}else{
					$("#msj-w").hide();
					$("#msj-e").hide();
					$("#msj-s").show();
					$("#msj-s").empty();
					$("#msj-s").append(data.msj);
					location.reload();
				}
			});

		})
		//show the form
		$("#add").click(function(event) {
			$("#formTarjetas").show();
			$(this).prop('disabled', true);
			$("#save").prop('disabled', false);
		});
		//get the values of the card
		function edit(idtarjeta){
			$("#formTarjetas").show();
			$("#save").prop('disabled', false);
			$("#add").prop('disabled', true);
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route('user.myFindCard') }}/'+idtarjeta,
				type: 'GET',
				dataType: 'json',
			})
			.done(function(data) {
				if (data.status == "success"){
					$("#idformapago").val(data.tarjeta.idmetodoPago);
					$("#nomTitular").val(data.tarjeta.nombreTitular);
					$("#appTitular").val(data.tarjeta.apellidoTitular);
					$("#numTarjeta").val(data.tarjeta.numeroTarjeta);
					$("#dateVencimiento").val(data.tarjeta.vencimiento);
					$("#cvv").val(data.tarjeta.cvv);
				}
			});
		}

		function clean(){
			$("#idformapago").val("");
			$("#nomTitular").val("");
			$("#appTitular").val("");
			$("#numTarjeta").val("");
			$("#dateVencimiento").val("");
			$("#cvv").val("");
		}
	</script>
@endsection