<?php

namespace App\Http\Controllers;

use App\TipoDocumentos;
use DB;
use Illuminate\Http\Request;

class TipoDocumentosController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.tipodocumentos.index');
    }

    public function create()
    {
		return view('admin.tipodocumentos.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$tipodocumentos = new TipoDocumentos($data);
        $tipodocumentos->codigo = $data['codigo'];
        $tipodocumentos->nombre = $data['nombre'];		
		$tipodocumentos->save();
		return redirect()->route('tipodocumentos.index');
    }

    public function show($id)
    {	
		$tipodocumentos = DB::table('tipodocumentos')->where('codigo', '=', $id)->get();
		return view('admin.tipodocumentos.show', ['tipodocumentos' => ($tipodocumentos[0])]);
    }

    public function edit($id)
    {	
		$tipodocumentos = DB::table('tipodocumentos')->where('codigo', '=', $id)->get();
		return view('admin.tipodocumentos.edit', ['tipodocumentos' => ($tipodocumentos[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$tipodocumentos = TipoDocumentos::findOrFail($id);
        $tipodocumentos->nombre = $data['nombre'];
		$tipodocumentos->save();
        return redirect()->route('tipodocumentos.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$tipodocumentos = DB::table('tipodocumentos')->where('codigo', '=', $id)->delete();
		return response()->json($tipodocumentos);
    }
	
    public function obtenerListadoTipoDocumentos(Request $request){
		$tipodocumentos = DB::table('tipodocumentos')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['tipodocumentos'=>$tipodocumentos, 'paginate' => [
                'total'         =>  $tipodocumentos->total(),
                'current_page'  =>  $tipodocumentos->currentPage(),
                'per_page'      =>  $tipodocumentos->perPage(),
                'last_page'     =>  $tipodocumentos->lastPage(),
                'from '         =>  $tipodocumentos->firstItem(),
                'to'            =>  $tipodocumentos->lastPage()],
				]);		
    }		
}
