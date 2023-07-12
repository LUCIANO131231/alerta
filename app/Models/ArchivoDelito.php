<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoDelito extends Model
{
    use HasFactory;
  
    public $timestamps = false;

    protected $fillable = ['videoDelito','imagenDelito','usuario_id','delito_id'];

    public function delito()
    {
        return $this->belongsTo(Delito::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
