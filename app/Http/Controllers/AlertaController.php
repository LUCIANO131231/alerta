<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
     #********************************************
    public function index(){
        $alertas = Alerta::with('usuario')->get();
        $usuarios = Usuario::all();
        return view('alertas.mostrar', compact('usuarios','alertas'));
    }

    #********************************************
    public function guardar(Request $request){
    $request->validate([
        'usuario_id' => 'required',
        'delito_id' => 'required'
    ]);

    $delito = Delito::find($request->input('delito_id'));
    $usuario = Usuario::find($request->input('usuario_id'));

    if ($delito && $usuario) {
        $alerta = new Alerta();
        $alerta->titulo = "Nuevo delito registrado";
        $alerta->descripcion = "Se ha registrado un delito " . $delito->tipo . " : " . $delito->descripcion . ".";
        $alerta->hora = now();
        $alerta->usuario()->associate($usuario);
        $alerta->delito()->associate($delito);
        $alerta->save();
    }

    return redirect("alertas/mostrar");
}

    #********************************************
    public function eliminar($id){
        $alerta = Alerta::find($id);
        if($alerta){
            $alerta->delete();
        }
        return redirect ("alertas/mostrar");
    }
}
