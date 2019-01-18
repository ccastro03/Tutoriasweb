@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Edición de <b>{{ $barrios->cod_barrio }}</b></p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('barrios/update/'.$barrios->cod_ciudad.'/'.$barrios->cod_barrio ) }}" method="post">
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

        <div class="columns">
			<div class="column is-one-fifth">
				<label class="label">Ciudad</label>
				@foreach($ciudades->all() as $ciudad)
					@if ($ciudad->cod_ciudad === $barrios->cod_ciudad)
						<input type="text" name="cod_ciudad" class="input {{ $errors->has('cod_ciudad') ? ' is-danger' : '' }}" value="{{ $ciudad->nombre }}" readonly>
						<input hidden type="text" name="cod_ciudad" class="input {{ $errors->has('cod_ciudad') ? ' is-danger' : '' }}" value="{{ $ciudad->cod_ciudad }}">
					@endif
				@endforeach	
				@if ($errors->has('cod_ciudad'))
					<p class="help is-danger">{{ $errors->first('cod_ciudad') }}</p>
				@endif					
			</div>
						
			<div class="column">
				<label class="label">Codigo</label>
				<input type="text" name="cod_barrio" class="input {{ $errors->has('cod_barrio') ? ' is-danger' : '' }}" value="{{ $barrios->cod_barrio }}" readonly>
				@if ($errors->has('cod_barrio'))
					<p class="help is-danger">{{ $errors->first('cod_barrio') }}</p>
				@endif
			</div>

			<div class="column">
				<label class="label">Nombre</label>
				<input type="text" name="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre', $barrios->nombre ) }}">
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