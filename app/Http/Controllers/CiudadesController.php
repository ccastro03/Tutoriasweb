<?php

namespace App\Http\Controllers;

use App\Ciudades;
use DB;
use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.ciudades.index');
    }

    public function create()
    {
		return view('admin.ciudades.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'cod_ciudad'=>'required',
			'nombre'=>'required',
		]);
		
		$ciudad = new Ciudades($data);
		$ciudad->cod_ciudad = $data['cod_ciudad'];
        $ciudad->nombre = $data['nombre'];		
		$ciudad->save();
		return redirect()->route('ciudades.index');
    }

    public function show($cod_ciudad)
    {	
		$ciudades = DB::table('ciudades')->where('cod_ciudad', '=', $cod_ciudad)->get();
		return view('admin.ciudades.show', ['ciudades' => ($ciudades[0])]);
    }

    public function edit($cod_ciudad)
    {	
		$ciudades = DB::table('ciudades')->where('cod_ciudad', '=', $cod_ciudad)->get();
		return view('admin.ciudades.edit', ['ciudades' => ($ciudades[0])]);
    }

    public function update(Request $request, $cod_ciudad)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$ciudad = Ciudades::findOrFail($cod_ciudad);
        $ciudad->nombre = $data['nombre'];
		$ciudad->save();
        return redirect()->route('ciudades.index');
    }

    public function eliminar()
    {
		$cod_ciudad = $_GET["id"];
		$ciudad = Ciudades::findOrFail($cod_ciudad);
		$ciudad->delete();
		return response()->json($ciudad);
    }
	
    public function obtenerListadoCiudades(Request $request){
		$ciudades = DB::table('ciudades')->where('nombre', 'like', '%'.$request->input('name').'%')->get();
        return response()->json($ciudades);
    }		
}
