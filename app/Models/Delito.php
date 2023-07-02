<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delito extends Model
{
    use HasFactory;
    
    protected $guarded = ['_token'];

    public $timestamps = false;

    protected $fillable = [
        'tipoDelito',
        'lugarDelito',
        'horaDelito',
        'descripcion',
        'imagenDelito',
        'videoDelito',
        'usuario_id',
        '_token',
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
