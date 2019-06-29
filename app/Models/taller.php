<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class taller
 * @package App\Models
 * @version June 29, 2019, 2:24 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection escuelas
 * @property string nombre
 */
class taller extends Model
{

    public $table = 'taller';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
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
        return $this->belongsToMany(\App\Models\Escuela::class, 'taller_has_escuela');
    }
}
