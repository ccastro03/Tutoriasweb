<html>
<head>
	@foreach($estudiante->all() as $estu)
		<title>Reporte Inscripcion {{ $estu->nombre }} {{ $estu->apellido1 }}</title>
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
				<td>{{ $estu->nombre }}</td>
				<td>{{ $estu->apellido1 }}</td>
				<td>{{ $estu->apellido2 }}</td>
				<td>{{ $estu->genero }}</td>
				<td>{{ $estu->tipodocumento }}</td>
				<td>{{ $estu->numdocumento }}</td>
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
				<td>{{ $estu->direccion }}</td>
				<td>{{ $estu->barrio }}</td>
				<td>{{ $estu->numtelefono }}</td>
				<td>{{ $estu->numcelular }}</td>
				<td>{{ $estu->email }}</td>
				<td>{{ $estu->fechanace }}</td>
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
				<td>{{ $estu->cod_pais_nace }}</td>
				<td>{{ $estu->cod_ciu_nace }}</td>
				<td>{{ $estu->tiposangre }}</td>
				<td>{{ $estu->sede }}</td>
				<td>{{ $estu->grado }}</td>
				<td>{{ $estu->jornada }}</td>
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
				<td>{{ $estu->grpetnico }}</td>
				<td>{{ $estu->sisben }}</td>
				<td>{{ $estu->nvlsisben }}</td>
				<td>{{ $estu->cod_eps }}</td>
				<td>{{ $estu->cod_prepagada }}</td>
				<td>{{ $estu->cod_religion }}</td>
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
				<td>{{ $estu->cod_ciud_proced }}</td>
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
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
				<td>{{ $resp->tipodocumento }}</td>
				<td>{{ $resp->numdocumento }}</td>
				<td>{{ $resp->cod_estcivi }}</td>
				<td>{{ $resp->cod_pais_nace }}</td>
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
				<td>{{ $resp->cod_profesion }}</td>
				<td>{{ $resp->cod_especialidad }}</td>
				<td>{{ $resp->empresa }}</td>				
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
				<td>{{ $acu->tipodocumento }}</td>
				<td>{{ $acu->numdocumento }}</td>
				<td>{{ $acu->cod_estcivi }}</td>
				<td>{{ $acu->cod_pais_nace }}</td>
			</tr>
			@endforeach
		</tbody>
		
		<thead>
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
				<td>{{ $acu->cod_profesion }}</td>
				<td>{{ $acu->cod_especialidad }}</td>
				<td>{{ $acu->empresa }}</td>				
			</tr>
			@endforeach
		</tbody>

		<thead>
			<tr style="background-color: #3bb1ff; font-weight: bold;">
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
</body>
</html>