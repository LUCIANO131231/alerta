<?php

namespace App\Http\Controllers;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DelitoController extends Controller
{
    public function index(){
        $delitos = Delito::all();
        return view('delitos.mostrar', compact('delitos'));
    }

    public function registrar(){
        $usuarios = Usuario::all();
        return view("delitos.registrar", compact('usuarios'));
    }

    public function guardar(Request $request){
        date_default_timezone_set('America/Lima');
        $delito = new Delito();
            $delito -> tipoDelito = $request->input("tipoDelito");
            $delito -> lugarDelito = $request->input("lugarDelito");
            $delito -> horaDelito = date("Y-m-d H:i:s");
            $delito -> descripcion = $request->input("descripcion");
            // Subir imagen
            if ($request->hasFile('imagenDelito')) {
                $imagen = $request->file('imagenDelito');
                $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move(public_path('imagenes'), $imagenNombre);
                $delito->imagenDelito = $imagenNombre;
            }
            // Subir video
            if ($request->hasFile('videoDelito')) {
                $video = $request->file('videoDelito');
                $videoNombre = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('videos'), $videoNombre);
                $delito->videoDelito = $videoNombre;
            }
            $delito -> videoDelito = $request->input("videoDelito");
            $delito -> usuario_id = $request->input("usuario_id");  
        $delito->save();
        Delito::create($request->all());
        return redirect("delitos/mostrar");
    }
}
