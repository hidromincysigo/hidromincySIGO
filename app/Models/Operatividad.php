<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operatividad
 *
 * @property $id
 * @property $operatividad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operatividad extends Model
{
    
    static $rules = [
		'operatividad' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'operatividad';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['operatividad'];



}
