@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Edición de <b>{{ $user->name }}</b></p>
    <div class="panel-block">
      <form class="long-form" action="{{ route('usuarios.update', $user->id) }}" method="post">
        @method('put')
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
        <div class="field">
          <label for="nombre" class="label">Nombre</label>
          <input type="text" name="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" value="{{ old('name', $user->name) }}" placeholder="Ingrese el nombre">
          @if ($errors->has('name'))
            <p class="help is-danger">{{ $errors->first('name') }}</p>
          @endif
        </div>
        <div class="columns">
          <div class="column is-half">
            <div class="field">
              <label class="label">Correo electronico</label>
              <input type="email" class="input" value="{{ $user->email }}" disabled>
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
          <input type="text" name="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" value="{{ old('direccion', $user->direccion) }}" placeholder="Ingrese la dirección de residencia">
          @if ($errors->has('direccion'))
            <p class="help is-danger">{{ $errors->first('direccion') }}</p>
          @endif
        </div>
        <div class="columns">
          <div class="column is-one-third">
            <div class="field">
              <label class="label">Teléfono</label>
              <input type="text" name="telefono" id="telefono" class="input {{ $errors->has('telefono') ? ' is-danger' : '' }}" value="{{ old('telefono', $user->telefono) }}" placeholder="Ingrese el numero teléfonico">
              @if ($errors->has('telefono'))
                <p class="help is-danger">{{ $errors->first('telefono') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Fecha nacimiento</label>
              <input type="date" name="fecha_nacimiento" class="input {{ $errors->has('fecha_nacimiento') ? ' is-danger' : '' }}" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}" max="<?php echo date("Y-m-d");?>">
              @if ($errors->has('fecha_nacimiento'))
                <p class="help is-danger">{{ $errors->first('fecha_nacimiento') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Fecha ingreso</label>
              <input type="date" name="fecha_ingreso" class="input {{ $errors->has('fecha_ingreso') ? ' is-danger' : '' }}" value="{{ old('fecha_ingreso', $user->fecha_ingreso) }}" max="<?php echo date("Y-m-d");?>">
              @if ($errors->has('fecha_ingreso'))
                <p class="help is-danger">{{ $errors->first('fecha_ingreso') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
                <label class="label">Perfil</label>
                <select-generico :old="'{{ old('perfil', $user->roles[0]->id) }}'" :url="'/usuarios/obtenerlistadoroles'" :propname="'perfil'" :class_id="'select {{ $errors->has('perfil') ? ' is-danger' : '' }}'"></select-generico>
                @if ($errors->has('perfil'))
                  <p class="help is-danger">{{ $errors->first('perfil') }}</p>
                @endif
            </div>            
          </div>
        </div>
        <div class="field">
          <label class="label">Estado</label>
          <div class="select">
            <select  name="estado">
              <option disabled>Seleccione una opción</option>
              @if($user->estado == 1)
                <option selected value="{{ old('estado', $user->estado) }}">Activo</option>
                <option value="0">Inactivo</option>
              @else
                <option selected value="{{ old('estado', $user->estado) }}">Inactivo</option>
                <option value="1">Activo</option>
              @endif
            </select>
          </div>
        </div>
        
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('usuarios') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>
<script>
	$(document).ready(function() {
		var tel = document.getElementById('telefono');
		tel.onkeydown = function(e) {
			if(!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) {
				return false;
			}
		}
	});		
</script>
@endsection