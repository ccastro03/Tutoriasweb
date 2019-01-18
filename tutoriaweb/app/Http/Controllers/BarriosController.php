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
			'cod_barrio'=>'required|unique:barrios',
			'nombre'=>'required',
		]);

		$barrio = DB::table('barrios')->insert(['cod_ciudad' => $request->input("cod_ciudad"),
		'cod_barrio' => $request->input("cod_barrio"), 'nombre' => $request->input("nombre")]);
		return redirect()->route('barrios.index');
    }

    public function show($cod_ciudad,$cod_barrio)
    {	
		$barrios = DB::table('barrios')->where('cod_ciudad', '=', $cod_ciudad)->where('cod_barrio', '=', $cod_barrio)->get();
		return view('admin.barrios.show', ['barrios' => ($barrios[0])]);
    }

    public function edit($cod_ciudad, $cod_barrio)
    {	
		$ciudades = DB::table('ciudades')->get();
		$barrios = DB::table('barrios')->where('cod_ciudad', '=', $cod_ciudad)->where('cod_barrio', '=', $cod_barrio)->get();
		return view('admin.barrios.edit', ['barrios' => ($barrios[0]), 'ciudades' => ($ciudades)]);
    }

	
    public function update(Request $request)
    {		
        $data = request()->validate([
			'nombre'=>'required',
        ]);
		$barrio = DB::table('barrios')
						->where('cod_ciudad', '=', $request->input("cod_ciudad"))->where('cod_barrio', '=', $request->input("cod_barrio"))
						->update(['nombre' => $request->input("nombre")]);
        return redirect()->route('barrios.index');
    }

    public function eliminar()
    {
		$cod_ciudad = $_GET["cod_ciudad"];
		$cod_barrio = $_GET["cod_barrio"];
		$barrio = DB::table('barrios')->where('cod_ciudad', '=', $cod_ciudad)->where('cod_barrio', '=', $cod_barrio)->delete();
		return response()->json($barrio);
    }
	
    public function obtenerListadoBarrios(Request $request){
		$ciudades = DB::table('ciudades')->get();
		$barrios = DB::table('barrios')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);
        return response()->json(['barrios'=>$barrios, 'ciudades' => $ciudades, 'paginate' => [
                'total'         =>  $barrios->total(),
                'current_page'  =>  $barrios->currentPage(),
                'per_page'      =>  $barrios->perPage(),
                'last_page'     =>  $barrios->lastPage(),
                'from '         =>  $barrios->firstItem(),
                'to'            =>  $barrios->lastPage()],
				]);
    }	
}
