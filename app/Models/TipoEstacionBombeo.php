<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoEstacionBombeo
 *
 * @property $id
 * @property $tipo_estacion_bombeo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property EstacionBombeo[] $estacionBombeos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoEstacionBombeo extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_estacion_bombeo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_estacion_bombeo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estacionBombeos()
    {
        return $this->hasMany('App\Models\EstacionBombeo', 'id_tipo_estacion_bombeo', 'id');
    }
    

}
