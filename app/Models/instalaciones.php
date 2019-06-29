<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class instalaciones
 * @package App\Models
 * @version June 29, 2019, 2:25 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 * @property string src
 * @property integer Escuela_id
 */
class instalaciones extends Model
{

    public $table = 'instalaciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'src',
        'Escuela_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'src' => 'string',
        'Escuela_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nombre' => 'required',
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
