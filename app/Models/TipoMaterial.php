<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoMaterial
 *
 * @property $id
 * @property $tipo_material
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Tuberia[] $tuberias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoMaterial extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_material' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_material';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_material'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tuberias()
    {
        return $this->hasMany('App\Models\Tuberia', 'id_tipo_material', 'id');
    }
    

}
