<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class tags
 * @package App\Models
 * @version June 29, 2019, 2:26 am UTC
 *
 * @property \App\Models\Escuela escuela
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string tag
 * @property integer escuela_id
 */
class tags extends Model
{

    public $table = 'tags';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'tag',
        'escuela_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tag' => 'string',
        'escuela_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'escuela_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function escuela()
    {
        return $this->belongsTo(\App\Models\Escuela::class, 'escuela_id');
    }
}
