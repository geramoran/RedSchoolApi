<?php

namespace App\Repositories;

use App\Models\escuela_has_puntosfuertes;
use App\Repositories\BaseRepository;

/**
 * Class escuela_has_puntosfuertesRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:38 am UTC
*/

class escuela_has_puntosfuertesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'PuntosFuertes_id'
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
        return escuela_has_puntosfuertes::class;
    }
}
