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
	
    <!-- Scripts -->
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
	<!-- Navbar start -->
	<nav class="navbar is-info" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a href="/" class="navbar-item"><img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"></a>
			<a class="navbar-burger burger" aria-label="menu" role="button" aria-expanded="false" data-target="navbarpptal">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>
		
		<div id="navbarPptal" class="navbar-menu">
			<div class="navbar-start">              
				<a href="{{ url('/nuevaInscripcion') }}" class="navbar-item">Inscripciones</a>
				<label id="guest" hidden>{{ auth()->guest() }}</label>
			</div>			
		</div>   
	</nav>
	
	<main class="container">
		@yield('content')
	</main>
	
	<script src="{{ asset('js/app.js') }}" ></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
</body>
</html>
