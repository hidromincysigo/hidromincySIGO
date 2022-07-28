<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model 


{
    use HasFactory;


	protected $table = 'municipios';
	public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('Estado', 'estado_id', 'id');
    }

	public function parroquias()
    {
        return $this->hasMany('Parroquia', 'municipio_id', 'id');
    }

}