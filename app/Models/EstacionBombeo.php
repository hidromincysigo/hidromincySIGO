<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstacionBombeo
 *
 * @property $id
 * @property $nombre
 * @property $cantidad_grupos
 * @property $id_tipo_estacion_bombeo
 * @property $id_tipo_servicio
 * @property $id_infraestructura
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Bomba[] $bombas
 * @property DetallesTecnicosEstacionBombeo[] $detallesTecnicosEstacionBombeos
 * @property Infraestructura $infraestructura
 * @property Manifold[] $manifolds
 * @property TipoEstacionBombeo $tipoEstacionBombeo
 * @property TipoServicioEstacionBombeo $tipoServicioEstacionBombeo
 * @property Valvula[] $valvulas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstacionBombeo extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'cantidad_grupos' => 'required',
		'id_tipo_estacion_bombeo' => 'required',
		'id_tipo_servicio' => 'required',
		'id_infraestructura' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'estacion_bombeo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cantidad_grupos','id_tipo_estacion_bombeo','id_tipo_servicio','id_infraestructura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bombas()
    {
        return $this->hasMany('App\Models\Bomba', 'id_estacion_bombeo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesTecnicosEstacionBombeos()
    {
        return $this->hasMany('App\Models\DetallesTecnicosEstacionBombeo', 'id_estacion_bombeo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function infraestructura()
    {
        return $this->hasOne('App\Models\Infraestructura', 'id', 'id_infraestructura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manifolds()
    {
        return $this->hasMany('App\Models\Manifold', 'id_estacion_bombeo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoEstacionBombeo()
    {
        return $this->hasOne('App\Models\TipoEstacionBombeo', 'id', 'id_tipo_estacion_bombeo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoServicioEstacionBombeo()
    {
        return $this->hasOne('App\Models\TipoServicioEstacionBombeo', 'id', 'id_tipo_servicio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valvulas()
    {
        return $this->hasMany('App\Models\Valvula', 'id_estacion_bombeo', 'id');
    }
    

}
