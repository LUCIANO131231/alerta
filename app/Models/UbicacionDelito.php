<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionDelito extends Model
{
    use HasFactory;

    protected $table = 'ubicacion_delitos';
    protected $fillable = ['lugar', 'latitud', 'longitud', 'delito_id'];

    public function delito()
    {
        return $this->belongsTo(Delito::class);
    }
}
