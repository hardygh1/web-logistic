<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    public function paises(){
        return $this->belongsTo(Pais::class,'id_pais');
    }

    public function cantones(){
        return $this->hasMany(Canton::class,'id');
    }
}
