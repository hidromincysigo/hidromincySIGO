<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoManifold
 *
 * @property $id
 * @property $tipo_manifold
 *
 * @property Manifold[] $manifolds
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoManifold extends Model
{
    
    static $rules = [
        'tipo_manifold' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_manifold';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_manifold'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manifold()
    {
        return $this->hasMany('App\Models\Manifold', 'id_tipo_manifold', 'id');
    }
    

}