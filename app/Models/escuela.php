<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class escuela
 * @package App\Models
 * @version June 29, 2019, 2:41 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection escuelaHasNivels
 * @property \Illuminate\Database\Eloquent\Collection puntosfuertes
 * @property \Illuminate\Database\Eloquent\Collection instalaciones
 * @property \Illuminate\Database\Eloquent\Collection media
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection reconocimientos
 * @property \Illuminate\Database\Eloquent\Collection tags
 * @property \Illuminate\Database\Eloquent\Collection tallers
 * @property string nombre
 * @property string descripcion
 * @property boolean premium1
 * @property boolean premium2
 * @property boolean premium3
 */
class escuela extends Model
{

    public $table = 'escuela';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'descripcion',
        'premium1',
        'premium2',
        'premium3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'premium1' => 'boolean',
        'premium2' => 'boolean',
        'premium3' => 'boolean'
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
    public function escuelaHasNivels()
    {
        return $this->hasMany(\App\Models\EscuelaHasNivel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function puntosfuertes()
    {
        return $this->belongsToMany(\App\Models\Puntosfuerte::class, 'escuela_has_puntosfuertes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function instalaciones()
    {
        return $this->hasMany(\App\Models\Instalacione::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function media()
    {
        return $this->hasMany(\App\Models\Medium::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reconocimientos()
    {
        return $this->hasMany(\App\Models\Reconocimiento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tags()
    {
        return $this->hasMany(\App\Models\Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tallers()
    {
        return $this->belongsToMany(\App\Models\Taller::class, 'taller_has_escuela');
    }
}
