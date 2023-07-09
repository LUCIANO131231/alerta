<?php

namespace App\Http\Controllers;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DelitoController extends Controller
{
    #********************************************
    public function index(){
        $delitos = Delito::with('usuario')->get();
        $usuarios = Usuario::all();
        return view('delitos.mostrar', compact('delitos', 'usuarios'));
    }

    #********************************************
    public function registrar(){
        $usuarios = Usuario::all();
        return view("delitos.registrar", compact('usuarios'));
    }

    #********************************************
    public function guardar(Request $request){
        $request->validate([
            'descripcion' => 'required',
            'tipo' => 'required',
            'usuario_id' => 'required'
        ]);
        date_default_timezone_set('America/Lima');
        $delito = new Delito();
        $delito->descripcion = $request->input("descripcion");
        $delito->tipo = $request->input("tipo");
        $delito->fechaHoraDelito = date("Y-m-d H:i:s");
        $delito ->usuario_id = $request->input("usuario_id");  
        $delito->save();
        return redirect("delitos/mostrar");
    }

    #********************************************
    public function actualizar(Request $request, $id){
        $request->validate([
            'descripcion' => 'required',
            'tipo' => 'required',
        ]);
        date_default_timezone_set('America/Lima');
        $delito = Delito::findOrFail($id);
        $delito->descripcion = $request->input("descripcion");
        $delito->tipo = $request->input("tipo");
        $delito->fechaHoraDelito = Carbon::now();
        $delito->save();
        return redirect("delitos/mostrar");
    }

    #********************************************
    public function eliminar($id){
        $delito = Delito::findOrFail($id);
        $delito->delete();
        return redirect ("delitos/mostrar");
    }
}
