<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Estado extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'estados';

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function municipios()
    {
        return $this->hasMany('Municipio', 'estado_id');
    }
}
