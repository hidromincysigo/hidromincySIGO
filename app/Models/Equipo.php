<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipo
 *
 * @property $id
 * @property $tipo_equipo
 * @property $nombre_equipo
 * @property $marca
 * @property $modelo
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_equipo' => 'required',
		'nombre_equipo' => 'required',
		'marca' => 'required',
		'modelo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_equipo','nombre_equipo','marca','modelo'];



}
