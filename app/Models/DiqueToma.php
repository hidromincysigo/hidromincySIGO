<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiqueToma
 *
 * @property $id
 * @property $estado
 * @property $parroquia
 * @property $municipio
 * @property $ref_sector
 * @property $utm_a
 * @property $utm_b
 * @property $acueducto
 * @property $toma_rio
 * @property $caudal_diseño
 * @property $caudal_recibe
 * @property $estatus
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
    
    static $rules = [
		'estado' => 'required',
		'parroquia' => 'required',
		'municipio' => 'required',
		'ref_sector' => 'required',
		'utm_a' => 'required',
		'utm_b' => 'required',
		'acueducto' => 'required',
		'toma_rio' => 'required',
		'caudal_diseño' => 'required',
		'caudal_recibe' => 'required',
		'estatus' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado','parroquia','municipio','ref_sector','utm_a','utm_b','acueducto','toma_rio','caudal_diseño','caudal_recibe','estatus'];


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
        return $this->hasOne('App\Models\Estado', 'id', 'estado');
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
