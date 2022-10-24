<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoArranque
 *
 * @property $id
 * @property $tipo_arranque
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Motore[] $motores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoArranque extends Model
{
    use SoftDeletes;

    static $rules = [
		'tipo_arranque' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'tipo_arranque';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_arranque'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motores()
    {
        return $this->hasMany('App\Models\Motore', 'id_tipo_arranque', 'id');
    }
    

}
