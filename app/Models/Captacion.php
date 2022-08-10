<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Captacion
 *
 * @property $id
 * @property $tipo_fuente
 * @property $fuente
 * @property $acueducto
 * @property $cuota
 * @property $extraccion
 * @property $observacion
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Acueducto $acueducto
 * @property TipoFuente $tipoFuente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Captacion extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    static $rules = [
		'tipo_fuente' => 'required',
		'fuente' => 'required',
		'acueducto' => 'required',
		'cuota' => 'required',
		'extraccion' => 'required',
		'observacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_fuente','fuente','acueducto','cuota','extraccion','observacion'];


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
    public function tipoFuente()
    {
        return $this->hasOne('App\Models\TipoFuente', 'id', 'tipo_fuente');
    }
    

}
