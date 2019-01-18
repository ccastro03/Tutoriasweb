@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de barrios</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('barrios') }}" method="post">
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
			<div class="column is-one-fifth">
				<label class="label">Ciudad</label>
				<div class="control">
					<div class="select">
						<select name="cod_ciudad" id="cod_ciudad">
							<option value="">Seleccione...</option>
							@foreach($ciudades->all() as $ciudad)
								<option value="{{ $ciudad->cod_ciudad }}">{{ $ciudad->nombre }}</option>
							@endforeach							
						</select>
					</div>
					@if ($errors->has('cod_ciudad'))
						<p class="help is-danger">{{ $errors->first('cod_ciudad') }}</p>
					@endif					
				</div>
			</div>
			
			<div class="column">
				<label class="label">Código</label>
				<input type="text" name="cod_barrio" class="input {{ $errors->has('cod_barrio') ? ' is-danger' : '' }}" value="{{ old('cod_barrio') }}" placeholder="Ingrese el codigo">
				@if ($errors->has('cod_barrio'))
					<p class="help is-danger">{{ $errors->first('cod_barrio') }}</p>
				@endif
			</div>
			
			<div class="column">
				<label for="nombre" class="label">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre') }}"placeholder="Ingrese el nombre">
				@if ($errors->has('nombre'))
					<p class="help is-danger">{{ $errors->first('nombre') }}</p>
				@endif
			</div>
        </div>
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('barrios') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection
