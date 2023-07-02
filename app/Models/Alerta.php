<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'hora', 'usuario_id', 'delito_id'];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo Delito
    public function delito()
    {
        return $this->belongsTo(Delito::class);
    }
}

