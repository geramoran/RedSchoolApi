<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class nivel
 * @package App\Models
 * @version June 29, 2019, 2:39 am UTC
 *
 * @property \App\Models\Nivelatributo nivelatributos
 * @property \App\Models\Subnivel subnivel
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection escuelaHasNivels
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 * @property integer subnivel_id
 * @property integer nivelAtributos_id
 */
class nivel extends Model
{

    public $table = 'nivel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'subnivel_id',
        'nivelAtributos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'subnivel_id' => 'integer',
        'nivelAtributos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nombre' => 'required',
        'subnivel_id' => 'required',
        'nivelAtributos_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nivelatributos()
    {
        return $this->belongsTo(\App\Models\Nivelatributo::class, 'nivelAtributos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subnivel()
    {
        return $this->belongsTo(\App\Models\Subnivel::class, 'subnivel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function escuelaHasNivels()
    {
        return $this->hasMany(\App\Models\EscuelaHasNivel::class);
    }
}
