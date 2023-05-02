<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    public function cantones(){
        return $this->belongsTo(Canton::class,'id_pais');
    }

}
