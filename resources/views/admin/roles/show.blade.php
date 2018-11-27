@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $roles->name }}</p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-12">
				<div class="field">
					<label class="label">Descripcion</label>
					<input class="input" value="{{ $roles->descripcion }}" disabled>
				</div>
			</div>
		</div>
	</div>
    <div class="panel-block">
      <a class="button is-medium is-link is-outlined" href="{{ url('/roles/'. $roles->id .'/editar') }}">Editar</a>
      <a class="button is-medium is-link is-outlined align-left" href=" {{ url('roles') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection