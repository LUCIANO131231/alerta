<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index(){
        $usuarios = Usuario::all();
        return view('usuarios.mostrar')
        ->with("usuarios", $usuarios);
    }

    public function registrar(){
        return view("usuarios.registrar");
    }

    public function guardar(Request $request){
        $validacion = $request->validate([
            "nombres" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            "telefono" => "",
            "direccion" => ""
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

    public function editar(Request $request, $id){
        $validacion = $request->validate([
            'nombres' => '',
            'email' => '',
            'telefono' => '',
            'direccion' => '',
        ]);

        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->route('umostrarusuario')->with('error', 'El usuario no existe.');
        }

        $usuario->nombres = $request->input('nombres');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->direccion = $request->input('direccion');
        $usuario->save();

        return redirect("usuarios/mostrar");
    }


    public function eliminar($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect("usuarios/mostrar");
    }
}
