<?php

namespace App\Http\Controllers;

use App\Jornadas;
use DB;
use Illuminate\Http\Request;

class JornadasController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.jornadas.index');
    }

    public function create()
    {
		return view('admin.jornadas.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:jornadas',
			'nombre'=>'required',
		]);
		
		$jornadas = new Jornadas($data);
        $jornadas->codigo = $data['codigo'];
        $jornadas->nombre = $data['nombre'];		
		$jornadas->save();
		return redirect()->route('jornadas.index');
    }

    public function show($id)
    {	
		$jornadas = DB::table('jornadas')->where('codigo', '=', $id)->get();
		return view('admin.jornadas.show', ['jornadas' => ($jornadas[0])]);
    }

    public function edit($id)
    {	
		$jornadas = DB::table('jornadas')->where('codigo', '=', $id)->get();
		return view('admin.jornadas.edit', ['jornadas' => ($jornadas[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$jornadas = Jornadas::findOrFail($id);
        $jornadas->nombre = $data['nombre'];
		$jornadas->save();
        return redirect()->route('jornadas.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$jornadas = DB::table('jornadas')->where('codigo', '=', $id)->delete();
		return response()->json($jornadas);
    }
	
    public function obtenerListadoJornadas(Request $request){
		$jornadas = DB::table('jornadas')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['jornadas'=>$jornadas, 'paginate' => [
                'total'         =>  $jornadas->total(),
                'current_page'  =>  $jornadas->currentPage(),
                'per_page'      =>  $jornadas->perPage(),
                'last_page'     =>  $jornadas->lastPage(),
                'from '         =>  $jornadas->firstItem(),
                'to'            =>  $jornadas->lastPage()],
				]);		
    }		
}
