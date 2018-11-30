<?php

namespace App\Http\Controllers;

use App\Barrios;
use DB;
use Illuminate\Http\Request;

class BarriosController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.barrios.index');
    }

    public function create()
    {
		$ciudades = DB::table('ciudades')->get();
		return view('admin.barrios.create', ['ciudades' => ($ciudades)]);
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'cod_ciudad'=>'required',
			'cod_barrio'=>'required',
			'nombre'=>'required',
	]);
		
		$barrio = new Barrios($data);
		$barrio->cod_ciudad = $request->input("cod_ciudad"); //
		$barrio->cod_barrio = $data['cod_barrio'];
        $barrio->nombre = $data['nombre'];		
		$barrio->save();
		return redirect()->route('barrios.index');
    }

    public function show($cod_ciudad,$cod_barrio)
    {	
		$barrios = DB::table('barrios')->where('cod_ciudad', '=', $cod_ciudad)->where('cod_barrio', '=', $cod_barrio)->get();
		return view('admin.barrios.show', ['barrios' => ($barrios[0])]);
    }

	/*
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
		$ciudad = DB::table('ciudades')->where('codigo', '=', $id)->delete();
		return response()->json($ciudad);
    }
	*/
	
    public function obtenerListadoBarrios(Request $request){
		$barrios = DB::table('barrios')->where('nombre', 'like', '%'.$request->input('name').'%')->get();
        return response()->json($barrios);
    }		
}
