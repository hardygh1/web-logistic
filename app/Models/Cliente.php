<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $identificacion
 * @property $nombre
 * @property $apellido
 * @property $correo
 * @property $nro_celular
 * @property $nro_casa
 * @property $nro_oficina
 * @property $id_distrito
 * @property $direccion_1
 * @property $direccion_2
 * @property $created_at
 * @property $updated_at
 *
 * @property Distrito $distrito
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'identificacion' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'correo' => 'required',
		'id_distrito' => 'required',
		'direccion_1' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion','nombre','apellido','correo','nro_celular','nro_casa','nro_oficina','id_distrito','direccion_1','direccion_2'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function distrito()
    {
        return $this->hasOne('App\Models\Distrito', 'id', 'id_distrito');
    }
    

}
