<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 *
 * @property $id
 * @property $id_codigo_cliente
 * @property $tipo_transporte
 * @property $tipo_proveedor
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paquete extends Model
{

    static $rules = [
		'id_codigo_cliente' => 'required|exists:clientes,id',
		'id_tipo_transporte' => 'required',
		'id_proveedor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_codigo_cliente','id_tipo_transporte','id_proveedor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_codigo_cliente');
    }

    public function proveedores(){
        return $this->hasOne('App\Models\Proveedore', 'id', 'id_proveedor');
    }

    public function transportes(){
        return $this->hasOne('App\Models\Transporte', 'id', 'id_tipo_transporte');
    }


}
