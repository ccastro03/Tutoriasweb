@extends('layouts.main')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Roles</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('role.create') }}" class="btn btn-info" >Añadir Rol</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($roles->count())  
              @foreach($roles as $role)  
              <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->descripcion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('RoleController@edit', $role->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('RoleController@destroy', $role->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $roles->links() }}
    </div>
  </div>
</section>
 
@endsection