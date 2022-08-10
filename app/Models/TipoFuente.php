<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoFuente
 *
 * @property $id
 * @property $tipo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Captacion[] $captacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoFuente extends Model implements Auditable
{
  use SoftDeletes;
  use \OwenIt\Auditing\Auditable;

    static $rules = [
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function captacions()
    {
        return $this->hasMany('App\Models\Captacion', 'tipo_fuente', 'id');
    }
    

}
