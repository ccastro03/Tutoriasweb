@extends('layouts.main')

@section('content')
<div class="column is-12">
	<div class="panel">
		<p class="panel-heading">Listado de grados</p>
		<div class="panel-block">
			<a href="{{ url('/grados/crear') }}" class="button is-medium is-link is-rounded is-outlined">Crear</a>
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
			<tabla-grados></tabla-grados>
		</div>            
	  
	</div>
</div>
@endsection