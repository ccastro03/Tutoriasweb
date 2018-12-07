<?php

namespace App\Http\Controllers;

use App\Aseguradora;
use DB;
use Illuminate\Http\Request;

class AseguradoraController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.aseguradora.index');
    }

    public function create()
    {
		return view('admin.aseguradora.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$aseguradora = new Aseguradora($data);
        $aseguradora->codigo = $data['codigo'];
        $aseguradora->nombre = $data['nombre'];		
		$aseguradora->save();
		return redirect()->route('aseguradora.index');
    }

    public function show($id)
    {	
		$aseguradora = DB::table('aseguradora')->where('codigo', '=', $id)->get();
		return view('admin.aseguradora.show', ['aseguradora' => ($aseguradora[0])]);
    }

    public function edit($id)
    {	
		$aseguradora = DB::table('aseguradora')->where('codigo', '=', $id)->get();
		return view('admin.aseguradora.edit', ['aseguradora' => ($aseguradora[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$aseguradora = Aseguradora::findOrFail($id);
        $aseguradora->nombre = $data['nombre'];
		$aseguradora->save();
        return redirect()->route('aseguradora.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$aseguradora = DB::table('aseguradora')->where('codigo', '=', $id)->delete();
		return response()->json($aseguradora);
    }
	
    public function obtenerListadoAseguradoras(Request $request){
		$aseguradora = DB::table('aseguradora')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['aseguradora'=>$aseguradora, 'paginate' => [
                'total'         =>  $aseguradora->total(),
                'current_page'  =>  $aseguradora->currentPage(),
                'per_page'      =>  $aseguradora->perPage(),
                'last_page'     =>  $aseguradora->lastPage(),
                'from '         =>  $aseguradora->firstItem(),
                'to'            =>  $aseguradora->lastPage()],
				]);		
    }		
}
