@extends('layouts.main')

@section('content')
<div class="column is-12" id="appPrueba">
	<div class="panel">
		<p class="panel-heading">Listado de sedes</p>
		<div class="panel-block">
			<a href="{{ url('/sedes/crear') }}" class="button is-medium is-link is-rounded is-outlined">Crear</a>
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
			<tabla-sedes></tabla-sedes>
		</div>            
	  
	</div>
</div>
@endsection