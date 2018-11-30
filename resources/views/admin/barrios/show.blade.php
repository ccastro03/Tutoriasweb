@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $barrios->cod_barrio }}</p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-12">
				<div class="field">
					<label class="label">Nombre</label>
					<input class="input" value="{{ $barrios->nombre }}" disabled>
				</div>
			</div>
		</div>
	</div>
    <div class="panel-block">
		<a class="button is-medium is-link is-outlined" href="{{ url('/barrios/'.$barrios->cod_ciudad.'/'.$barrios->cod_barrio.'/editar') }}">Editar</a>
		<a class="button is-medium is-link is-outlined align-left" href=" {{ url('barrios') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection