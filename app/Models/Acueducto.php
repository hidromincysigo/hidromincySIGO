<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Acueducto extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public static $rules = [
        'nombre' => 'required',
        'estado' => 'required',
        'capacidad_distribucion' => 'required',
        'capacidad_modificada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'acueductos';
    //protected $fillable = ['nombre','estado','capacidad_distribucion','capacidad_modificada'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasMany('Estado', 'id', 'id_estado');
        //return $this->belongsTo('App\Models\Estado', 'id', 'estado');
    }
}
