<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class typemedia
 * @package App\Models
 * @version June 29, 2019, 2:23 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection media
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 */
class typemedia extends Model
{

    public $table = 'typemedia';
    
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function media()
    {
        return $this->hasMany(\App\Models\Medium::class);
    }
}
