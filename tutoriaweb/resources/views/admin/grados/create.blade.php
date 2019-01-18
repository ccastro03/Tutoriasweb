@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de grados</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('grados') }}" method="post">
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
				<div class="field">
					<label class="label">Código</label>
					<input type="text" name="codigo" class="input {{ $errors->has('codigo') ? ' is-danger' : '' }}" value="{{ old('codigo') }}" placeholder="Ingrese el codigo">
					@if ($errors->has('codigo'))
						<p class="help is-danger">{{ $errors->first('codigo') }}</p>
					@endif
				</div>
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

        <a href="{{ url('grados') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection
