<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $identificacion
 * @property $correo
 * @property $foto
 * @property $puesto
 * @property $created_at
 * @property $updated_at
 *
 * @property Asistencia[] $asistencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'identificacion' => 'required',
		'correo' => 'required',
		'foto' => 'required',
		'puesto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','identificacion','correo','foto','puesto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany('App\Models\Asistencia', 'empleado_id', 'id');
    }
    

}
