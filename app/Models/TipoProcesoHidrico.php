<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoProcesoHidrico
 *
 * @property $id
 * @property $tipo_proceso_hidrico
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoProcesoHidrico extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_proceso_hidrico' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_proceso_hidrico';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_proceso_hidrico'];



}
