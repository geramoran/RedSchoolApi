<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class media
 * @package App\Models
 * @version June 29, 2019, 2:36 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \App\Models\Typemedia typemedia
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string src
 * @property integer typeMedia_id
 * @property integer Escuela_id
 */
class media extends Model
{

    public $table = 'media';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'src',
        'typeMedia_id',
        'Escuela_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'src' => 'string',
        'typeMedia_id' => 'integer',
        'Escuela_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'src' => 'required',
        'typeMedia_id' => 'required',
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
    public function typemedia()
    {
        return $this->belongsTo(\App\Models\Typemedia::class, 'typeMedia_id');
    }
}
