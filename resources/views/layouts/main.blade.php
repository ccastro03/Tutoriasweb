<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tutorias Web') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
      <!-- Navbar start -->
      <nav class="navbar is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item">
            <img src="{{ asset('img/logo.jpg') }}" width="112" height="28">
          </a>
          <a class="navbar-burger burger" aria-label="menu" role="button" aria-expanded="false" data-target="navbarArquidiocesis">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarArquidiocesis" class="navbar-menu">
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
</body>
</html>