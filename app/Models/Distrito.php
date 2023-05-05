<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    public function cantones(){
        return $this->belongsTo(Canton::class,'id_canton');
    }

    public function clientes(){
        return $this->hasMany(Distrito::class,'id');
    }

}
