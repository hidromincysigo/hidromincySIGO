<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Parroquia extends Model 

{
    use HasFactory;

	protected $table = 'parroquias';

	public $timestamps = false;

	public function municipio()
    {
        return $this->belongsTo('Municipio', 'municipio_id', 'id');
    }

}