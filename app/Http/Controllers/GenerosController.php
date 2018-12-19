<?php

namespace App\Http\Controllers;

use App\Generos;
use DB;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.generos.index');
    }

    public function create()
    {
		return view('admin.generos.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$generos = new Generos($data);
        $generos->codigo = $data['codigo'];
        $generos->nombre = $data['nombre'];		
		$generos->save();
		return redirect()->route('generos.index');
    }

    public function show($id)
    {	
		$generos = DB::table('generos')->where('codigo', '=', $id)->get();
		return view('admin.generos.show', ['generos' => ($generos[0])]);
    }

    public function edit($id)
    {	
		$generos = DB::table('generos')->where('codigo', '=', $id)->get();
		return view('admin.generos.edit', ['generos' => ($generos[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$generos = Generos::findOrFail($id);
        $generos->nombre = $data['nombre'];
		$generos->save();
        return redirect()->route('generos.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$generos = DB::table('generos')->where('codigo', '=', $id)->delete();
		return response()->json($generos);
    }
	
    public function obtenerListadoGeneros(Request $request){
		$generos = DB::table('generos')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['generos'=>$generos, 'paginate' => [
                'total'         =>  $generos->total(),
                'current_page'  =>  $generos->currentPage(),
                'per_page'      =>  $generos->perPage(),
                'last_page'     =>  $generos->lastPage(),
                'from '         =>  $generos->firstItem(),
                'to'            =>  $generos->lastPage()],
				]);		
    }		
}
