<?php

namespace App\Http\Controllers;

use App\Etnias;
use DB;
use Illuminate\Http\Request;

class EtniasController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.etnias.index');
    }

    public function create()
    {
		return view('admin.etnias.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$etnias = new Etnias($data);
        $etnias->codigo = $data['codigo'];
        $etnias->nombre = $data['nombre'];		
		$etnias->save();
		return redirect()->route('etnias.index');
    }

    public function show($id)
    {	
		$etnias = DB::table('etnias')->where('codigo', '=', $id)->get();
		return view('admin.etnias.show', ['etnias' => ($etnias[0])]);
    }

    public function edit($id)
    {	
		$etnias = DB::table('etnias')->where('codigo', '=', $id)->get();
		return view('admin.etnias.edit', ['etnias' => ($etnias[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$etnias = Etnias::findOrFail($id);
        $etnias->nombre = $data['nombre'];
		$etnias->save();
        return redirect()->route('etnias.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$etnias = DB::table('etnias')->where('codigo', '=', $id)->delete();
		return response()->json($etnias);
    }
	
    public function obtenerListadoEtnias(Request $request){
		$etnias = DB::table('etnias')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['etnias'=>$etnias, 'paginate' => [
                'total'         =>  $etnias->total(),
                'current_page'  =>  $etnias->currentPage(),
                'per_page'      =>  $etnias->perPage(),
                'last_page'     =>  $etnias->lastPage(),
                'from '         =>  $etnias->firstItem(),
                'to'            =>  $etnias->lastPage()],
				]);		
    }		
}
