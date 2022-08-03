<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acueducto extends Model
{
    
    use HasFactory;

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
    protected $fillable = ['nombre','estado','capacidad_distribucion','capacidad_modificada'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {

        return $this->hasMany('Estado', 'id', 'estado');
        //return $this->belongsTo('App\Models\Estado', 'id', 'estado');
    }
    

}
