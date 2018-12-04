@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Estudiante</p>
    <div class="panel-block">
      <form class="long-form" action="" method="post">
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
		</div>		
		
		<div class="columns">
		</div>
		
		
		
        <div class="columns">
          <div class="column is-half">
            <div class="field">
              <label class="label">Correo electronico</label>
              <input type="email" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}" placeholder="Ingrese la dirección de correo electronico">
              @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Contraseña</label>
              <input type="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" value="{{ old('password') }}" placeholder="Ingrese la contraseña">
              @if ($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
              @endif
            </div>
          </div>
        </div>
        
        
        <div class="field">
          <label class="label">Dirección</label>
          <input type="text" name="direccion" id="inputDireccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" value="{{ old('direccion') }}" disabled>
          @if ($errors->has('direccion'))
            <p class="help is-danger">{{ $errors->first('direccion') }}</p>
          @endif
        </div>

        <div class="columns">          
          <div class="column">            
            <div class="columns is-mobile">
              <div class="column">                  
                <div class="select">
                  <select id="step1">
                    <option selected disabled>Selecionar</option>
                    <option>Avenida</option>
                    <option>Calle</option>
                    <option>Carrera</option>
                    <option>Diagonal</option>
                    <option>Transversal</option>
                  </select>
                </div>
              </div>
              <div class="column">                
                <input class="input" type="text" placeholder="Número" id="step2">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step3">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step4">
              </div>
            </div>
          </div>
          <div class="column">            
            <div class="columns is-mobile">              
              <div class="column">
                  <input class="input" type="text" placeholder="Información adicional" id="step5">
              </div>              
              <div class="column">
                  <a class="button is-primary" id="confirmarDireccion">Confirmar dirección</a>
              </div>             
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column is-one-third">
            <div class="field">
              <label class="label">Teléfono</label>
              <input type="text" name="telefono" id="telefono" class="input {{ $errors->has('telefono') ? ' is-danger' : '' }}" value="{{ old('telefono') }}" placeholder="Ingrese el numero teléfonico">
              @if ($errors->has('telefono'))
                <p class="help is-danger">{{ $errors->first('telefono') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Fecha nacimiento</label>
              <input type="date" name="fecha_nacimiento" class="input {{ $errors->has('fecha_nacimiento') ? ' is-danger' : '' }}" value="{{ old('fecha_nacimiento') }}" placeholder="Ingrese el numero teléfonico" max="<?php echo date("Y-m-d");?>">
              @if ($errors->has('fecha_nacimiento'))
                <p class="help is-danger">{{ $errors->first('fecha_nacimiento') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Fecha ingreso</label>
              <input type="date" name="fecha_ingreso" class="input {{ $errors->has('fecha_ingreso') ? ' is-danger' : '' }}" value="{{ old('fecha_ingreso') }}" placeholder="Ingrese el numero teléfonico" max="<?php echo date("Y-m-d");?>">
              @if ($errors->has('fecha_ingreso'))
                <p class="help is-danger">{{ $errors->first('fecha_ingreso') }}</p>
              @endif              
            </div>
          </div>
          <div class="column">
            <div class="field">
                <label class="label">Perfil</label>
                @if ($errors->has('perfil'))
                  <p class="help is-danger">{{ $errors->first('perfil') }}</p>
                @endif
            </div>            
          </div>
        </div>
        <input type="hidden" name="estado" value="1">
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('usuarios') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection