<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 *
 * @property $id
 * @property $placa
 * @property $id_cliente
 * @property $capacidad
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Recibo[] $recibos
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    static $rules = [
		'placa' => 'required',
		'id_cliente' => 'required',
		'capacidad' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['placa','id_cliente','capacidad','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recibos()
    {
        return $this->hasMany('App\Models\Recibo', 'id_vehiculo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'vehiculo_id', 'id');
    }
    

}
