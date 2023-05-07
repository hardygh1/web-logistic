<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transporte
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
class Transporte extends Model
{
    
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
