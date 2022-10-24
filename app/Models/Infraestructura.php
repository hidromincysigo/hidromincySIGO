<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Infraestructura
 *
 * @property $id
 * @property $nombre
 * @property $propietario
 * @property $constructura
 * @property $proposito
 * @property $img
 * @property $id_estado
 * @property $id_municipio
 * @property $id_parroquia
 * @property $id_coordenadas
 * @property $id_sector
 * @property $desc_ubicacion
 * @property $poblacion_servida
 * @property $id_tipo_infraestructura
 * @property $id_sistema
 * @property $id_acueducto
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Acueducto $acueducto
 * @property Embalse[] $embalses
 * @property EstacionBombeo[] $estacionBombeos
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @property Planta[] $plantas
 * @property PozoProfundo[] $pozoProfundos
 * @property Sectore $sectore
 * @property Sistema $sistema
 * @property TipoInfraestructura $tipoInfraestructura
 * @property TomaRio[] $tomaRios
 * @property UbicacionGeografica $ubicacionGeografica
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Infraestructura extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'id_estado' => 'required',
		'id_municipio' => 'required',
		'id_parroquia' => 'required',
		'id_coordenadas' => 'required',
		'id_sector' => 'required',
		'id_tipo_infraestructura' => 'required',
		'id_sistema' => 'required',
		'id_acueducto' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'infraestructura';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','propietario','constructura','proposito','img','id_estado','id_municipio','id_parroquia','id_coordenadas','id_sector','desc_ubicacion','poblacion_servida','id_tipo_infraestructura','id_sistema','id_acueducto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function acueducto()
    {
        return $this->hasOne('App\Models\Acueducto', 'id', 'id_acueducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function embalses()
    {
        return $this->hasMany('App\Models\Embalse', 'id_infraestructura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estacionBombeos()
    {
        return $this->hasMany('App\Models\EstacionBombeo', 'id_infraestructura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_municipio');
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
    public function plantas()
    {
        return $this->hasMany('App\Models\Planta', 'id_infraestructura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pozoProfundos()
    {
        return $this->hasMany('App\Models\PozoProfundo', 'id_infraestructura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sectore()
    {
        return $this->hasOne('App\Models\Sectore', 'id', 'id_sector');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sistema()
    {
        return $this->hasOne('App\Models\Sistema', 'id', 'id_sistema');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoInfraestructura()
    {
        return $this->hasOne('App\Models\TipoInfraestructura', 'id', 'id_tipo_infraestructura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tomaRios()
    {
        return $this->hasMany('App\Models\TomaRio', 'id_infraestructura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ubicacionGeografica()
    {
        return $this->hasOne('App\Models\UbicacionGeografica', 'id', 'id_coordenadas');
    }
    

}
