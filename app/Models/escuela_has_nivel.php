<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class escuela_has_nivel
 * @package App\Models
 * @version June 29, 2019, 2:40 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \App\Models\Nivel nivel
 * @property \Illuminate\Database\Eloquent\Collection contactos
 * @property \Illuminate\Database\Eloquent\Collection cuota
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer Escuela_id
 * @property integer Nivel_id
 * @property integer Nivel_ModoEducacion_id
 */
class escuela_has_nivel extends Model
{

    public $table = 'escuela_has_nivel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'Escuela_id',
        'Nivel_id',
        'Nivel_ModoEducacion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Escuela_id' => 'integer',
        'Nivel_id' => 'integer',
        'Nivel_ModoEducacion_id' => 'integer',
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Escuela_id' => 'required',
        'Nivel_id' => 'required',
        'Nivel_ModoEducacion_id' => 'required',
        'id' => 'required'
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
    public function nivel()
    {
        return $this->belongsTo(\App\Models\Nivel::class, 'Nivel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactos()
    {
        return $this->hasMany(\App\Models\Contacto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cuota()
    {
        return $this->hasMany(\App\Models\Cuotum::class);
    }
}
