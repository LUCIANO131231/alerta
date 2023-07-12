<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UbicacionDelito;
use App\Models\Delito;
use App\Models\Usuario;

class UbicacionDelitoController extends Controller
{
    public function index(){
        $ubicacionDelitos = UbicacionDelito::with('usuario')->get();
        $usuarios = Usuario::all();
        return view('ubicaciones.mostrar', compact('ubicacionDelitos', 'usuarios'));
    }

    public function registrar(){
        $usuarios = Usuario::all();
        return view("ubicaciones.registrar", compact('usuarios'));
    }

    public function guardar(Request $request){
        $request->validate([
            'lugar' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'usuario_id' => 'required'
        ]);

        $ubicacionDelito = new UbicacionDelito();
        $ubicacionDelito->lugar = $request->input('lugar');
        $ubicacionDelito->latitud = $request->input('latitud');
        $ubicacionDelito->longitud = $request->input('longitud');
        $ubicacionDelito->usuario_id = $request->input('usuario_id'); 
        $ubicacionDelito->save();
        return redirect("ubicaciones/mostrar");
    }

    public function eliminar($id){
        $ubicacionDelito = UbicacionDelito::findOrFail($id);
        $ubicacionDelito->delete();
        return redirect ("ubicaciones/mostrar");
    }
}
