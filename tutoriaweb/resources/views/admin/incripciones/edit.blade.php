@extends('layouts.main')

@section('content')
<div class="column is-12">
	<div class="panel">
		<p class="panel-heading">Editar Inscripción de <b>{{ strtoupper($estudiante->nomcomple) }} </b></p>
		
		<div class="panel-block">
			<form class="long-form">
				<div class="columns">
					<div class="column is-one-third">
						<label class="label">Responsable</label>
						<input type="text" id="codInscrip" value="{{ $inscripciones->codigo }}" hidden>
						<input type="text" id="codEstud" value="{{ $inscripciones->numdocest }}" hidden>
						<input type="text" id="responsable" value="{{ strtoupper($responsable->nomcomple) }}" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
					</div>
					
					<div class="column is-one-fifth" style="width: 160px">
						<label class="label">Fecha</label>
						<input type="text" id="fecha" value="{{ $inscripciones->fechainscrip }} " class="input {{ $errors->has('name') ? ' is-danger' : '' }}" disabled>
					</div>
					
					<div class="column is-one-fifth">
						<label class="label">Sede</label>
						<div class="select">
							<select name="sede" id="sede">
								<option value="">Seleccione</option>
								@foreach($sedes->all() as $sede)
									@if ($sede->codigo === $inscripciones->sede)
										<option value="{{ $sede->codigo }}" selected>{{ strtoupper($sede->nombre) }}</option>
									@else
										<option value="{{ $sede->codigo }}">{{ strtoupper($sede->nombre) }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<p class="help is-danger" id="ErrSede" hidden>Campo obligatorio *</p>
					</div>
					
					<div class="column is-one-fifth" style="width: 120px">
						<label class="label">Pago</label>
						<input type="checkbox" style="margin-left: 20px;" id="chpago" onclick="ValChPago()">
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
						<label class="label">Verificada</label>
						<input type="checkbox" id="chverif" style="margin-left: 35px;" onclick="ValChVerificado()">
					</div>

					<div class="column is-one-fifth">
						<label class="label">Fecha verificación</label>
						<input type="date" id="fecverif" value="{{ $inscripciones->fechaverif }}" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" disabled>
					</div>
					
					<div class="column is-one-fifth" style="margin-left: 35px; width: 125px">
						<label class="label">Citación</label>
						<input type="checkbox" id="chcita" style="margin-left: 35px;" onclick="ValChCitacion()">
					</div>
					
					<div class="column is-one-third" style="width: 326px;">
						<label class="label">Observación citación</label>
						<textarea class="textarea has-fixed-size" id="obscitacion">{{ strtoupper($inscripciones->obs_cita) }}</textarea>
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
						<label class="label">Aprobada</label>
						<input type="checkbox" id="chaprob" style="margin-left: 35px;" onclick="ValChAprob()">
					</div>

					<div class="column is-one-third" style="width: 368px;">
						<label class="label">Observación aprobada</label>
						<textarea class="textarea has-fixed-size" id="obsaprobada">{{ strtoupper($inscripciones->obs_aprueba) }}</textarea>
					</div>
					
					<div class="column is-one-fifth">
						<label class="label">Fecha aprobación</label>
						<input type="date" id="fecaproba" value="{{ $inscripciones->fechaaprue }}" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" disabled>
					</div>					
				</div>
			</div>
        
			<div class="panel-block">
				<a class="button is-link is-medium is-outlined" onclick="UpdInscripcion()">Guardar</a>
				&nbsp;
				<a href="{{ url('incripciones') }}" class="button is-medium is-link is-outlined">Salir</a>
			</div>
			</form>      
		</div>   
	</div>
</div>
<script>
	var ChVerifica = "<?php echo $inscripciones->verificada;?>";
	var ChCitacion = "<?php echo $inscripciones->citacion;?>";
	var ChAprobada = "<?php echo $inscripciones->aprobada;?>";
	var ChPago = "<?php echo $inscripciones->pago;?>";
	
	if(ChVerifica == "S"){
		$("#chverif").attr('checked','checked');
	}
	
	if(ChCitacion == "S"){
		$("#chcita").attr('checked','checked');
	}

	if(ChAprobada == "S"){
		$("#chaprob").attr('checked','checked');
	}
	
	if(ChPago == "S"){
		$("#chpago").attr('checked','checked');
	}	
</script>	
@endsection