<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
		return view('admin.roles.create');
    }

    public function store(Request $request)
    {
		$data = request()->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
		]);
		
		$role = new Role($data);
        $role->name = $data['nombre'];
        $role->descripcion = $data['descripcion'];		
		$role->save();
		return redirect()->route('roles.index');
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
			'nombre'=>'required',
			'descripcion'=>'required',
        ]);
 
		$role = Role::findOrFail($id);
        $role->name = $data['nombre'];
        $role->descripcion = $data['descripcion'];
		$role->save();
        return redirect()->route('roles.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$role = Role::findOrFail($id);
		$role->delete();
		return response()->json($role);
    }
	
    public function obtenerListadoRoles(Request $request){
        $role = Role::where([
            ['name', 'like', '%'.$request->input('name').'%' ],
        ])->get();
        return response()->json($role);
    }		
}
