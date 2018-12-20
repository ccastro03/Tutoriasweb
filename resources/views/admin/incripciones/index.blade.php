@extends('layouts.main')

@section('content')
<div class="column is-12" id="appPrueba">
	<div class="panel">
		<p class="panel-heading">Listado de inscripciones</p>
		<div class="panel-block">
			<a href="{{ url('/incripciones/crear') }}" class="button is-medium is-link is-rounded is-outlined">Crear</a>
			<!-- <a href="{{ url('/incripciones/enviarcorreo') }}" class="button is-medium is-link is-rounded is-outlined">Correo</a> -->
		</div>
		@if (session('status'))
		<div class="panel-block">
		  <div class="notification is-success">
			<button class="delete"></button>
			{{ session('status') }}
		  </div>
		</div>      
		@endif
		<div class="panel-block">
			<tabla-inscripciones></tabla-inscripciones>		
		</div>            
	  
	</div>
</div>
@endsection