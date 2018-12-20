@extends('layouts.main')

@section('content')
<div class="column is-12">
	<div class="panel">
		<p class="panel-heading">Editar Inscripción de <b>{{ $estudiante->nombre }} {{ $estudiante->apellido1 }} {{ $estudiante->apellido2 }}</b></p>
		<div class="panel-block">
			<form class="long-form" action="{{ route('incripciones.update', $inscripciones->codigo) }}" method="post">
				<div class="columns">
					<div class="column is-one-quarter">
						<label class="label">Estudiante</label>
						<input type="text" id="estudiante" value="{{ $estudiante->nombre }} {{ $estudiante->apellido1 }} {{ $estudiante->apellido2 }}" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
					</div>
					
					<div class="column is-one-fifth">
						<label class="label">Fecha</label>
						<input type="text" id="fecha" value="{{ $inscripciones->fechainscrip }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
					</div>
					
					<div class="column is-one-fifth" style="width: 240px">
						<label class="label">Sede</label>
						<div class="select">
							<select name="sede" id="sede">
								<option value="">Seleccione</option>
								@foreach($sedes->all() as $sede)
									@if ($sede->codigo === $inscripciones->sede)
										<option value="{{ $sede->codigo }}" selected>{{ $sede->nombre }}</option>
									@else
										<option value="{{ $sede->codigo }}">{{ $sede->nombre }}</option>
									@endif
								@endforeach							
							</select>
						</div>
						<p class="help is-danger" id="ErrSede" hidden>Campo obligatorio *</p>
					</div>
					
					<div class="column is-one-fifth">
						<label class="label">Verificada</label>
						<input type="checkbox" id="chverif" style="margin-left: 45px;" onclick="ValChVerificado()">
					</div>					
				</div>
				
				<div class="columns">
					<div class="column is-one-fifth" style="width: 115px">
						<label class="label">Citación</label>
						<input type="checkbox" id="chcita" style="margin-left: 45px;" onclick="ValChCitacion()">
					</div>
					
					<div class="column is-one-third">
						<label class="label">Observación citación</label>
						<textarea class="textarea has-fixed-size" id="obscitacion">{{ $inscripciones->citacion }}</textarea>
					</div>					
					
					<div class="column is-one-fifth" style="width: 115px">
						<label class="label">Aprobada</label>
						<input type="checkbox" id="chaprob" style="margin-left: 45px;">
					</div>

					<div class="column is-one-third">
						<label class="label">Observación aprobada</label>
						<textarea class="textarea has-fixed-size" id="obsaprobada">{{ $inscripciones->aprobada }}</textarea>
					</div>					
				</div>

				<hr>
        
				<button type="submit" class="button is-link is-medium is-outlined">Guardar</button>
				<a href="{{ url('incripciones') }}" class="button is-medium is-link is-outlined">Salir</a>
			</form>      
		</div>   
	</div>
</div>
<script>
	var ChVerifica = "<?php echo $inscripciones->verificada;?>";
	var ChCitacion = "<?php echo $inscripciones->citacion;?>";
	var ChAprobada = "<?php echo $inscripciones->aprobada;?>";
	
	if(ChVerifica == "S"){
		$("#chverif").attr('checked','checked');
	}
	
	if(ChCitacion == "S"){
		$("#chcita").attr('checked','checked');
	}

	if(ChAprobada == "S"){
		$("#chaprob").attr('checked','checked');
	}
</script>	
@endsection