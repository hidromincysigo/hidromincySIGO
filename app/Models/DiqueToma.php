<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class DiqueToma extends Model implements Auditable
{

    use  SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    
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
    public function acueductoDatos()
    {
        return $this->belongsTo(Acueducto::class, 'acueducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoDatos()
    {
        return $this->belongsTo(Estado::class, 'estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipioDatos()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquiaDatos()
    {
        return $this->belongsTo(Parroquia::class, 'parroquia');
    }
    

}
