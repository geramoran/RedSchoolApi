<?php

namespace App\Repositories;

use App\Models\subnivelatributos;
use App\Repositories\BaseRepository;

/**
 * Class subnivelatributosRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:33 am UTC
*/

class subnivelatributosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clave',
        'valor'
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
        return subnivelatributos::class;
    }
}
