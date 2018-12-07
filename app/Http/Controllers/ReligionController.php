<?php

namespace App\Http\Controllers;

use App\Religion;
use DB;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    public function index()
    {
        return view('admin.religion.index');
    }

    public function create()
    {
		return view('admin.religion.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
			'nombre'=>'required',
		]);
		
		$religion = new Religion($data);
        $religion->codigo = $data['codigo'];
        $religion->nombre = $data['nombre'];		
		$religion->save();
		return redirect()->route('religion.index');
    }

    public function show($id)
    {	
		$religion = DB::table('religion')->where('codigo', '=', $id)->get();
		return view('admin.religion.show', ['religion' => ($religion[0])]);
    }

    public function edit($id)
    {	
		$religion = DB::table('religion')->where('codigo', '=', $id)->get();
		return view('admin.religion.edit', ['religion' => ($religion[0])]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
			'nombre'=>'required',
        ]);
 
		$religion = Religion::findOrFail($id);
        $religion->nombre = $data['nombre'];
		$religion->save();
        return redirect()->route('religion.index');
    }

    public function eliminar()
    {
		$id = $_GET["id"];
		$religion = DB::table('religion')->where('codigo', '=', $id)->delete();
		return response()->json($religion);
    }
	
    public function obtenerListadoReligiones(Request $request){
		$religion = DB::table('religion')->where('nombre', 'like', '%'.$request->input('name').'%')->paginate(10);
        return response()->json(['religion'=>$religion, 'paginate' => [
                'total'         =>  $religion->total(),
                'current_page'  =>  $religion->currentPage(),
                'per_page'      =>  $religion->perPage(),
                'last_page'     =>  $religion->lastPage(),
                'from '         =>  $religion->firstItem(),
                'to'            =>  $religion->lastPage()],
				]);		
    }		
}
