@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $user->name }}</p>
    <div class="panel-block">
    <div class="columns">
          <div class="column is-12">
            <div class="field">
              <label class="label">Correo electronico</label>
              <input class="input" value="{{ $user->email }}" disabled>
            </div>
            <div class="field">
              <label class="label">Dirección</label>
              <input class="input" value="{{ $user->direccion }}" disabled>
            </div>
            <div class="field">
              <label class="label">Teléfono</label>
              <input class="input" value="{{ $user->telefono }}" disabled>
            </div>
            <div class="field">
              <label class="label">Fecha nacimiento</label>
              <input class="input" value="{{ $user->fecha_nacimiento }}" disabled>
            </div>
            <div class="field">
              <label class="label">Fecha ingreso</label>
              <input class="input" value="{{ $user->fecha_ingreso }}" disabled>
            </div>            
            <div class="field">
              <label class="label">Perfil</label>
              <input class="input" value="{{ $user->roles[0]->id }}" disabled>
            </div>
            <div class="field">
              <label class="label">Estado</label>
              @if($user->estado)
              <input class="input" value="Activo" disabled>
              @else
              <input class="input" value="Inactivo" disabled>
              @endif
            </div>
            <div class="field">
              <label class="label">Fecha de creació</label>
              <input class="input" value="{{ $user->created_at }}" disabled>
            </div>
            <div class="field">
              <label class="label">Fecha de ultima modificación</label>
              <input class="input" value="{{ $user->updated_at }}" disabled>
            </div>
          </div>
        </div>
    </div>
    <div class="panel-block">
      <a class="button is-medium is-link is-outlined" href="{{ url('/usuarios/'. $user->id .'/editar') }}">Editar</a>
      <a class="button is-medium is-link is-outlined align-left" href=" {{ url('usuarios') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection