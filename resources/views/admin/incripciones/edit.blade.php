@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Edición de <b>{{ $funciones->nombre }}</b></p>
    <div class="panel-block">
      <form class="long-form" action="{{ route('funciones.update', $funciones->id) }}" method="post">
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
			<div class="column is-half">
				<label for="nombre" class="label">Nombre</label>
				<input type="text" name="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre', $funciones->nombre) }}">
				@if ($errors->has('nombre'))
					<p class="help is-danger">{{ $errors->first('nombre') }}</p>
				@endif
			</div>

			<div class="column">
				<div class="field">
					<label class="label">Descripcion</label>
					<input type="text" name="descripcion" class="input {{ $errors->has('descripcion') ? ' is-danger' : '' }}" value="{{ old('descripcion', $funciones->descripcion) }}">
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