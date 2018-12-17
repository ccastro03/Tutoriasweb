<?php

namespace App\Http\Controllers;

use App\Role;
use DB;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
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
			'codigo'=>'required',
			'nombre'=>'required',
			'descripcion'=>'required',
		]);
		
		$role = new Role($data);
        $role->codigo = $data['codigo'];
		$role->name = $data['nombre'];
        $role->descripcion = $data['descripcion'];		
		$role->save();
		return redirect()->route('roles.index');
    }

    public function show($id)
    {
		$roles = DB::table('roles')->where('codigo', '=', $id)->get();		
		return view('admin.roles.show', ['roles' => ($roles[0])]);
    }

    public function edit($id)
    {	
		$roles = DB::table('roles')->where('codigo', '=', $id)->get();
		return view('admin.roles.edit', ['roles' => ($roles[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
        ]);
 
		$role = DB::table('roles')->where('codigo', '=', $id)->update(['name' => $data['nombre'], 'descripcion' => $data['descripcion']]);
        return redirect()->route('roles.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$role = DB::table('roles')->where('codigo', '=', $id)->delete();
		return response()->json($role);
    }
	
    public function obtenerListadoRoles(Request $request){
        $role = DB::table('roles')->where([
            ['name', 'like', '%'.$request->input('name').'%' ],
        ])->get();
        return response()->json($role);
    }		
}
