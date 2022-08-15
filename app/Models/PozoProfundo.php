<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PozoProfundo
 *
 * @property $id
 * @property $nombre
 * @property $estado
 * @property $municipio
 * @property $parroquia
 * @property $sector
 * @property $coordenadas
 * @property $acueducto
 * @property $proposito
 * @property $propietario
 * @property $caudal_diseno
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Acueducto $acueducto
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @property UbicacionGeografica $ubicacionGeografica
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PozoProfundo extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    static $rules = [
		'nombre' => 'required',
		'estado' => 'required',
		'municipio' => 'required',
		'parroquia' => 'required',
		'sector' => 'required',
		'coordenadas' => 'required',
		'acueducto' => 'required',
		'proposito' => 'required',
		'propietario' => 'required',
		'caudal_diseno' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
  //  protected $fillable = ['nombre','estado','municipio','parroquia','sector','coordenadas','acueducto','proposito','propietario','caudal_diseno'];


    protected $guarded =['id','created_at','updated_at' ];
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function acueducto()
    {
        return $this->hasOne('App\Models\Acueducto','acueducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado','estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio','municipio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->hasOne('App\Models\Parroquia','parroquia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ubicacionGeografica()
    {
        return $this->hasOne('App\Models\UbicacionGeografica','coordenadas');
    }


}