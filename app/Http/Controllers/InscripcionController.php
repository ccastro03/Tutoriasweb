<?php

namespace App\Http\Controllers;

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
		return view('admin.incripciones.create');
    }

    public function validarEstudiante(Request $request)
    {
		$data = $request;		
		//var_dump("entro - ".$data);
		return redirect()->route('incripciones.create');
    }	
}
