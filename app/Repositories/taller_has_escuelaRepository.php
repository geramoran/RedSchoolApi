<?php

namespace App\Repositories;

use App\Models\taller_has_escuela;
use App\Repositories\BaseRepository;

/**
 * Class taller_has_escuelaRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:37 am UTC
*/

class taller_has_escuelaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Taller_id'
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
        return taller_has_escuela::class;
    }
}
