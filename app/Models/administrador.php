<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrador
 *
 * @property $id
 * @property $npi
 * @property $nombre
 * @property $correo
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Administrador extends Model
{
    
    static $rules = [
		'npi' => 'required',
		'nombre' => 'required',
		'correo' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['npi','nombre','correo','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'administrador_id', 'id');
    }
    

}
