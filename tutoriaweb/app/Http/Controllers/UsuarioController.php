<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    # Iniciar Contructor con parametro de logueo obligatiorio apra el modulo
    public function __construct()
    {
      $this->middleware('auth');      
    }

    public function index(){        
        return view('admin.usuarios.index');
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store() {        
		//dd(request());
        $data = request()->validate([
            'name' => 'required',
			'telefono' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'direccion' => 'required',
			'fecha_nacimiento' => 'required',
			'fecha_ingreso' => 'required',
            'estado' => 'required',
			'perfil' => 'required',
        ]);
        $data['password'] = Hash::make(request()->input('password'));
        
        // Guardar usuario
        $User  = new User($data);
        $User->save();
        // Asignar rol
        $User->roles()->attach($data['perfil']);
        return redirect()->route('usuarios.index')->with('status', 'Usuario creado correctamente!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('user'));
    }

    public function update($id) {
        $data = request()->validate([
            'name' => 'required',
			'telefono' => 'required',
            'password' => '',
            'direccion' => 'required',
			'fecha_nacimiento' => 'required',
			'fecha_ingreso' => 'required',
            'estado' => 'required',
			'perfil' => 'required',
        ]);
        
        $user = User::findOrFail($id);
        if(empty($data['password'])) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = Hash::make(request()->input('password'));
        }

        $user->name = $data['name'];
        $user->password = $data['password'];
        $user->estado = $data['estado'];
        $user->telefono = $data['telefono'];
        $user->fecha_nacimiento = $data['fecha_nacimiento'];
        $user->fecha_ingreso = $data['fecha_ingreso'];
    
        $user->save();
        $user->roles()->sync($data['perfil']);

        return redirect()->route('usuarios.index')->with('status', 'Usuario actualizado correctamente');
    }

    public function show($id) {
        return view('admin.usuarios.show', ['user' => User::findOrFail($id)]);
    }

    public function obtenerListadoUsuarios(Request $request){
        $users = User::where([
            ['name', 'like', '%'.$request->input('name').'%' ],
            ['estado', '=', 1],
        ])->get();
        $users->load('roles');
        return response()->json($users);
    }

    public function obtenerListadoRoles(){
        $roles = Role::all();
        return response()->json($roles);
    }

    public function obtenerParrocos(Request $request){
        $parrocos = User::where([
            ['name', 'like', '%'.$request->input('name').'%' ],
            ['estado', '=', 1],
        ])->get();
        return response()->json($parrocos);
    }
}
