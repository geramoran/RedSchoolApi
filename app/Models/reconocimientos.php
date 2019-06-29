<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class reconocimientos
 * @package App\Models
 * @version June 29, 2019, 2:28 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string Nombre
 * @property integer Escuela_id
 */
class reconocimientos extends Model
{

    public $table = 'reconocimientos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'Nombre',
        'Escuela_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nombre' => 'string',
        'Escuela_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'Nombre' => 'required',
        'Escuela_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function escuela()
    {
        return $this->belongsTo(\App\Models\Escuela::class, 'Escuela_id');
    }
}
