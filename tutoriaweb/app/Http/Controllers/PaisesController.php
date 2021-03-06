<?php

namespace App\Http\Controllers;

use App\Paises;
use DB;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.paises.index');
    }

    public function create()
    {
		return view('admin.paises.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required|unique:paises',
			'nombre'=>'required',
		]);
		
		$paises = new Paises($data);
        $paises->codigo = $data['codigo'];
        $paises->nombre = $data['nombre'];		
		$paises->save();
		return redirect()->route('paises.index');
    }

    public function show($id)
    {	
		$paises = DB::table('paises')->where('codigo', '=', $id)->get();
		return view('admin.paises.show', ['paises' => ($paises[0])]);
    }

    public function edit($id)
    {	
		$paises = DB::table('paises')->where('codigo', '=', $id)->get();
		return view('admin.paises.edit', ['paises' => ($paises[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$paises = Paises::findOrFail($id);
        $paises->nombre = $data['nombre'];
		$paises->save();
        return redirect()->route('paises.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$paises = DB::table('paises')->where('codigo', '=', $id)->delete();
		return response()->json($paises);
    }
	
    public function obtenerListadoPaises(Request $request){
		$paises = DB::table('paises')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(15);
		return response()->json(['paises'=>$paises, 'paginate' => [
                'total'         =>  $paises->total(),
                'current_page'  =>  $paises->currentPage(),
                'per_page'      =>  $paises->perPage(),
                'last_page'     =>  $paises->lastPage(),
                'from '         =>  $paises->firstItem(),
                'to'            =>  $paises->lastPage()],
				]);			
    }		
}
