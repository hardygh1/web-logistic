<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 *
 * @property $id
 * @property $id_codigo_paquete
 * @property $id_codigo_categoria
 * @property $peso
 * @property $id_tipo_peso
 * @property $largo
 * @property $ancho
 * @property $alto
 * @property $volumen_kilo
 * @property $pies_cubicos
 * @property $id_tipo_medida
 * @property $cantidad
 * @property $description
 * @property $precio
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $tracking
 * @property Categoria $categoria
 * @property Paquete $paquete
 * @property TipoMedida $tipoMedida
 * @property TipoPeso $tipoPeso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Articulo extends Model
{
    
    static $rules = [
		'id_codigo_paquete' => 'required',
		'id_codigo_categoria' => 'required',
		'peso' => 'required',
		'id_tipo_peso' => 'required',
		'largo' => 'required',
		'ancho' => 'required',
		'alto' => 'required',
		'id_tipo_medida' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_codigo_paquete','id_codigo_categoria','peso','id_tipo_peso','largo','ancho','alto','volumen_kilo','pies_cubicos','id_tipo_medida','cantidad','description','precio','status','tracking'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_codigo_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paquete()
    {
        return $this->hasOne('App\Models\Paquete', 'id', 'id_codigo_paquete');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoMedida()
    {
        return $this->hasOne('App\Models\TipoMedida', 'id', 'id_tipo_medida');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPeso()
    {
        return $this->hasOne('App\Models\TipoPeso', 'id', 'id_tipo_peso');
    }

    
    

}
