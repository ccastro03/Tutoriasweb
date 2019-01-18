@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $roles->codigo }}</p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-half">
					<label class="label">Nombre</label>
					<input class="input" value="{{ $roles->name }}" disabled>
			</div>
			
			<div class="column">			
				<label class="label">Descripcion</label>
				<input class="input" value="{{ $roles->descripcion }}" disabled>
			</div>
		</div>
	</div>
    <div class="panel-block">
      <a class="button is-medium is-link is-outlined" href="{{ url('/roles/'. $roles->codigo .'/editar') }}">Editar</a>
      <a class="button is-medium is-link is-outlined align-left" href=" {{ url('roles') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection