<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $horario_id
 * @property $empleado_id
 * @property $hora_entrada
 * @property $hora_salida
 * @property $novedad
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Horario $horario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    static $rules = [
		'horario_id' => 'required',
		'empleado_id' => 'required',
		'hora_entrada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['horario_id','empleado_id','hora_entrada','hora_salida','novedad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horario()
    {
        return $this->hasOne('App\Models\Horario', 'id', 'horario_id');
    }
    

}
