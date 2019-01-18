<?php

namespace App\Http\Controllers;

use App\Funciones;
use DB;
use Illuminate\Http\Request;

class FuncionesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        $funciones = Funciones::orderBy('id','descripcion')->paginate(3);
        return view('admin.funciones.index',compact('funciones'));
    }

    public function create()
    {
		return view('admin.funciones.create');
    }

    public function store(Request $request)
    {
		$data = request()->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
		]);
		
		$funciones = new funciones($data);
        $funciones->nombre = $data['nombre'];
        $funciones->descripcion = $data['descripcion'];		
		$funciones->save();
		return redirect()->route('funciones.index');
    }

    public function show($id)
    {
		return view('admin.funciones.show', ['funciones' => Funciones::findOrFail($id)]);
    }

    public function edit($id)
    {	
		return view('admin.funciones.edit', ['funciones' => Funciones::findOrFail($id)]);	
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
			'descripcion'=>'required',
        ]);
 
		$funciones = Funciones::findOrFail($id);
        $funciones->nombre = $data['nombre'];
        $funciones->descripcion = $data['descripcion'];
		$funciones->save();
        return redirect()->route('funciones.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$funciones = Funciones::findOrFail($id);
		$funciones->delete();
		return response()->json($funciones);
    }
	
    public function obtenerListadoFunciones(Request $request){		
		$funciones = DB::table('funciones')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);		
		return response()->json(['funciones'=>$funciones, 'paginate' => [
                'total'         =>  $funciones->total(),
                'current_page'  =>  $funciones->currentPage(),
                'per_page'      =>  $funciones->perPage(),
                'last_page'     =>  $funciones->lastPage(),
                'from '         =>  $funciones->firstItem(),
                'to'            =>  $funciones->lastPage()],
				]);			
    }		
}
