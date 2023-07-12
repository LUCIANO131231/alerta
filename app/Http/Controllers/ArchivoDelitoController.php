<?php

namespace App\Http\Controllers;

use App\Models\ArchivoDelito;
use App\Models\Delito;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoDelitoController extends Controller
{
    public function index(){
    $archivos = ArchivoDelito::all();
    return view('archivos.mostrar', compact('archivos'));
    }

    public function registrar(){
        $usuarios = Usuario::all();
        $delitos = Delito::all();
        return view('archivos.registrar', compact('usuarios','delitos'));
    }

    public function guardar(Request $request){
        $request->validate([
            'usuario_id' => 'required',
            'delito_id' => 'required',
            'videoDelito.*' => 'mimes:mp4|max:2048',
            'imagenDelito.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $archivos = new ArchivoDelito();
        $archivos->usuario_id = $request->input('usuario_id');
        $archivos->delito_id = $request->input('delito_id');
        // Subir video
        if ($request->hasFile('videoDelito')) {
            $video = $request->file('videoDelito');
            $videoNombre = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('videos'), $videoNombre);
            $archivos->videoDelito = $videoNombre;
        }
        // Subir imagen
        if ($request->hasFile('imagenDelito')) {
            $imagen = $request->file('imagenDelito');
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes'), $imagenNombre);
            $archivos->imagenDelito = $imagenNombre;
        }
        $archivos->save();
        return redirect("archivos/mostrar");
    }
}
