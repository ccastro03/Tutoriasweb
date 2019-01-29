<html>
<head>
	@foreach($estudiante->all() as $estu)
		<title>Pago Inscripción {{ strtoupper($estu->nombre) }} {{ strtoupper($estu->apellido1) }}</title>
	@endforeach
</head>
<body>
	<div>
		<table>
			<thead>
				<tr>
					<td style="width: 33%;">
						<img src="https://placehold.it/128x128">
					</td>
					<td style="width: 33%;">
						COLEGIO "XXXXXXX"
					</td>
					<td style="width: 33%;">
						<img src="https://placehold.it/128x128">
					</td>				
				</tr>
			</thead>		
		</table>
	</div>
</body>
</html>