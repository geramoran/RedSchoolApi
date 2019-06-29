<?php

namespace App\Repositories;

use App\Models\puntosfuertes;
use App\Repositories\BaseRepository;

/**
 * Class puntosfuertesRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:28 am UTC
*/

class puntosfuertesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'src'
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
        return puntosfuertes::class;
    }
}
