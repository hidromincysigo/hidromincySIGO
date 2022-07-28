<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ciudad extends Model
 {

    use HasFactory;
	protected $table = 'ciudades';
	public $timestamps = false;

	public function estado()
    {
        return $this->belongsTo('Estado', 'estado_id', 'id');
    }

}