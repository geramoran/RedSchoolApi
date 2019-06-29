<?php

namespace App\Repositories;

use App\Models\cuota;
use App\Repositories\BaseRepository;

/**
 * Class cuotaRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:36 am UTC
*/

class cuotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'Precio',
        'Escuela_has_Nivel_id'
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
        return cuota::class;
    }
}
