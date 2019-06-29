<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class cuota
 * @package App\Models
 * @version June 29, 2019, 2:36 am UTC
 *
 * @property \App\Models\EscuelaHasNivel escuelaHasNivel
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nombre
 * @property float Precio
 * @property integer Escuela_has_Nivel_id
 */
class cuota extends Model
{

    public $table = 'cuota';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'Precio',
        'Escuela_has_Nivel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'Precio' => 'float',
        'Escuela_has_Nivel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nombre' => 'required',
        'Escuela_has_Nivel_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function escuelaHasNivel()
    {
        return $this->belongsTo(\App\Models\EscuelaHasNivel::class, 'Escuela_has_Nivel_id');
    }
}
