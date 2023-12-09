<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $cliente_id
 * @property $producto_id
 * @property $vehiculo_id
 * @property $user_id
 * @property $peso_int
 * @property $hora_int
 * @property $fecha_int
 * @property $peso_sal
 * @property $peso_neto
 * @property $tipo_ventas
 * @property $esto_pedido
 * @property $total
 * @property $fecha_salida
 * @property $hora_salida
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Empleado $empleado
 * @property Producto $producto
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'cliente_id' => 'required',
		'producto_id' => 'required',
		'vehiculo_id' => 'required',
		'user_id' => 'required',
		'peso_int' => 'required',
		'hora_int' => 'required',
		'fecha_int' => 'required',
		'tipo_ventas' => 'required',
		'esto_pedido' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','producto_id','vehiculo_id','user_id','peso_int','hora_int','fecha_int','peso_sal','peso_neto','tipo_ventas','esto_pedido','total','fecha_salida','hora_salida','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculo', 'id', 'vehiculo_id');
    }
    

}
