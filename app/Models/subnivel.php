<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class subnivel
 * @package App\Models
 * @version June 29, 2019, 2:39 am UTC
 *
 * @property \App\Models\Subnivelatributo subnivelatributos
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection nivels
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 * @property integer subNivelAtributos_id
 */
class subnivel extends Model
{

    public $table = 'subnivel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'subNivelAtributos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'subNivelAtributos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nombre' => 'required',
        'subNivelAtributos_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subnivelatributos()
    {
        return $this->belongsTo(\App\Models\Subnivelatributo::class, 'subNivelAtributos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nivels()
    {
        return $this->hasMany(\App\Models\Nivel::class);
    }
}
