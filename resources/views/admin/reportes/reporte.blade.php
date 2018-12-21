<html>
<head>
	@foreach($estudiante->all() as $estu)
		<title>Reporte Inscripcion {{ strtoupper($estu->nombre) }} {{ strtoupper($estu->apellido1) }}</title>
	@endforeach
	
	<style>
		table{
			font-family: arial, sans-serif;
			font-size: 12px;
			border-collapse;
			width: 100%;
		}
		td, th{
			border: 1px solid #dddddd;
			text-align: left;
			padding: 5px;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<td colspan="6" style="text-align: center; font-size: 13px; font-weight: bold;">ESTUDIANTE</td>
			</tr>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Nombres</td>
				<td>Primer apellido</td>
				<td>Segundo apellido</td>
				<td>Genero</td>
				<td>Tipo documento</td>
				<td>Numero documento</td>
			</tr>
		</thead>
		<tbody>
			@foreach($estudiante->all() as $estu)
			<tr>
				<td>{{ strtoupper($estu->nombre) }}</td>
				<td>{{ strtoupper($estu->apellido1) }}</td>
				<td>{{ strtoupper($estu->apellido2) }}</td>

				@foreach($generos->all() as $genero)
					@if ($genero->codigo === $estu->genero)
						<td>{{ strtoupper($genero->nombre) }}</td>
					@endif
				@endforeach
				
				@foreach($tipodocumentos->all() as $tpdocu)
					@if ($tpdocu->codigo === $estu->tipodocumento)
						<td>{{ strtoupper($tpdocu->nombre) }}</td>
					@endif
				@endforeach
		
				<td>{{ strtoupper($estu->numdocumento) }}</td>
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Dirección</td>
				<td>Barrio</td>
				<td># Telefono</td>
				<td># Celular</td>
				<td>Email</td>
				<td>Fecha Nacimiento</td>
			</tr>
		</thead>
		<tbody>
			@foreach($estudiante->all() as $estu)
			<tr>
				<td>{{ strtoupper($estu->direccion) }}</td>
				@foreach($barrios->all() as $barrio)
					@if ($barrio->cod_barrio === $estu->barrio)
						<td>{{ strtoupper($barrio->nombre) }}</td>
					@endif
				@endforeach
				<td>{{ strtoupper($estu->numtelefono) }}</td>
				<td>{{ strtoupper($estu->numcelular) }}</td>
				<td>{{ ($estu->email) }}</td>
				<td>{{ strtoupper($estu->fechanace) }}</td>
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Pais nacimiento</td>
				<td>Ciudad nacimiento</td>
				<td>RH</td>
				<td>Sede</td>
				<td>Grado</td>
				<td>Jornada</td>
			</tr>
		</thead>
		<tbody>
			@foreach($estudiante->all() as $estu)
			<tr>
				@foreach($paises->all() as $pais)
					@if ($pais->codigo === $estu->cod_pais_nace)
						<td>{{ strtoupper($pais->nombre) }}</td>
					@endif
				@endforeach
				
				@foreach($ciudades->all() as $ciudad)
					@if ($ciudad->cod_ciudad === $estu->cod_ciu_nace)
						<td>{{ strtoupper($ciudad->nombre) }}</td>
					@endif
				@endforeach
				
				<td>{{ $estu->tiposangre }}</td>
				
				@foreach($sedes->all() as $sede)
					@if ($sede->codigo === $estu->sede)
						<td>{{ strtoupper($sede->nombre) }}</td>
					@endif
				@endforeach
				
				<td>{{ $estu->grado }}</td>
				
				@foreach($jornadas->all() as $jornada)
					@if ($jornada->codigo === $estu->jornada)
						<td>{{ ($jornada->nombre) }}</td>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Etnia</td>
				<td>Sisben</td>
				<td>Nivel</td>
				<td>Eps</td>
				<td>Prepagada</td>
				<td>Religion</td>
			</tr>
		</thead>
		<tbody>
			@foreach($estudiante->all() as $estu)
			<tr>
				@foreach($etnias->all() as $etnia)
					@if ($etnia->codigo === $estu->grpetnico)
						<td>{{ $etnia->nombre }}</td>
					@endif
				@endforeach
				
				<td>{{ $estu->sisben }}</td>
				<td>{{ $estu->nvlsisben }}</td>
				
				@foreach($eps->all() as $ep)
					@if ($ep->codigo === $estu->cod_eps)
						<td>{{ $ep->nombre }}</td>
					@endif
				@endforeach
				
				@foreach($prepagadas->all() as $prepagada)
					@if ($prepagada->codigo === $estu->cod_prepagada)
						<td>{{ $prepagada->nombre }}</td>
					@endif
				@endforeach

				@foreach($religiones->all() as $religion)
					@if ($religion->codigo === $estu->cod_religion)
						<td>{{ $religion->nombre }}</td>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Seguro de Vida</td>
				<td>Aseguradora</td>
				<td>Ciudad procedencia</td>
				<td>Colegio procedencia</td>
				<td>Cobertura</td>
				<td>Desplazado</td>
			</tr>
		</thead>
		<tbody>
			@foreach($estudiante->all() as $estu)
			<tr>
				<td>{{ $estu->segurovida }}</td>
				<td>{{ $estu->asegurador }}</td>
				
				@foreach($ciudades->all() as $ciudad)
					@if ($ciudad->cod_ciudad === $estu->cod_ciud_proced)
						<td>{{ $ciudad->nombre }}</td>
					@endif
				@endforeach
				
				<td>{{ $estu->cole_proced }}</td>
				<td>{{ $estu->cobertura }}</td>
				<td>{{ $estu->desplazado }}</td>
			</tr>
			@endforeach
		</tbody>		
	</table>

	<br>
	<table>
		<thead>
			<tr>
				<td colspan="7" style="text-align: center; font-size: 13px; font-weight: bold;">RESPONSABLE</td>
			</tr>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Nombres</td>
				<td>Primer apellido</td>
				<td>Segundo apellido</td>
				<td>Tipo documento</td>
				<td>Numero documento</td>
				<td>Estado civil</td>
				<td>Pais nacimiento</td>
			</tr>
		</thead>
		<tbody>
			@foreach($responsable->all() as $resp)
			<tr>
				<td>{{ $resp->nombre }}</td>
				<td>{{ $resp->apellido1 }}</td>
				<td>{{ $resp->apellido2 }}</td>
				
				@foreach($tipodocumentos->all() as $tpresdocu)
					@if ($tpresdocu->codigo === $resp->tipodocumento)
						<td>{{ $tpresdocu->nombre }}</td>
					@endif
				@endforeach
				
				<td>{{ $resp->numdocumento }}</td>
				
				@foreach($estcivil->all() as $estciv)
					@if ($estciv->codigo === $resp->cod_estcivi)
						<td>{{ $estciv->nombre }}</td>
					@endif
				@endforeach
				
				@foreach($paises->all() as $paisres)
					@if ($paisres->codigo === $resp->cod_pais_nace)
						<td>{{ $paisres->nombre }}</td>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Dirección</td>
				<td># Telefono</td>
				<td># Celular</td>
				<td>Email</td>
				<td>Profesion</td>
				<td>Especialidad</td>
				<td>Empresa</td>
			</tr>
		</thead>
		<tbody>
			@foreach($responsable->all() as $resp)
			<tr>
				<td>{{ $resp->direccion }}</td>
				<td>{{ $resp->numtelefono }}</td>
				<td>{{ $resp->numcelular }}</td>
				<td>{{ $resp->email }}</td>
				
				@foreach($profesiones->all() as $proferes)
					@if ($proferes->codigo === $resp->cod_profesion)
						<td>{{ $proferes->nombre }}</td>
					@endif
				@endforeach
				
				@foreach($especialidades->all() as $esperes)
					@if ($esperes->codigo === $resp->cod_especialidad)
						<td>{{ $esperes->nombre }}</td>
					@endif
				@endforeach

				<td>{{ $resp->empresa }}</td>				
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Cargo</td>
				<td>Dirección empresa</td>
				<td>Telefono empresa</td>
				<td>Ex alumno</td>
				<td>Notificacion E-mail</td>
			</tr>
		</thead>
		<tbody>
			@foreach($responsable->all() as $resp)
			<tr>
				<td>{{ $resp->cargo }}</td>
				<td>{{ $resp->dirempresa }}</td>
				<td>{{ $resp->telempresa }}</td>
				<td>{{ $resp->exalumno }}</td>
				<td>{{ $resp->notifica }}</td>
			</tr>
			@endforeach
		</tbody>		
	</table>

	<br>
	<table>
		<thead>
			<tr>
				<td colspan="7" style="text-align: center; font-size: 13px; font-weight: bold;">ACUDIENTE</td>
			</tr>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Nombres</td>
				<td>Primer apellido</td>
				<td>Segundo apellido</td>
				<td>Tipo documento</td>
				<td>Numero documento</td>
				<td>Estado civil</td>
				<td>Pais nacimiento</td>
			</tr>
		</thead>
		<tbody>
			@foreach($acudiente->all() as $acu)
			<tr>
				<td>{{ $acu->nombre }}</td>
				<td>{{ $acu->apellido1 }}</td>
				<td>{{ $acu->apellido2 }}</td>
				
				@foreach($tipodocumentos->all() as $tpacudocu)
					@if ($tpacudocu->codigo === $acu->tipodocumento)
						<td>{{ $tpacudocu->nombre }}</td>
					@endif
				@endforeach
				
				<td>{{ $acu->numdocumento }}</td>
				
				@foreach($estcivil->all() as $estcivacu)
					@if ($estcivacu->codigo === $acu->cod_estcivi)
						<td>{{ $estcivacu->nombre }}</td>
					@endif
				@endforeach
				
				@foreach($paises->all() as $paisacu)
					@if ($paisacu->codigo === $acu->cod_pais_nace)
						<td>{{ $paisacu->nombre }}</td>
					@endif
				@endforeach				
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Dirección</td>
				<td># Telefono</td>
				<td># Celular</td>
				<td>Email</td>
				<td>Profesion</td>
				<td>Especialidad</td>
				<td>Empresa</td>				
			</tr>
		</thead>
		<tbody>
			@foreach($acudiente->all() as $acu)
			<tr>
				<td>{{ $acu->direccion }}</td>
				<td>{{ $acu->numtelefono }}</td>
				<td>{{ $acu->numcelular }}</td>
				<td>{{ $acu->email }}</td>
				
				@foreach($profesiones->all() as $profeacu)
					@if ($profeacu->codigo === $acu->cod_profesion)
						<td>{{ $profeacu->nombre }}</td>
					@endif
				@endforeach
				
				@foreach($especialidades->all() as $espeacu)
					@if ($espeacu->codigo === $acu->cod_especialidad)
						<td>{{ $espeacu->nombre }}</td>
					@endif
				@endforeach

				<td>{{ $acu->empresa }}</td>				
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #dddddd; font-weight: bold;">
				<td>Cargo</td>
				<td>Dirección empresa</td>
				<td>Telefono empresa</td>
				<td>Ex alumno</td>
				<td>Notificacion E-mail</td>
			</tr>
		</thead>
		<tbody>
			@foreach($acudiente->all() as $acu)
			<tr>
				<td>{{ $acu->cargo }}</td>
				<td>{{ $acu->dirempresa }}</td>
				<td>{{ $acu->telempresa }}</td>
				<td>{{ $acu->exalumno }}</td>
				<td>{{ $acu->notifica }}</td>				
			</tr>
			@endforeach
		</tbody>		
	</table>
	
	<br>
	<div style="font-family: arial, sans-serif; font-size: 12px;">
		<label>Texto expresando el porque sale del colegio <b>{{ $estu->cole_proced }}</b> y desea ingresar a nuestra institución</label>
		@foreach($estudiante->all() as $estu)
			<p><b>{{ $estu->observacion }}</b></p>
		@endforeach
	</div>
	
</body>
</html>