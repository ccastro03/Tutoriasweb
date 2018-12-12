@extends('layouts.main')

@section('content')
<div class="column is-12" id="appPrueba">
	<div class="panel">
		<p class="panel-heading">Listado de funciones</p>
		<div class="panel-block">
			<a href="{{ url('/funciones/crear') }}" class="button is-medium is-link is-rounded is-outlined">Crear</a>
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
		  <tabla-funciones></tabla-funciones>
		</div>            
	  
	</div>
</div>
@endsection