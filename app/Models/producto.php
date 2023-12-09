<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $ref
 * @property $nombre
 * @property $precio
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Recibo[] $recibos
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'ref' => 'required',
		'nombre' => 'required',
		'precio' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ref','nombre','precio','descripcion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recibos()
    {
        return $this->hasMany('App\Models\Recibo', 'id_producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'producto_id', 'id');
    }
    

}
