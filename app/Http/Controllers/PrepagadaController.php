<?php

namespace App\Http\Controllers;

use App\Prepagada;
use DB;
use Illuminate\Http\Request;

class PrepagadaController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.prepagada.index');
    }

    public function create()
    {
		return view('admin.prepagada.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:prepagada',
			'nombre'=>'required',
		]);
		
		$prepagada = new Prepagada($data);
        $prepagada->codigo = $data['codigo'];
        $prepagada->nombre = $data['nombre'];		
		$prepagada->save();
		return redirect()->route('prepagada.index');
    }

    public function show($id)
    {	
		$prepagada = DB::table('prepagada')->where('codigo', '=', $id)->get();
		return view('admin.prepagada.show', ['prepagada' => ($prepagada[0])]);
    }

    public function edit($id)
    {	
		$prepagada = DB::table('prepagada')->where('codigo', '=', $id)->get();
		return view('admin.prepagada.edit', ['prepagada' => ($prepagada[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$prepagada = Prepagada::findOrFail($id);
        $prepagada->nombre = $data['nombre'];
		$prepagada->save();
        return redirect()->route('prepagada.index');
    }

    public function eliminar()
    {		
		$id = $_GET["id"];
		$prepagada = DB::table('prepagada')->where('codigo', '=', $id)->delete();
		return response()->json($prepagada);
    }
	
    public function obtenerListadoPrepagada(Request $request){
		$prepagada = DB::table('prepagada')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);			
		return response()->json(['prepagada'=>$prepagada, 'paginate' => [
                'total'         =>  $prepagada->total(),
                'current_page'  =>  $prepagada->currentPage(),
                'per_page'      =>  $prepagada->perPage(),
                'last_page'     =>  $prepagada->lastPage(),
                'from '         =>  $prepagada->firstItem(),
                'to'            =>  $prepagada->lastPage()],
				]);		
    }		
}
