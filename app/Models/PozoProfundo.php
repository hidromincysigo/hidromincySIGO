<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PozoProfundo
 *
 * @property $id
 * @property $reg
 * @property $nombre
 * @property $caudal_diseno
 * @property $id_infraestructura
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Infraestructura $infraestructura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PozoProfundo extends Model
{
    use SoftDeletes;

    static $rules = [
        'reg' => 'required',
        'nombre' => 'required',
        'caudal_diseno' => 'required',
        'id_infraestructura' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'pozo_profundo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reg','nombre','caudal_diseno','id_infraestructura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function infraestructura()
    {
        return $this->hasOne('App\Models\Infraestructura', 'id', 'id_infraestructura');
    }
    

}
