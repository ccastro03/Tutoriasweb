@extends('layouts.main')

@section('content')
<div class="column is-12">
	<div class="panel">
		<p class="panel-heading">Listado de prepagada</p>
		<div class="panel-block">
			<a href="{{ url('/prepagada/crear') }}" class="button is-medium is-link is-rounded is-outlined">Crear</a>
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
		  <tabla-prepagada></tabla-prepagada>
		</div>            
	  
	</div>
</div>
@endsection