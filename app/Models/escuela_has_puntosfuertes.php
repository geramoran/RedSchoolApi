<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class escuela_has_puntosfuertes
 * @package App\Models
 * @version June 29, 2019, 2:38 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \App\Models\Puntosfuerte puntosfuertes
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer PuntosFuertes_id
 */
class escuela_has_puntosfuertes extends Model
{

    public $table = 'escuela_has_puntosfuertes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'PuntosFuertes_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Escuela_id' => 'integer',
        'PuntosFuertes_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Escuela_id' => 'required',
        'PuntosFuertes_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function escuela()
    {
        return $this->belongsTo(\App\Models\Escuela::class, 'Escuela_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function puntosfuertes()
    {
        return $this->belongsTo(\App\Models\Puntosfuerte::class, 'PuntosFuertes_id');
    }
}
