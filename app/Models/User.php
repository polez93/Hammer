<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * los Atributos 
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atributos ocultos 
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * testiados
     * @var array<string, string>
     */
    protected $cast = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static $rules = [
		'name' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recibos()
    {
        return $this->hasMany('App\Models\Recibo', 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'user_id', 'id');
    }
    

}
