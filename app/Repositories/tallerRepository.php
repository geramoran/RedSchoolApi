<?php

namespace App\Repositories;

use App\Models\taller;
use App\Repositories\BaseRepository;

/**
 * Class tallerRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:24 am UTC
*/

class tallerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return taller::class;
    }
}
