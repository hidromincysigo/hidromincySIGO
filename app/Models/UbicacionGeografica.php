<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UbicacionGeografica
 *
 * @property $id
 * @property $id_estado
 * @property $id_municipio
 * @property $id_parroquia
 * @property $id_sector
 * @property $desc_ubicacion
 * @property $coordenadas_utm_a
 * @property $coordenadas_utm_b
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Infraestructura[] $infraestructuras
 * @property Municipio $municipio
 * @property OrganizacionesPopulare[] $organizacionesPopulares
 * @property Parroquia $parroquia
 * @property ReportesAveria[] $reportesAverias
 * @property Sectore $sectore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UbicacionGeografica extends Model
{
    use SoftDeletes;

    static $rules = [
		'id_estado' => 'required',
		'id_municipio' => 'required',
		'id_parroquia' => 'required',
		'id_sector' => 'required',
		'desc_ubicacion' => 'required',
		'coordenadas_utm_a' => 'required',
		'coordenadas_utm_b' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'ubicacion_geografica';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_estado','id_municipio','id_parroquia','id_sector','desc_ubicacion','coordenadas_utm_a','coordenadas_utm_b'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infraestructuras()
    {
        return $this->hasMany('App\Models\Infraestructura', 'id_coordenadas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_municipio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizacionesPopulares()
    {
        return $this->hasMany('App\Models\OrganizacionesPopulare', 'id_coordenadas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->hasOne('App\Models\Parroquia', 'id', 'id_parroquia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportesAverias()
    {
        return $this->hasMany('App\Models\ReportesAveria', 'id_coordenadas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sectore()
    {
        return $this->hasOne('App\Models\Sectore', 'id', 'id_sector');
    }
    

}
