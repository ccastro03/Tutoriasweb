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
</head>
<body>
    <div id="app">
        
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
			
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle navbar-item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimientos <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="{{ url('/roles') }}">Roles</a></li>
				<li><a href="{{ url('/funciones') }}">Funciones</a></li>
				<li><a href="#">Something else here</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Separated link</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">One more separated link</a></li>
			  </ul>
			</li>
			
          </div>
          <div class="navbar-end">
            <div class="navbar-item">          
              <div class="buttons">
                <label class="label align-right text-white">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </label>              
                
                <a class="button is-primary is-inverted is-outlined is-rounded" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
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
    </div>    
	
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>		
</body>
</html>