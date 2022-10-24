<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tablero
 *
 * @property $id
 * @property $ancho
 * @property $alto
 * @property $profundidad
 * @property $aislante
 * @property $capacidad
 * @property $id_estacion_bombeo
 * @property $id_fabricante
 * @property $id_tipo_tension
 * @property $operatividad
 * @property $en_uso
 * @property $grupo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property EstacionBombeo $estacionBombeo
 * @property Fabricante $fabricante
 * @property Operatividad $operatividad
 * @property TipoTensionTablero $tipoTensionTablero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tableros extends Model
{
    use SoftDeletes;

    static $rules = [
		'ancho' => 'required',
		'alto' => 'required',
		'profundidad' => 'required',
		'aislante' => 'required',
		'capacidad' => 'required',
		'id_estacion_bombeo' => 'required',
		'id_fabricante' => 'required',
		'id_tipo_tension' => 'required',
		'operatividad' => 'required',
		'en_uso' => 'required',
		'grupo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ancho','alto','profundidad','aislante','capacidad','id_estacion_bombeo','id_fabricante','id_tipo_tension','operatividad','en_uso','grupo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estacionBombeo()
    {
        return $this->hasOne('App\Models\EstacionBombeo','id_estacion_bombeo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fabricante()
    {
        return $this->hasOne('App\Models\Fabricante','id_fabricante');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operatividad()
    {
        return $this->hasOne('App\Models\Operatividad','operatividad');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoTensionTablero()
    {
        return $this->hasOne('App\Models\TipoTensionTablero','id_tipo_tension');
    }
    

}
