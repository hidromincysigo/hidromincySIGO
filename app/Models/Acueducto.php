<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acueducto extends Model implements Auditable
{
    
  use SoftDeletes;
  use \OwenIt\Auditing\Auditable;

    static $rules = [
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
    protected $table = "acueducto";
     //protected $fillable = ['nombre','estado','capacidad_distribucion','capacidad_modificada'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {

        return $this->hasMany('Estado', 'id', 'estado');
        //return $this->belongsTo('App\Models\Estado', 'id', 'estado');
    }
    

}
