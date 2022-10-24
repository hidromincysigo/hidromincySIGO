<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignacionGrupo
 *
 * @property $id
 * @property $id_equipo
 * @property $id_infraestructura
 * @property $grupo
 * @property $operatividad
 * @property $en_uso
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignacionGrupo extends Model
{
    
    static $rules = [
		'id_equipo' => 'required',
		'id_infraestructura' => 'required',
		'grupo' => 'required',
		'operatividad' => 'required',
		'en_uso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_equipo','id_infraestructura','grupo','operatividad','en_uso'];



}
