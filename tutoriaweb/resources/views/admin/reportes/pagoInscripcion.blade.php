<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	@foreach($estudiante->all() as $estu)
		<title>Pago Inscripci&oacute;n {{ strtoupper($estu->nombre) }} {{ strtoupper($estu->apellido1) }}</title>
	@endforeach
	
	<style>
		table{
			font-family: arial, sans-serif;
			width: 100%;
		}
	</style>	
</head>
<body>
	<div>
		<table>
			<tbody>
				<tr>
					<td style="width: 10%;">
						<img src="https://placehold.it/128x128">
					</td>
					<td style="width: 28%;">
						<table>
							@foreach($colegio->all() as $cole)
								<tr align="center"><td style="font-size: 18px; font-weight: bold;">Colegio {{ $cole->nombre }}</td></tr>
								<tr align="center"><td style="font-size: 11.5px; font-weight: bold;">NIT: {{ $cole->cod_colegio }}</td></tr>
							@endforeach
						</table>						
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>							
						</table>
					</td>
					
					<td style="width: 10%;">
						<img src="https://placehold.it/128x128">
					</td>
					<td>
						<table>
							@foreach($colegio->all() as $cole)
								<tr align="center"><td style="font-size: 18px; font-weight: bold;">Colegio {{ $cole->nombre }}</td></tr>
								<tr align="center"><td style="font-size: 11.5px; font-weight: bold;">NIT: {{ $cole->cod_colegio }}</td></tr>
							@endforeach
						</table>
					</td>
					<td style="width: 10%;">
						<img src="https://placehold.it/128x128">
					</td>					
				</tr>
			</tbody>
		</table>			
		
		<table>
			<tbody>
				<tr align="center">
					@foreach($estudiante->all() as $estu)					
						<td style="width: 40.8%; border: 1px solid #000000; font-size: 15px; font-weight: bold;">
							{{ strtoupper($estu->nombre) }} {{ strtoupper($estu->apellido1) }} {{ strtoupper($estu->apellido2) }} / 
							{{ strtoupper($estu->codigo_est) }} - Curso:
							@foreach($grados->all() as $grad)
								@if ($grad->codigo === $estu->grado)
									{{ strtoupper($grad->nombre) }}-
								@endif
							@endforeach
							{{ strtoupper($estu->seccion) }}
						</td>
					@endforeach				
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>						
						</table>
					</td>
					
					@foreach($estudiante->all() as $estu)
						<td style="border: 1px solid #000000; font-size: 15px; font-weight: bold;">
							Estudiante: {{ strtoupper($estu->nombre) }} {{ strtoupper($estu->apellido1) }} {{ strtoupper($estu->apellido2) }} / 
							{{ strtoupper($estu->codigo_est) }} - Curso:
							@foreach($grados->all() as $grad)
								@if ($grad->codigo === $estu->grado)
									{{ strtoupper($grad->nombre) }}-
								@endif
							@endforeach
							{{ strtoupper($estu->seccion) }}
						</td>
					@endforeach					
				</tr>
			</tbody>			
		</table>
		
		<table>
			<thead>
				<tr>
					<td style="width: 40.8%;">
						<table style="border: 1px solid #000000;">
							<tr align="center" style="background-color: #E1DBDB;">
								<td style="border-right: 1px solid #000000; font-size: 15px;">
									Descripci&oacute;n
								</td>
								<td style="font-size: 15px;">
									Valor
								</td>
							</tr>						
						</table>
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>						
						</table>
					</td>
					<td>
						<table style="border: 1px solid #000000;">
							<tr align="center" style="background-color: #E1DBDB;">
								<td style="border-right: 1px solid #000000; font-size: 15px;">
									Descripci&oacute;n
								</td>
								<td style="font-size: 15px;">
									Valor
								</td>
							</tr>						
						</table>
					</td>					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<table style="border: 1px solid #000000;">
							<tr>
								@foreach($concepto->all() as $concep)
									<td style="width: 266px; border-right: 1px solid #000000; padding-left: 5px; font-size: 13px;" align="left">
										{{ ($concep->concept_nom) }}
									</td>
									<td style="padding-right: 5px; font-size: 13px;" align="right">
										${{ number_format($concep->valor) }}
									</td>
								@endforeach
							</tr>						
						</table>
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>						
						</table>
					</td>
					<td>
						<table style="border: 1px solid #000000;">
							<tr>
								@foreach($concepto->all() as $concep)
									<td style="width: 372px; border-right: 1px solid #000000; padding-left: 5px; font-size: 13px;" align="left">
										{{ ($concep->concept_nom) }}
									</td>
									<td style="padding-right: 5px; font-size: 13px;" align="right">
										${{ number_format($concep->valor) }}
									</td>
								@endforeach
							</tr>						
						</table>
					</td>					
				</tr>			
			</tbody>
		</table>
		
		<table>
			<thead>
				<tr>
					<td align="center" style="background-color: #E1DBDB; width: 40.8%; font-size: 15px;">
						PAGUE HASTA
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>
						</table>
					</td>
					<td align="center" style="background-color: #E1DBDB; font-size: 15px;">
						PAGUE HASTA
					</td>					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<table style="border: 1px solid #000000;">
							<tr>
								<td style="width: 266px; border-right: 1px solid #000000; padding-left: 5px; height: 60px;" align="center">
									xxxxx
								</td>
								<td style="padding-right: 5px;" align="right">
									xxxxx
								</td>
							</tr>
							<tr>
								<td style="width: 266px; border-right: 1px solid #000000; padding-left: 5px; height: 60px;" align="center">
									xxxxx
								</td>
								<td style="padding-right: 5px;" align="right">
									xxxxx
								</td>
							</tr>							
						</table>
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
							<tr><td>|</td></tr>
						</table>
					</td>
					<td>
						<table style="border: 1px solid #000000;">
							<tr>
								<td style="width: 373px; border-right: 1px solid #000000; padding-left: 5px; height: 60px;" align="center">
									xxxxx
								</td>
								<td style="padding-right: 5px;" align="right">
									xxxxx
								</td>
							</tr>
							<tr>
								<td style="width: 373px; border-right: 1px solid #000000; padding-left: 5px; height: 60px;" align="center">
									xxxxx
								</td>
								<td style="padding-right: 5px;" align="right">
									xxxxx
								</td>
							</tr>							
						</table>
					</td>					
				</tr>				
			</tbody>
		</table>
	</div>
</body>
</html>