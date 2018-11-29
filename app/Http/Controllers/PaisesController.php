<?php

namespace App\Http\Controllers;

use App\Paises;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function index()
    {
        $paises = Paises::orderBy('codigo','nombre')->paginate(3);
        return view('admin.paises.index',compact('paises'));
    }

    public function create()
    {
		return view('admin.paises.create');
    }

    public function store(Request $request)
    {	
		$data = request()->validate([
			'codigo'=>'required',
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
		return view('admin.paises.show', ['paises' => Paises::findOrFail($id)]);
    }

    public function edit($id)
    {	
		return view('admin.paises.edit', ['paises' => Paises::findOrFail($id)]);	
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
		$paises = Paises::findOrFail($id);
		$paises->delete();
		return response()->json($paises);
    }
	
    public function obtenerListadoPaises(Request $request){
        $paises = Paises::where([
            ['nombre', 'like', '%'.$request->input('name').'%' ],
        ])->get();
        return response()->json($paises);
    }		
}
