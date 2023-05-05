<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    public function provincias(){
        return $this->belongsTo(Provincia::class,'id_provincia');
    }

    public function distritos(){
        return $this->hasMany(Distrito::class,'id');
    }
}
