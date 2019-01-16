<?php

namespace App\Http\Controllers;

use App\Profesiones;
use DB;
use Illuminate\Http\Request;

class ProfesionesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.profesiones.index');
    }

    public function create()
    {
		return view('admin.profesiones.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:profesiones',
			'nombre'=>'required',
		]);
		
		$profesiones = new Profesiones($data);
        $profesiones->codigo = $data['codigo'];
        $profesiones->nombre = $data['nombre'];		
		$profesiones->save();
		return redirect()->route('profesiones.index');
    }

    public function show($id)
    {	
		$profesiones = DB::table('profesiones')->where('codigo', '=', $id)->get();
		return view('admin.profesiones.show', ['profesiones' => ($profesiones[0])]);
    }

    public function edit($id)
    {	
		$profesiones = DB::table('profesiones')->where('codigo', '=', $id)->get();
		return view('admin.profesiones.edit', ['profesiones' => ($profesiones[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$profesiones = Profesiones::findOrFail($id);
        $profesiones->nombre = $data['nombre'];
		$profesiones->save();
        return redirect()->route('profesiones.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$profesiones = DB::table('profesiones')->where('codigo', '=', $id)->delete();
		return response()->json($profesiones);
    }
	
    public function obtenerListadoProfesiones(Request $request){
		$profesiones = DB::table('profesiones')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);
        return response()->json(['profesiones'=>$profesiones, 'paginate' => [
                'total'         =>  $profesiones->total(),
                'current_page'  =>  $profesiones->currentPage(),
                'per_page'      =>  $profesiones->perPage(),
                'last_page'     =>  $profesiones->lastPage(),
                'from '         =>  $profesiones->firstItem(),
                'to'            =>  $profesiones->lastPage()],
				]);		
    }		
}
