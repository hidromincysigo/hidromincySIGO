<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoInterruptor
 *
 * @property $id
 * @property $tipo_interruptor
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Motore[] $motores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoInterruptor extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_interruptor' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_interruptor';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_interruptor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motores()
    {
        return $this->hasMany('App\Models\Motore', 'id_tipo_interruptor', 'id');
    }
    

}
