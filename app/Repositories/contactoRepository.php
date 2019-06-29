<?php

namespace App\Repositories;

use App\Models\contacto;
use App\Repositories\BaseRepository;

/**
 * Class contactoRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:37 am UTC
*/

class contactoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor',
        'tipoContacto_id',
        'Escuela_has_Nivel_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return contacto::class;
    }
}
