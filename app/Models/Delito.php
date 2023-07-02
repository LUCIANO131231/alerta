<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delito extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
