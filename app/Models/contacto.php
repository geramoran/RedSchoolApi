<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class contacto
 * @package App\Models
 * @version June 29, 2019, 2:37 am UTC
 *
 * @property \App\Models\EscuelaHasNivel escuelaHasNivel
 * @property \App\Models\Tipocontacto tipocontacto
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string valor
 * @property integer tipoContacto_id
 * @property integer Escuela_has_Nivel_id
 */
class contacto extends Model
{

    public $table = 'contacto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'valor',
        'tipoContacto_id',
        'Escuela_has_Nivel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'string',
        'tipoContacto_id' => 'integer',
        'Escuela_has_Nivel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'valor' => 'required',
        'tipoContacto_id' => 'required',
        'Escuela_has_Nivel_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function escuelaHasNivel()
    {
        return $this->belongsTo(\App\Models\EscuelaHasNivel::class, 'Escuela_has_Nivel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipocontacto()
    {
        return $this->belongsTo(\App\Models\Tipocontacto::class, 'tipoContacto_id');
    }
}
