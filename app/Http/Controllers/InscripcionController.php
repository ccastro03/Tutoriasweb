<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
	/*
    public function __construct()
    {
		$this->middleware('auth');
    }
	*/
	
    public function index()
    {
        return view('admin.incripciones.index');
    }

    public function create()
    {
		$ciudades = DB::table('ciudades')->get();
		$paises = DB::table('paises')->get();
		return view('admin.incripciones.create', ['ciudades' => ($ciudades),'paises' => ($paises)]);
    }

    public function validarEstudiante(Request $request)
    {
		$data = $request;		
		//var_dump("entro - ".$data);
		return redirect()->route('incripciones.create');		
    }	
}
