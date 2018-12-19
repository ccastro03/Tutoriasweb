<?php

namespace App\Http\Controllers;

use App\EstadoCivil;
use DB;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.estadocivil.index');
    }

    public function create()
    {
		return view('admin.estadocivil.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$estadocivil = new EstadoCivil($data);
        $estadocivil->codigo = $data['codigo'];
        $estadocivil->nombre = $data['nombre'];		
		$estadocivil->save();
		return redirect()->route('estadocivil.index');
    }

    public function show($id)
    {	
		$estcivil = DB::table('estcivil')->where('codigo', '=', $id)->get();
		return view('admin.estadocivil.show', ['estcivil' => ($estcivil[0])]);
    }

    public function edit($id)
    {	
		$estcivil = DB::table('estcivil')->where('codigo', '=', $id)->get();
		return view('admin.estadocivil.edit', ['estcivil' => ($estcivil[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$estadocivil = EstadoCivil::findOrFail($id);
        $estadocivil->nombre = $data['nombre'];
		$estadocivil->save();
        return redirect()->route('estadocivil.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$estcivil = DB::table('estcivil')->where('codigo', '=', $id)->delete();
		return response()->json($estcivil);
    }
	
    public function obtenerListadoEstCivil(Request $request){
		$estcivil = DB::table('estcivil')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['estcivil'=>$estcivil, 'paginate' => [
                'total'         =>  $estcivil->total(),
                'current_page'  =>  $estcivil->currentPage(),
                'per_page'      =>  $estcivil->perPage(),
                'last_page'     =>  $estcivil->lastPage(),
                'from '         =>  $estcivil->firstItem(),
                'to'            =>  $estcivil->lastPage()],
				]);		
    }		
}
