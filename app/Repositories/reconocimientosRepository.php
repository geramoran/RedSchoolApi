<?php

namespace App\Repositories;

use App\Models\reconocimientos;
use App\Repositories\BaseRepository;

/**
 * Class reconocimientosRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:28 am UTC
*/

class reconocimientosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'Escuela_id'
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
        return reconocimientos::class;
    }
}
