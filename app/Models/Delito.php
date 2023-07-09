<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Delito extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['descripcion','fechaHoraDelito','usuario_id'];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function alertas(){
    return $this->hasMany(Alerta::class);
    }
}
