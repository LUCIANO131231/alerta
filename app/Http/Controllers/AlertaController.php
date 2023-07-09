<?php

namespace App\Http\Controllers;
use App\Models\Alerta;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertaController extends Controller
{
     #********************************************
    public function index(){
        $user = Auth::user();
        $usuario = Usuario::find($user->id);
        $alertas = $usuario->alertas()->with('usuario', 'delito')->get();
        return view('alertas.mostrar', compact('alertas'));
    }

    #********************************************
    public function registrar(){
        $delitos = Delito::all();
        $usuarios = Usuario::all();

        return view('alertas.registrar', compact('delitos', 'usuarios'));
    }

    #********************************************
    public function guardar(Request $request){
        $request->validate([
            'usuario_id' => 'required',
            'delito_id' => 'required'
        ]);
        date_default_timezone_set('America/Lima');
        $delito = Delito::find($request->input('delito_id'));
        $alerta = new Alerta();
        $alerta->titulo = "Nuevo delito registrado";
        $alerta->descripcion = "Se ha registrado un delito de tipo " . $delito->tipo . " en el lugar " . $delito->descripcion . ".";
        $alerta->hora = date("Y-m-d H:i:s");
        $alerta->usuario_id = $request->input('usuario_id');
        $alerta->delito_id = $delito->id;
        $alerta->save();
        return redirect("alertas/mostrar");
    }

    #********************************************
    public function eliminar($id){
        $delito = Alerta::find($id);
        $delito->delete();
        return redirect ("alertas/mostrar");
    }
}
