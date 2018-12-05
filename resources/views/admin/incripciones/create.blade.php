@extends('layouts.main')

@section('content')
<div class="column is-12">

	<input type="radio" id="estudiante" name="nav-tab" checked>
	<input type="radio" id="responsable" name="nav-tab" disabled>
	<input type="radio" id="acudiente" name="nav-tab" disabled>

	<div class="tabs is-boxed">
		<ul>
			<li class="is-active">
				<a><label for="estudiante">Estudiante</label></a>
			</li>
			<li>
				<a><label for="responsable">Responsable</label></a>
			</li>
			<li>
				<a><label for="acudiente">Acudiente</label></a>
			</li>
		</ul>
	</div>

		<div class="tab-content">
			<div class="tab-pane content-estudiante">
				<form class="long-form" action="{{ url('incripciones/validarEstudiante') }}" method="post">
					@csrf
					@if(count($errors) > 0)
					<div class="notification is-danger">
						<button class="delete"></button>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				
					<div class="columns">
						<div class="column is-one-third">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nombre" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="Ingrese el nombre">
							@if ($errors->has('name'))
								<p class="help is-danger">{{ $errors->first('name') }}</p>
							@endif
						</div>

						<div class="column">
							<label class="label">Primer apellido</label>
							<input type="text" name="apellido1" id="apellido1" class="input {{ $errors->has('apellido1') ? ' is-danger' : '' }}" placeholder="Ingrese el primer apellido">
							@if ($errors->has('apellido1'))
								<p class="help is-danger">{{ $errors->first('apellido1') }}</p>
							@endif
						</div>

						<div class="column">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apellido2" id="apellido2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" placeholder="Ingrese el segundo apellido">
							@if ($errors->has('apellido2'))
								<p class="help is-danger">{{ $errors->first('apellido2') }}</p>
							@endif
						</div>			
					</div>

					<div class="columns">			
						<div class="column is-one-fifth" style="width: 165px">
							<label class="label">Genero</label>
							<div class="select">
								<select name="tipgenero" id="tipgenero">
									<option value="">Selecionar</option>
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
								</select>
							</div>			
						</div>
						
						<div class="column is-one-fifth" style="width: 180px;">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocu" id="tipdocu">
									<option value="">Selecionar</option>
									<option value="TI">Tarjeta Identidad</option>
									<option value="TE">Tarjeta Extranjeria</option>
									<option value="CC">Cedula Ciudadania</option>
								</select>
							</div>			
						</div>
						
						<div class="column">
							<label class="label"># Documento</label>
							<input type="text" name="numdocu" id="numdocu" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de documento">
							@if ($errors->has('numdocu'))
								<p class="help is-danger">{{ $errors->first('numdocu') }}</p>
							@endif
						</div>
						
						<div class="column">
							<label class="label">Direccion</label>
							<input type="text" name="direccion" id="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección">
							@if ($errors->has('direccion'))
								<p class="help is-danger">{{ $errors->first('direccion') }}</p>
							@endif
						</div>			
					</div>
					
					<div class="columns">
						<div class="column">
							<label class="label"># Telefono</label>
							<input type="text" name="numfijo" id="numfijo" class="input {{ $errors->has('numfijo') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de telefono">
							@if ($errors->has('numfijo'))
								<p class="help is-danger">{{ $errors->first('numfijo') }}</p>
							@endif
						</div>

						<div class="column">
							<label class="label"># Celular</label>
							<input type="text" name="numcelular" id="numcelular" class="input {{ $errors->has('numcelular') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de celular">
							@if ($errors->has('numcelular'))
								<p class="help is-danger">{{ $errors->first('numcelular') }}</p>
							@endif
						</div>	

						<div class="column">
							<label class="label">Correo electronico</label>
							<input type="email" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección de correo electronico">
							@if ($errors->has('email'))
								<p class="help is-danger">{{ $errors->first('email') }}</p>
							@endif
						</div>
					</div>

					<div class="columns">
						<div class="column">
							<label class="label">Fecha nacimiento</label>
							<input type="date" name="facnaci" class="input {{ $errors->has('facnaci') ? ' is-danger' : '' }}">
							@if ($errors->has('facnaci'))
								<p class="help is-danger">{{ $errors->first('facnaci') }}</p>
							@endif
						</div>
						
						<div class="column">
							<label class="label">Ciudad nacimiento</label>
							<input type="text" id="ciunace" name="ciunace" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							@if ($errors->has('ciunace'))
								<p class="help is-danger">{{ $errors->first('ciunace') }}</p>
							@endif
						</div>							
					</div>
					
					<hr>
					<button type="submit" class="button is-link is-medium is-outlined">Guardar</button>
					<a href="" class="button is-medium is-link is-outlined">Salir</a>
				</form>
			</div>
			<div class="tab-pane content-responsable">My Music</div>
			<div class="tab-pane content-acudiente">My Videos</div>
		</div>
    </div>   
  </div>
</div> 
@endsection