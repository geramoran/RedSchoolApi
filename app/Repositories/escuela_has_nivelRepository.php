<?php

namespace App\Repositories;

use App\Models\escuela_has_nivel;
use App\Repositories\BaseRepository;

/**
 * Class escuela_has_nivelRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:40 am UTC
*/

class escuela_has_nivelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Escuela_id',
        'Nivel_id',
        'Nivel_ModoEducacion_id'
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
        return escuela_has_nivel::class;
    }
}
