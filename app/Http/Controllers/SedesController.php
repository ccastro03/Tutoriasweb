<?php

namespace App\Http\Controllers;

use App\Sedes;
use DB;
use Illuminate\Http\Request;

class SedesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.sedes.index');
    }

    public function create()
    {
		return view('admin.sedes.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$sedes = new Sedes($data);
        $sedes->codigo = $data['codigo'];
        $sedes->nombre = $data['nombre'];		
		$sedes->save();
		return redirect()->route('sedes.index');
    }

    public function show($id)
    {	
		$sedes = DB::table('sedes')->where('codigo', '=', $id)->get();
		return view('admin.sedes.show', ['sedes' => ($sedes[0])]);
    }

    public function edit($id)
    {	
		$sedes = DB::table('sedes')->where('codigo', '=', $id)->get();
		return view('admin.sedes.edit', ['sedes' => ($sedes[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$sedes = Sedes::findOrFail($id);
        $sedes->nombre = $data['nombre'];
		$sedes->save();
        return redirect()->route('sedes.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$sedes = DB::table('sedes')->where('codigo', '=', $id)->delete();
		return response()->json($sedes);
    }
	
    public function obtenerListadoSedes(Request $request){
		$sedes = DB::table('sedes')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['sedes'=>$sedes, 'paginate' => [
                'total'         =>  $sedes->total(),
                'current_page'  =>  $sedes->currentPage(),
                'per_page'      =>  $sedes->perPage(),
                'last_page'     =>  $sedes->lastPage(),
                'from '         =>  $sedes->firstItem(),
                'to'            =>  $sedes->lastPage()],
				]);		
    }		
}
