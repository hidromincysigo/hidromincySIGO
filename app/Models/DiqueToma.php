<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DiqueToma
 *
 * @property $id
 * @property $reg
 * @property $nombre
 * @property $estado
 * @property $parroquia
 * @property $municipio
 * @property $desc_ubicacion
 * @property $utm_a
 * @property $utm_b
 * @property $acueducto
 * @property $toma_rio
 * @property $caudal_diseno
 * @property $caudal_recibe
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Acueducto $acueducto
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiqueToma extends Model
{
    use SoftDeletes;

    static $rules = [
		'reg' => 'required',
		'nombre' => 'required',
		'estado' => 'required',
		'parroquia' => 'required',
		'municipio' => 'required',
		'desc_ubicacion' => 'required',
		'utm_a' => 'required',
		'utm_b' => 'required',
		'acueducto' => 'required',
		'toma_rio' => 'required',
		'caudal_diseno' => 'required',
		'caudal_recibe' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'dique_toma';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reg','nombre','estado','parroquia','municipio','desc_ubicacion','utm_a','utm_b','acueducto','toma_rio','caudal_diseno','caudal_recibe','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function acueducto()
    {
        return $this->hasOne('App\Models\Acueducto', 'id', 'acueducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'municipio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->hasOne('App\Models\Parroquia', 'id', 'parroquia');
    }
    

}
