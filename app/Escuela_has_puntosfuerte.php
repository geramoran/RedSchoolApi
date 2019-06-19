<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela_has_puntosfuerte extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'escuela_has_puntosfuertes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Escuela_id', 'PuntosFuertes_id'];

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
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

}