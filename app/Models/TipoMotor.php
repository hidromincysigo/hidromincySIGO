<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoMotor
 *
 * @property $id
 * @property $tipo_motor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoMotor extends Model
{
    
    static $rules = [
		'tipo_motor' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_motor';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_motor'];



}
