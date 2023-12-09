<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $nit
 * @property $telefono
 * @property $direccion
 * @property $correo
 * @property $tipo
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo[] $vehiculos
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'nit' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'correo' => 'required',
		'tipo' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','nit','telefono','direccion','correo','tipo','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculos()
    {
        return $this->hasMany('App\Models\Vehiculo', 'id_cliente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'cliente_id', 'id');
    }
    

}
