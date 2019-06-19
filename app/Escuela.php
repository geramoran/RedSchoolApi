<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'escuela';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'premium1', 'premium2', 'premium3'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['premium1' => 'boolean', 'premium2' => 'boolean', 'premium3' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

}