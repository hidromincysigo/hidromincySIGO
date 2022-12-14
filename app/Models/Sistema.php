<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sistema
 *
 * @property $id
 * @property $sistemas
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Infraestructura[] $infraestructuras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sistema extends Model
{
    use SoftDeletes;

    static $rules = [
		'sistemas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sistemas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infraestructuras()
    {
        return $this->hasMany('App\Models\Infraestructura', 'id_sistema', 'id');
    }
    

}
