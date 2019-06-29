<?php

namespace App\Repositories;

use App\Models\nivelatributos;
use App\Repositories\BaseRepository;

/**
 * Class nivelatributosRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:32 am UTC
*/

class nivelatributosRepository extends BaseRepository
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
        return nivelatributos::class;
    }
}
