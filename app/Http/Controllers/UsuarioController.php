<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view("usuarios.mostrar", compact('usuarios'));
    }

    public function registrar(){
        return view("usuarios.registrar");
    }

    public function guardar(Request $request){
        $request->validate([
            "nombres" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            "telefono" => "nullable|numeric",
            "direccion" => "nullable"
        ]);
        $usuario = new Usuario();
        $usuario->nombres = $request->input('nombres');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->telefono = $request->input('telefono');
        $usuario->direccion = $request->input('direccion');
        $usuario->save();
        return redirect("usuarios/mostrar");
    }

    public function actualizar(Request $request, $id){
        $request->validate([
            'nombres' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable|numeric',
            'direccion' => 'nullable'
        ]);
        $usuario = Usuario::findOrFail($id);
        $usuario->nombres = $request->input('nombres');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->direccion = $request->input('direccion');
        $usuario->save();
        return redirect("usuarios/mostrar");
    }

    public function eliminar($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect("usuarios/mostrar");
    }
}
