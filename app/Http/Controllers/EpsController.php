<?php

namespace App\Http\Controllers;

use App\Eps;
use DB;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.eps.index');
    }

    public function create()
    {
		return view('admin.eps.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$eps = new Eps($data);
        $eps->codigo = $data['codigo'];
        $eps->nombre = $data['nombre'];		
		$eps->save();
		return redirect()->route('eps.index');
    }

    public function show($id)
    {	
		$eps = DB::table('eps')->where('codigo', '=', $id)->get();
		return view('admin.eps.show', ['eps' => ($eps[0])]);
    }

    public function edit($id)
    {	
		$eps = DB::table('eps')->where('codigo', '=', $id)->get();
		return view('admin.eps.edit', ['eps' => ($eps[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$eps = Eps::findOrFail($id);
        $eps->nombre = $data['nombre'];
		$eps->save();
        return redirect()->route('eps.index');
    }

    public function eliminar()
    {	
		$id = $_GET["id"];
		$eps = DB::table('eps')->where('codigo', '=', $id)->delete();
		return response()->json($eps);
    }
	
    public function obtenerListadoEps(Request $request){
		$eps = DB::table('eps')->where('nombre', 'like', '%'.$request->input('name').'%')->get();
        return response()->json($eps);
    }		
}
