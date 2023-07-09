<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delito;

class CategoriaDelito extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['categoria','nivel','delito_id'];

    public function delito(){
        return $this->belongsTo(Delito::class, 'delito_id');
    }
}
