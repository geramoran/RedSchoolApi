<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class taller_has_escuela
 * @package App\Models
 * @version June 29, 2019, 2:37 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \App\Models\Taller taller
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer Taller_id
 */
class taller_has_escuela extends Model
{

    public $table = 'taller_has_escuela';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'Taller_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Taller_id' => 'integer',
        'Escuela_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Taller_id' => 'required',
        'Escuela_id' => 'required'
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
    public function taller()
    {
        return $this->belongsTo(\App\Models\Taller::class, 'Taller_id');
    }
}
