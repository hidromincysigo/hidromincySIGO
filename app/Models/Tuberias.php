<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tuberia
 *
 * @property $id
 * @property $diametro
 * @property $norma
 * @property $grado
 * @property $espesor
 * @property $longitud
 * @property $sdr
 * @property $pn
 * @property $rde
 * @property $id_tipo_tuberia
 * @property $id_tipo_material
 * @property $id_estacion_bombeo
 * @property $id_fabricante
 * @property $id_manifold
 * @property $operatividad
 * @property $en_uso
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property EstacionBombeo $estacionBombeo
 * @property Fabricante $fabricante
 * @property Manifold $manifold
 * @property TipoMaterial $tipoMaterial
 * @property TipoTuberium $tipoTuberium
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tuberias extends Model
{
    use SoftDeletes;

    static $rules = [
		'diametro' => 'required',
		'norma' => 'required',
		'grado' => 'required',
		'espesor' => 'required',
		'longitud' => 'required',
		'sdr' => 'required',
		'pn' => 'required',
		'rde' => 'required',
		'id_tipo_tuberia' => 'required',
		'id_tipo_material' => 'required',
		'id_estacion_bombeo' => 'required',
		'id_fabricante' => 'required',
		'id_manifold' => 'required',
		'operatividad' => 'required',
		'en_uso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['diametro','norma','grado','espesor','longitud','sdr','pn','rde','id_tipo_tuberia','id_tipo_material','id_estacion_bombeo','id_fabricante','id_manifold','operatividad','en_uso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estacionBombeo()
    {
        return $this->hasOne('App\Models\EstacionBombeo', 'id', 'id_estacion_bombeo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fabricante()
    {
        return $this->hasOne('App\Models\Fabricante', 'id', 'id_fabricante');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manifold()
    {
        return $this->hasOne('App\Models\Manifold', 'id', 'id_manifold');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoMaterial()
    {
        return $this->hasOne('App\Models\TipoMaterial', 'id', 'id_tipo_material');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoTuberium()
    {
        return $this->hasOne('App\Models\TipoTuberium', 'id', 'id_tipo_tuberia');
    }
    

}
