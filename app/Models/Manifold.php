<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Manifold
 *
 * @property $id
 * @property $nombre
 * @property $id_tipo_manifold
 * @property $cant_bridas
 * @property $cant_monometro
 * @property $cant_valvulas
 * @property $cant_tuberias
 * @property $operatividad
 * @property $id_estacion_bombeo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property EstacionBombeo $estacionBombeo
 * @property TipoManifold $tipoManifold
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Manifold extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'id_tipo_manifold' => 'required',
		'cant_bridas' => 'required',
		'cant_monometro' => 'required',
		'cant_valvulas' => 'required',
		'cant_tuberias' => 'required',
		'operatividad' => 'required',
		'id_estacion_bombeo' => 'required',
    ];

    protected $table = 'manifold';
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_tipo_manifold','cant_bridas','cant_monometro','cant_valvulas','cant_tuberias','operatividad','id_estacion_bombeo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estacionBombeo()
    {
        return $this->hasOne('App\Models\EstacionBombeo', 'id', 'id_estacion_bombeo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoManifold()
    {
        return $this->hasOne('App\Models\TipoManifold', 'id', 'id_tipo_manifold');
    }
    

}
