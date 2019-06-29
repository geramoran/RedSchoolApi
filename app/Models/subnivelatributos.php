<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class subnivelatributos
 * @package App\Models
 * @version June 29, 2019, 2:33 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection subnivels
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string clave
 * @property string valor
 */
class subnivelatributos extends Model
{

    public $table = 'subnivelatributos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'clave',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'clave' => 'string',
        'valor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'clave' => 'required',
        'valor' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subnivels()
    {
        return $this->hasMany(\App\Models\Subnivel::class);
    }
}
