<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recibo
 *
 * @property $id
 * @property $user_id
 * @property $id_vehiculo
 * @property $id_producto
 * @property $peso
 * @property $fecha
 * @property $hora
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Producto $producto
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Recibo extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'id_vehiculo' => 'required',
		'id_producto' => 'required',
		'peso' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','id_vehiculo','id_producto','peso','fecha','hora','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculo', 'id', 'id_vehiculo');
    }
    

}
