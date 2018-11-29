@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de funciones</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('funciones') }}" method="post">
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
			<div class="column is-half">
				<label for="nombre" class="label">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre') }}"placeholder="Ingrese el nombre">
				@if ($errors->has('nombre'))
					<p class="help is-danger">{{ $errors->first('nombre') }}</p>
				@endif
			</div>		
			<div class="column">
				<div class="field">
					<label class="label">Descripcion</label>
					<input type="text" name="descripcion" class="input {{ $errors->has('descripcion') ? ' is-danger' : '' }}" value="{{ old('descripcion') }}" placeholder="Ingrese la descripcion">
					@if ($errors->has('descripcion'))
						<p class="help is-danger">{{ $errors->first('descripcion') }}</p>
					@endif
				</div>
			</div>
        </div>
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('funciones') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection
