@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $jornadas->codigo }}</p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-12">
				<div class="field">
					<label class="label">Nombre</label>
					<input class="input" value="{{ $jornadas->nombre }}" disabled>
				</div>
			</div>
		</div>
	</div>
    <div class="panel-block">
		<a class="button is-medium is-link is-outlined" href="{{ url('/jornadas/'. $jornadas->codigo .'/editar') }}">Editar</a>
		<a class="button is-medium is-link is-outlined align-left" href=" {{ url('jornadas') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection