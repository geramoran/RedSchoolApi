<?php

namespace App\Repositories;

use App\Models\escuela;
use App\Repositories\BaseRepository;

/**
 * Class escuelaRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:41 am UTC
*/

class escuelaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'premium1',
        'premium2',
        'premium3'
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
        return escuela::class;
    }
}
