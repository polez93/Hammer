<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property $id
 * @property $nombre
 * @property $ingreso
 * @property $salida
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horario extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ingreso' => 'required',
		'salida' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ingreso','salida'];



}
