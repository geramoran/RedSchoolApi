<?php

namespace App\Repositories;

use App\Models\tipocontacto;
use App\Repositories\BaseRepository;

/**
 * Class tipocontactoRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:34 am UTC
*/

class tipocontactoRepository extends BaseRepository
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
        return tipocontacto::class;
    }
}
