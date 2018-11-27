<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id','descripcion')->paginate(3);
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
		return view('admin.roles.create');
    }

    public function store(Request $request)
    {
		$data = request()->validate([
		'name'=>'required',
		'descripcion'=>'required',
		]);
		
		$Role = new Role($data);
		$Role->save();
		return redirect()->route('roles.index')->with('success','Registro creado satisfactoriamente');
    }

    public function show($id)
    {
		return view('admin.roles.show', ['roles' => Role::findOrFail($id)]);
    }

    public function edit($id)
    {	
		return view('admin.roles.edit', ['roles' => Role::findOrFail($id)]);	
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'name'=>'required',
			'descripcion'=>'required',
        ]);
 
		$role = Role::findOrFail($id);
        $role->name = $data['name'];
        $role->descripcion = $data['descripcion'];
		$role->save();
        return redirect()->route('roles.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function eliminar($id)
    {
		$role = Role::findOrFail($id);
		$role->delete();
		//return redirect()->route('roles.index')->with('success','Registro eliminado satisfactoriamente');
    }
	
    public function obtenerListadoRoles(Request $request){
        $role = Role::where([
            ['name', 'like', '%'.$request->input('name').'%' ],
        ])->get();
        return response()->json($role);
    }		
}
