<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class puntosfuertes
 * @package App\Models
 * @version June 29, 2019, 2:28 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection escuelas
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 * @property string src
 */
class puntosfuertes extends Model
{

    public $table = 'puntosfuertes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'src'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'src' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function escuelas()
    {
        return $this->belongsToMany(\App\Models\Escuela::class, 'escuela_has_puntosfuertes');
    }
}
