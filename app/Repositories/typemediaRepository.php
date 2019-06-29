<?php

namespace App\Repositories;

use App\Models\typemedia;
use App\Repositories\BaseRepository;

/**
 * Class typemediaRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:23 am UTC
*/

class typemediaRepository extends BaseRepository
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
        return typemedia::class;
    }
}
