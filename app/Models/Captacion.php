<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Captacion extends Model implements Auditable
{
    use HasFactory;
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

    protected $table = "captacion";
    protected $perPage = 20;
   // protected $fillable = ['tipo_fuente','fuente','acueducto','cuota','extraccion','observacion'];

    public function acueducto()
    { 
        return $this->hasOne(Acueducto::class, 'id', 'acueducto');
       // return $this->hasOne('App\Models\Acueducto', 'id', 'acueducto');


    }

    public function tipoFuente()
    {
        return $this->hasOne(TipoFuente::class, 'id', 'tipo_fuente');
       // return $this->hasOne('App\Models\TipoFuente', 'id', 'tipo_fuente');
    }
    

}
