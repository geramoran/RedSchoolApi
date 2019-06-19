<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela_has_nivel extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'escuela_has_nivel';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Escuela_id', 'Nivel_id', 'Nivel_ModoEducacion_id'];

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