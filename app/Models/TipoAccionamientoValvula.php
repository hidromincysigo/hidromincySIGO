<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoAccionamientoValvula
 *
 * @property $id
 * @property $tipo_accionamiento
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoAccionamientoValvula extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_accionamiento' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_accionamiento_valvula';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_accionamiento'];



}
