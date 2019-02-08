@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Inscripción de <b>{{ strtoupper($estudiante->nomcomple) }} </b></p>
    <div class="panel-block">
		<div class="columns">
			<div class="column is-one-third">
				<label class="label">Responsable</label>
				<input type="text" id="responsable" value="{{ strtoupper($responsable->nomcomple) }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-fifth" style="width: 160px">
				<label class="label">Fecha</label>
				<input type="text" id="fecha" value="{{ $inscripciones->fechainscrip }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-fifth">
				<label class="label">Sede</label>
				<input type="text" id="sede" value="{{ strtoupper($sedes->nombre) }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-fifth" style="width: 120px">
				<label class="label">Pago</label>
				<input type="text" id="pago" value="{{ $inscripciones->pago }} " class="input {{ $errors->has('pago') ? ' is-danger' : '' }}" disabled>
			</div>

			<div class="column is-one-fifth">
				<label class="label">Fecha pago</label>
				<input type="date" id="fecpago" value="{{ $inscripciones->fechapago }}" class="input {{ $errors->has('fecpago') ? ' is-danger' : '' }}" disabled>
			</div>
		</div>
	</div>
	
	<div class="panel-block">
		<div class="columns">
			<div class="column is-one-fifth" style="width: 140px">
				<label class="label">Estado verificada</label>
				<input type="text" id="verificada" value="{{ $inscripciones->verificada }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>

			<div class="column is-one-fifth">
				<label class="label">Fecha verificación</label>
				<input type="date" id="fecverif" value="{{ $inscripciones->fechaverif }}" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" disabled>
			</div>
					
			<div class="column is-one-fifth" style="width: 160px;">
				<label class="label">Estado citación</label>
				<input type="text" id="citacion" value="{{ $inscripciones->citacion }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-third" style="width: 326px;">
				<label class="label">Observacion citacion</label>
				<textarea class="textarea has-fixed-size" id="obscitacion" disabled>{{ strtoupper($inscripciones->obs_cita) }}</textarea>
			</div>
			
			<div class="column is-one-fifth">
				<label class="label">Fecha citación</label>
				<input type="date" id="feccita" value="{{ $inscripciones->fechaobserv }}" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" disabled>
			</div>			
		</div>
	</div>			
			
	<div class="panel-block">
		<div class="columns">			
			<div class="column is-one-fifth" style="width: 140px">
				<label class="label">Estado aprobada</label>
				<input type="text" id="aprobada" value="{{ $inscripciones->aprobada }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
			</div>
			
			<div class="column is-one-third" style="width: 368px;">
				<label class="label">Observacion aprobada</label>
				<textarea class="textarea has-fixed-size" id="obsaprobada" disabled>{{ strtoupper($inscripciones->obs_aprueba) }}</textarea>
			</div>
			
			<div class="column is-one-fifth">
				<label class="label">Fecha aprobación</label>
				<input type="date" id="fecaproba" value="{{ $inscripciones->fechaaprue }}" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" disabled>
			</div>			
		</div>
	</div>
    <div class="panel-block">
		<a class="button is-medium is-link is-outlined align-left" href=" {{ url('incripciones') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection