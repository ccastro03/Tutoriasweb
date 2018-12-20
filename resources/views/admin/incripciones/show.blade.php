@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Inscripción de <b>{{ $estudiante->nombre }} {{ $estudiante->apellido1 }} {{ $estudiante->apellido2 }}</b></p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-one-quarter">
				<label class="label">Estudiante</label>
				<input type="text" id="estudiante" value="{{ $estudiante->nombre }} {{ $estudiante->apellido1 }} {{ $estudiante->apellido2 }}" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-fifth">
				<label class="label">Fecha</label>
				<input type="text" id="fecha" value="{{ $inscripciones->fechainscrip }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-fifth">
				<label class="label">Sede</label>
				<input type="text" id="sede" value="{{ $sedes->nombre }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>			
			
			<div class="column is-one-fifth">
				<label class="label">Estado verificada</label>
				<input type="text" id="verificada" value="{{ $inscripciones->verificada }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
		</div>
	</div>
	
	<div class="panel-block">
		<div class="columns">
			<div class="column is-one-fifth" style="width: 160px">
				<label class="label">Estado citación</label>
				<input type="text" id="citacion" value="{{ $inscripciones->citacion }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" style="width: 125px" disabled>
			</div>
			
			<div class="column is-one-third">
				<label class="label">Observacion citacion</label>
				<textarea class="textarea has-fixed-size" id="obscitacion" disabled>{{ $inscripciones->citacion }}</textarea>
			</div>			
			
			<div class="column is-one-fifth" style="width: 165px">
				<label class="label">Estado aprobada</label>
				<input type="text" id="aprobada" value="{{ $inscripciones->aprobada }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" style="width: 133px" disabled>
			</div>
			
			<div class="column is-one-third">
				<label class="label">Observacion aprobada</label>
				<textarea class="textarea has-fixed-size" id="obsaprobada" disabled>{{ $inscripciones->aprobada }}</textarea>
			</div>			
		</div>
	</div>
    <div class="panel-block">
		<a class="button is-medium is-link is-outlined align-left" href=" {{ url('incripciones') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection