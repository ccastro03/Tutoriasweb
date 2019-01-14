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
			'codigo'=>'required|unique:roles',
			'name'=>'required',
			'descripcion'=>'required',
		]);
		
		$role = new Role($data);
		$role->codigo = $data['codigo'];
		$role->name = $data['name'];
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
		$role = DB::table('roles')->where('name', 'like', '%'.$request->input('name').'%')->paginate(15);		
		return response()->json(['role'=>$role, 'paginate' => [
                'total'         =>  $role->total(),
                'current_page'  =>  $role->currentPage(),
                'per_page'      =>  $role->perPage(),
                'last_page'     =>  $role->lastPage(),
                'from '         =>  $role->firstItem(),
                'to'            =>  $role->lastPage()],
				]);		
    }		
}
