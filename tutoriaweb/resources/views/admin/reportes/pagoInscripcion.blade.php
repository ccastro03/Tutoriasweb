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
							<tr align="center"><td>COLEGIO "XXXXXXX"</td></tr>
							<tr align="center"><td>NIT: XXX</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr align="center"><td>MES A PAGAR: XXX</td></tr>
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
							<tr align="center"><td>COLEGIO "XXXXXXX"</td></tr>
							<tr align="center"><td>NIT: XXX</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr align="center"><td>MES A PAGAR: XXX</td></tr>
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
					<td style="width: 40.8%; border: 1px solid #000000;">
						Estudiante: xxxxx / codigo: xxxxx - Curso: xxxxxx
					</td>
					<td style="width: 2.7%;">
						<table>
							<tr><td>|</td></tr>						
						</table>
					</td>
					<td style="border: 1px solid #000000;">
						Estudiante: xxxxx / codigo: xxxxx - Curso: xxxxxx
					</td>					
				</tr>
			</tbody>			
		</table>
		
		<table>
			<tbody>
				<tr>
					<td style="width: 40.8%;">
						<table style="border-top: 1px solid #000000; border-right: 1px solid #000000;">
							<tr align="center" style="background-color: #E1DBDB;">
								<td>
									Descripci&oacute;n
								</td>
								<td>
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
							<tr align="center">
								<td>
									Descripci&oacute;n
								</td>
								<td style="border-left: 1px solid #000000;"></td>
								<td>
									Valor
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