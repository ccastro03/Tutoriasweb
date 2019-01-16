<?php

namespace App\Http\Controllers;

use App\Grados;
use DB;
use Illuminate\Http\Request;

class GradosController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.grados.index');
    }

    public function create()
    {
		return view('admin.grados.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:grados',
			'nombre'=>'required',
		]);
		
		$grados = new Grados($data);
        $grados->codigo = $data['codigo'];
        $grados->nombre = $data['nombre'];		
		$grados->save();
		return redirect()->route('grados.index');
    }

    public function show($id)
    {	
		$grados = DB::table('grados')->where('codigo', '=', $id)->get();
		return view('admin.grados.show', ['grados' => ($grados[0])]);
    }

    public function edit($id)
    {	
		$grados = DB::table('grados')->where('codigo', '=', $id)->get();
		return view('admin.grados.edit', ['grados' => ($grados[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$grados = Grados::findOrFail($id);
        $grados->nombre = $data['nombre'];
		$grados->save();
        return redirect()->route('grados.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$grados = DB::table('grados')->where('codigo', '=', $id)->delete();
		return response()->json($grados);
    }
	
    public function obtenerListadoGrados(Request $request){
		$grados = DB::table('grados')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);
        return response()->json(['grados'=>$grados, 'paginate' => [
                'total'         =>  $grados->total(),
                'current_page'  =>  $grados->currentPage(),
                'per_page'      =>  $grados->perPage(),
                'last_page'     =>  $grados->lastPage(),
                'from '         =>  $grados->firstItem(),
                'to'            =>  $grados->lastPage()],
				]);		
    }		
}
