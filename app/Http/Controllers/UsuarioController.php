<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
            "email" => "required",
            "telefono" => "required",
            "direccion" => "required"
        ]);
        Usuario::create($request->all());
        return redirect("usuarios/mostrar");
    }
}
