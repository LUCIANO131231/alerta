<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['titulo', 'descripcion', 'hora', 'usuario_id', 'delito_id'];

    public function usuario(){
    return $this->belongsTo(Usuario::class);
    }

    public function delito(){
        return $this->belongsTo(Delito::class);
    }

}

