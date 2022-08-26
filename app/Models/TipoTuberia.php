<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoTuberium
 *
 * @property $id
 * @property $tipo_tuberia
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Tuberia[] $tuberias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoTuberia extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_tuberia' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_tuberia';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_tuberia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tuberias()
    {
        return $this->hasMany('App\Models\Tuberia', 'id_tipo_tuberia', 'id');
    }
    

}
