<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class tipocontacto
 * @package App\Models
 * @version June 29, 2019, 2:34 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection contactos
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 */
class tipocontacto extends Model
{

    public $table = 'tipocontacto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nombre' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Contacto::class);
    }
}
