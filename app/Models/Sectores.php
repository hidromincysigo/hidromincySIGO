<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sectore
 *
 * @property $id
 * @property $sector
 * @property $id_parroquia
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Infraestructura[] $infraestructuras
 * @property Parroquia $parroquia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sectores extends Model
{
    use SoftDeletes;

    static $rules = [
		'sector' => 'required',
		'id_parroquia' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'sectores';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sector','id_parroquia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infraestructuras()
    {
        return $this->hasMany('App\Models\Infraestructura', 'id_sector', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->hasOne('App\Models\Parroquia', 'id', 'id_parroquia');
    }
    

}
