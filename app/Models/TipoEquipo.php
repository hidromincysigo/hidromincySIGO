<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoEquipo
 *
 * @property $id
 * @property $tipo_equipo
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoEquipo extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_equipo' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_equipo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_equipo'];



}
