<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Embalse
 *
 * @property $id
 * @property $reg
 * @property $nombre
 * @property $estado
 * @property $municipio
 * @property $parroquia
 * @property $desc_ubicacion
 * @property $utm_a
 * @property $utm_b
 * @property $proposito
 * @property $propietario
 * @property $constructora
 * @property $cronologia
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Embalse extends Model implements Auditable
{
    use  SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    static $rules = [
		'reg' => 'required',
		'nombre' => 'required',
		'estado' => 'required',
		'municipio' => 'required',
		'parroquia' => 'required',
		'desc_ubicacion' => 'required',
		'utm_a' => 'required',
		'utm_b' => 'required',
		'proposito' => 'required',
		'propietario' => 'required',
		'constructora' => 'required',
		'cronologia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reg','nombre','estado','municipio','parroquia','desc_ubicacion','utm_a','utm_b','proposito','propietario','constructora','cronologia'];


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
