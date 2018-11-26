<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id','descripcion')->paginate(3);
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
		return view('admin.role.create');
    }

    public function store(Request $request)
    {
		$data = request()->validate([
		'name'=>'required',
		'descripcion'=>'required',
		]);
		
		$Role = new Role($data);
		$Role->save();
		return redirect()->route('admin.role.index')->with('success','Registro creado satisfactoriamente');
    }

    public function show($id)
    {
        $Role = Role::find($id);
        return  view('admin.role.show',compact('role'));
    }

    public function edit($id)
    {
        $Role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
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
        return redirect()->route('admin.role.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
		Role::find($id)->delete();
		return redirect()->route('admin.role.index')->with('success','Registro eliminado satisfactoriamente');
    }
	
    public function obtenerListadoRoles(Request $request){
        $role = Role::where([
            ['name', 'like', '%'.$request->input('name').'%' ],
        ])->get();
        return response()->json($role);
    }		
}
