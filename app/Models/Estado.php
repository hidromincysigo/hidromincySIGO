<?php

namespace App\Models;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;



    protected $table = 'estados';
	public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function municipios()
    {
        return $this->hasMany('Municipio','estado_id');
    } 


}
