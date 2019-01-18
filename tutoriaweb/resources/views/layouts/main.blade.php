<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
	
	<link href="{{ asset('css/open-iconic.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/open-iconic-bootstrap.min.css') }}" rel="stylesheet">
	
    <!-- Scripts -->
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>	
</head>
<body>
	  <!-- Navbar start -->
	  <nav class="navbar is-info" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
		  <a href="/" class="navbar-item">
			<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
		  </a>
		  <a class="navbar-burger burger" aria-label="menu" role="button" aria-expanded="false" data-target="navbarpptal">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		  </a>
		</div>

		<div id="navbarPptal" class="navbar-menu">
		<label id="guest" hidden>{{ auth()->guest() }}</label>
		@guest
		  <div class="navbar-end">
			  <div class="navbar-item">
				  <div class="buttons">
					  <a class="button is-primary is-inverted is-outlined is-rounded" href="{{ route('login') }}">Iniciar sesion</a>                      
				  </div>
			  </div>
		  </div>
		@else
		
		  <div class="navbar-start">              
			<a href="{{ url('/home') }}" class="navbar-item">Inicio</a>
			
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link" >Maestros</a>
				<div class="navbar-dropdown is-boxed">
					@if (Auth::user()->cod_rol == "01")
						<a class="navbar-item" href="{{ url('/roles') }}">Roles</a>
						<a class="navbar-item" href="{{ url('/funciones') }}">Funciones</a>
						<a class="navbar-item" href="{{ url('/paises') }}">Paises</a>
						<a class="navbar-item" href="{{ url('/ciudades') }}">Ciudades</a>
						<a class="navbar-item" href="{{ url('/prepagada') }}">Prepagadas</a>
						<a class="navbar-item" href="{{ url('/eps') }}">EPS</a>
						<a class="navbar-item" href="{{ url('/barrios') }}">Barrios</a>
						<a class="navbar-item" href="{{ url('/sedes') }}">Sedes</a>
						<a class="navbar-item" href="{{ url('/jornadas') }}">Jornadas</a>
						<a class="navbar-item" href="{{ url('/grados') }}">Grados</a>
						<a class="navbar-item" href="{{ url('/etnias') }}">Etnias</a>
						<a class="navbar-item" href="{{ url('/aseguradora') }}">Aseguradoras</a>
						<a class="navbar-item" href="{{ url('/religion') }}">Religiones</a>
						<a class="navbar-item" href="{{ url('/tipodocumentos') }}">Tipo Documentos</a>
						<a class="navbar-item" href="{{ url('/generos') }}">Generos</a>
						<a class="navbar-item" href="{{ url('/profesiones') }}">Profesiones</a>
						<a class="navbar-item" href="{{ url('/especialidades') }}">Especialidades</a>
						<a class="navbar-item" href="{{ url('/estadocivil') }}">Estado Civil</a>
						<hr class="navbar-divider">
						<a class="navbar-item" href="{{ url('/incripciones') }}">Incripciones</a>
					@endif
					
					@if (Auth::user()->cod_rol == "02")
						<a class="navbar-item" href="{{ url('/incripciones') }}">Incripciones</a>
					@endif
				</div>
			</div>
	  
		  </div>
		  <div class="navbar-end">
			<div class="navbar-item">          
			  <div class="buttons">
				<label class="label align-right text-white">
					{{ Auth::user()->name }} <span class="caret"></span>
				</label>              
				
				<a class="button is-primary is-inverted is-outlined is-rounded" onclick="CerrarSession();">
				  {{ __('Logout') }}
				</a>
				
				<a class="button is-primary is-inverted is-outlined is-rounded" onclick="event.preventDefault();
				  document.getElementById('logout-form').submit();" id="logout" style="display: none;">
				  {{ __('Logout') }}
				</a>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			  </div>
			</div>
		  </div>
		@endguest
		</div>   
	</nav>
	 
	<main class="container">
		<div class="columns is-mobile">
			@yield('content')
		</div>        
	</main>      
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	<script>
		function CerrarSession(){
			swal({
			  title: "¿Está seguro de cerrar la session?",
			  text: "",
			  icon: "warning",
			  buttons: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$("#logout").click();
				}
			});	
		};
	</script>
</body>
</html>