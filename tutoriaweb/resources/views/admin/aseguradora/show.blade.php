@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $aseguradora->codigo }}</p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-12">
				<div class="field">
					<label class="label">Nombre</label>
					<input class="input" value="{{ $aseguradora->nombre }}" disabled>
				</div>
			</div>
		</div>
	</div>
    <div class="panel-block">
		<a class="button is-medium is-link is-outlined" href="{{ url('/aseguradora/'. $aseguradora->codigo .'/editar') }}">Editar</a>
		<a class="button is-medium is-link is-outlined align-left" href=" {{ url('aseguradora') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection