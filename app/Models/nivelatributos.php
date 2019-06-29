<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class nivelatributos
 * @package App\Models
 * @version June 29, 2019, 2:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection nivels
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string clave
 * @property string valor
 */
class nivelatributos extends Model
{

    public $table = 'nivelatributos';
    
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
    public function nivels()
    {
        return $this->hasMany(\App\Models\Nivel::class);
    }
}
