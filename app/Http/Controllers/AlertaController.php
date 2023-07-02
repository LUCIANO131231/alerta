<?php

namespace App\Http\Controllers;
use App\Models\Alerta;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public function index(){
        $alertas = Alerta::all();
        return view('alertas.mostrar', compact('alertas'));
    }

    public function registrar(){
        $delitos = Delito::all();
        $usuarios = Usuario::all();

        return view('alertas.registrar', compact('delitos', 'usuarios'));
    }

    public function guardar(Request $request){
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'hora' => 'required',
            'usuario_id' => 'required',
            'delito_id' => 'required',
        ]);

        date_default_timezone_set('America/Lima');

        $alerta = new Alerta();
        $alerta->titulo = $request->input('titulo');
        $alerta->descripcion = $request->input('descripcion');
        $alerta->hora = date("Y-m-d H:i:s");
        $alerta->usuario_id = $request->input('usuario_id');
        $alerta->delito_id = $request->input('delito_id');
        $alerta->save();
        
        return redirect()->route('alertas.index')->with('success', 'La alerta ha sido creada exitosamente.');
}

}
