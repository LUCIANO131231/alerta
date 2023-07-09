<?php

namespace App\Http\Controllers;
use App\Models\CategoriaDelito;
use App\Models\Delito;
use Illuminate\Http\Request;

class CategoriaDelitoController extends Controller
{
    #********************************************
    public function index(){
        $categorias = CategoriaDelito::with('delito')->get();
        $delitos = Delito::all();
        return view('categorias.mostrar', compact('categorias', 'delitos'));
    }

    #********************************************
    public function registrar(){
        $delitos = Delito::all();
        return view("categorias.registrar", compact('delitos'));
    }

    #********************************************
    public function guardar(Request $request){
        $request->validate([
            'categoria' => 'required',
            'nivel' => 'required',
            'delito_id' => 'required'
        ]);
        $delito = new CategoriaDelito();
        $delito->categoria = $request->input("categoria");
        $delito->nivel = $request->input("nivel");
        $delito ->delito_id = $request->input("delito_id");  
        $delito->save();
        return redirect("categorias/mostrar");
    }

    #********************************************
    public function actualizar(Request $request, $id){
        $request->validate([
            'categoria' => 'required',
            'nivel' => 'required',
        ]);
        $delito = CategoriaDelito::findOrFail($id);
        $delito->categoria = $request->input("categoria");
        $delito->nivel = $request->input("nivel");  
        $delito->save();
        return redirect("categorias/mostrar");
    }

    #********************************************
    public function eliminar($id){
        $delito = CategoriaDelito::findOrFail($id);
        $delito->delete();
        return redirect ("categorias/mostrar");
    }
}
