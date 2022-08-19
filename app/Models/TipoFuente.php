<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class TipoFuente
 *
 * @property $id
 * @property $tipo
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 * @property Captacion[] $captacions
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoFuente extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public static $rules = [
        'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'tipo_fuentes';
    // protected $fillable = ['tipo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function captacions()
    {
        return $this->hasMany('App\Models\Captacion', 'tipo_fuente', 'id');
    }
}
