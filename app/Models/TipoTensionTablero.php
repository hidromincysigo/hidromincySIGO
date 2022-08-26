<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoTensionTablero
 *
 * @property $id
 * @property $tipo_tension_tablero
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Tablero[] $tableros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoTensionTablero extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_tension_tablero' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_tension_tablero';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_tension_tablero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tableros()
    {
        return $this->hasMany('App\Models\Tablero', 'id_tipo_tension', 'id');
    }
    

}
