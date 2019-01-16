<?php

namespace App\Http\Controllers;

use App\Especialidades;
use DB;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.especialidades.index');
    }

    public function create()
    {
		return view('admin.especialidades.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:especialidades',
			'nombre'=>'required',
		]);
		
		$especialidades = new Especialidades($data);
        $especialidades->codigo = $data['codigo'];
        $especialidades->nombre = $data['nombre'];		
		$especialidades->save();
		return redirect()->route('especialidades.index');
    }

    public function show($id)
    {	
		$especialidades = DB::table('especialidades')->where('codigo', '=', $id)->get();
		return view('admin.especialidades.show', ['especialidades' => ($especialidades[0])]);
    }

    public function edit($id)
    {	
		$especialidades = DB::table('especialidades')->where('codigo', '=', $id)->get();
		return view('admin.especialidades.edit', ['especialidades' => ($especialidades[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$especialidades = Especialidades::findOrFail($id);
        $especialidades->nombre = $data['nombre'];
		$especialidades->save();
        return redirect()->route('especialidades.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$especialidades = DB::table('especialidades')->where('codigo', '=', $id)->delete();
		return response()->json($especialidades);
    }
	
    public function obtenerListadoEspecialidades(Request $request){
		$especialidades = DB::table('especialidades')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['especialidades'=>$especialidades, 'paginate' => [
                'total'         =>  $especialidades->total(),
                'current_page'  =>  $especialidades->currentPage(),
                'per_page'      =>  $especialidades->perPage(),
                'last_page'     =>  $especialidades->lastPage(),
                'from '         =>  $especialidades->firstItem(),
                'to'            =>  $especialidades->lastPage()],
				]);		
    }		
}
