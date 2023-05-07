<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoPeso
 *
 * @property $id
 * @property $name
 * @property $abreviatura
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoPeso extends Model
{
  protected $table = 'tipo_peso';
    static $rules = [
		'name' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','abreviatura','status'];



}
