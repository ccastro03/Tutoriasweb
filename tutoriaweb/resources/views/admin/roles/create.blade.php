@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de <b>roles</b></p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('roles') }}" method="post">
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
			<div class="column">
				<label for="codigo" class="label">Codigo</label>
				<input type="text" name="codigo" id="codigo" autofocus class="input {{ $errors->has('codigo') ? ' is-danger' : '' }}" value="{{ old('codigo') }}" placeholder="Ingrese el codigo">
				@if ($errors->has('codigo'))
					<p class="help is-danger">{{ $errors->first('codigo') }}</p>
				@endif
			</div>
			
			<div class="column">
				<label for="name" class="label">Nombre</label>
				<input type="text" name="name" id="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" value="{{ old('name') }}" placeholder="Ingrese el nombre">
				@if ($errors->has('name'))
					<p class="help is-danger">{{ $errors->first(name) }}</p>
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

        <a href="{{ url('roles') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>
@endsection
