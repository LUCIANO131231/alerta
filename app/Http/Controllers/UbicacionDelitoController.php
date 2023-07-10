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
        $delitos = Delito::all();
        $usuarios = Usuario::all();
        return view("ubicaciones.registrar", compact('delitos', 'usuarios'));
    }

    public function guardar(Request $request){
        $request->validate([
            'lugar' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'delito_id' => 'required'
        ]);

        $ubicacionDelito = new UbicacionDelito();
        $ubicacionDelito->lugar = $request->input('lugar');
        $ubicacionDelito->latitud = $request->input('latitud');
        $ubicacionDelito->longitud = $request->input('longitud');
        $ubicacionDelito->delito_id = $request->input('delito_id'); 
        $ubicacionDelito->save();
        return redirect("ubicaciones/mostrar");
    }

    public function actualizar(Request $request, $id){
        $request->validate([
            'lugar' => 'required',
            'latitud' => 'required',
            'longitud' => 'required'
        ]);
        $ubicacionDelito = UbicacionDelito::findOrFail($id);
        $ubicacionDelito->lugar = $request->input('lugar');
        $ubicacionDelito->latitud = $request->input('latitud');
        $ubicacionDelito->longitud = $request->input('longitud');
        $ubicacionDelito->save();
        return redirect("ubicaciones/mostrar");
    }

    public function eliminar($id){
        $ubicacionDelito = UbicacionDelito::findOrFail($id);
        $ubicacionDelito->delete();
        return redirect ("ubicaciones/mostrar");
    }
}
