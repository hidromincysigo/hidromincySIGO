<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TomaRio
 *
 * @property $id
 * @property $nombre
 * @property $id_infraestructura
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Infraestructura $infraestructura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TomaRio extends Model
{
    use SoftDeletes;

    static $rules = [
        'nombre' => 'required',
        'id_infraestructura' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'toma_rio';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_infraestructura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function infraestructura()
    {
        return $this->hasOne('App\Models\Infraestructura', 'id', 'id_infraestructura');
    }
    

}
