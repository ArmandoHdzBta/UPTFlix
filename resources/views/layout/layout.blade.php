<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- BOOTSTRAP CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{-- CSS IF NEED --}}
    <style type="text/css">
    	.btn-orange{
    		background: rgb(255,69,0);
    	}
    	.border-orange{
    		border: none;
    		border-left: 3.5px solid rgb(255,69,0);
    	}
    </style>
    @yield('css')
    <title>@yield('title', "UPTFlix")</title>
</head>
<body class="bg-dark text-white">
    <!-- NAV BAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark ml-0 col-12">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><h2>UPTFLIX</h2></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('iniciarsesion') }}" class="nav-link">Iniciar sesión</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('registrarse') }}">Registrarte</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

    @yield('content')

    <!-- SCRIPTS BOOTSTRAP -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	{{-- JQUERY --}}
	<script src="/js/jquery.min.js"></script>
	{{-- JS IF NEED --}}
	@yield('js')
    <!-- ANIMATION SCRIPT -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>