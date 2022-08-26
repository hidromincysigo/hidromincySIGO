<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UbicacionGeografica
 *
 * @property $id
 * @property $coordenadas_utm_a
 * @property $coordenadas_utm_b
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Infraestructura[] $infraestructuras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UbicacionGeografica extends Model
{
    use SoftDeletes;

    static $rules = [
		'coordenadas_utm_a' => 'required',
		'coordenadas_utm_b' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['coordenadas_utm_a','coordenadas_utm_b'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infraestructuras()
    {
        return $this->hasMany('App\Models\Infraestructura', 'id_coordenadas', 'id');
    }
    

}
