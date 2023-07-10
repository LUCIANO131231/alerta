<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alerta;

class Delito extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['descripcion', 'fechaHoraDelito', 'usuario_id', 'tipo'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function alertas()
    {
        return $this->hasMany(Alerta::class);
    }

    public static function boot(){
    parent::boot();
    self::created(function ($delito) {
        $titulo = "Nuevo delito registrado";
        $descripcion = "Se ha registrado un delito " . $delito->tipo . " : " . $delito->descripcion . ".";
        
        date_default_timezone_set('America/Lima');
        $alerta = new Alerta();
        $alerta->titulo = $titulo;
        $alerta->descripcion = $descripcion;
        $alerta->hora = date("Y-m-d H:i:s");
        $alerta->usuario_id = $delito->usuario_id;
        $alerta->delito_id = $delito->id;
        $alerta->save();
    });
}
}