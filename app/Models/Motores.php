<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Motore
 *
 * @property $id
 * @property $potencia
 * @property $amperaje
 * @property $tension
 * @property $rpm
 * @property $capacidad_amperio
 * @property $contactor
 * @property $rele_termico
 * @property $temperatura
 * @property $id_tipo_interruptor
 * @property $id_tipo_arranque
 * @property $id_estacion_bombeo
 * @property $id_fabricante
 * @property $supervisor_fase
 * @property $operatividad
 * @property $en_uso
 * @property $grupo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property EstacionBombeo $estacionBombeo
 * @property Fabricante $fabricante
 * @property TipoArranque $tipoArranque
 * @property TipoInterruptor $tipoInterruptor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Motores extends Model
{
    use SoftDeletes;

    static $rules = [
		'potencia' => 'required',
		'amperaje' => 'required',
		'tension' => 'required',
		'rpm' => 'required',
		'capacidad_amperio' => 'required',
		'contactor' => 'required',
		'rele_termico' => 'required',
		'temperatura' => 'required',
		'id_tipo_interruptor' => 'required',
		'id_tipo_arranque' => 'required',
		'id_estacion_bombeo' => 'required',
		'id_fabricante' => 'required',
		'supervisor_fase' => 'required',
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
    protected $fillable = ['potencia','amperaje','tension','rpm','capacidad_amperio','contactor','rele_termico','temperatura','id_tipo_interruptor','id_tipo_arranque','id_estacion_bombeo','id_fabricante','supervisor_fase','operatividad','en_uso','grupo'];


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
    public function fabricante()
    {
        return $this->hasOne('App\Models\Fabricante', 'id', 'id_fabricante');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoArranque()
    {
        return $this->hasOne('App\Models\TipoArranque', 'id', 'id_tipo_arranque');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoInterruptor()
    {
        return $this->hasOne('App\Models\TipoInterruptor', 'id', 'id_tipo_interruptor');
    }
    

}
