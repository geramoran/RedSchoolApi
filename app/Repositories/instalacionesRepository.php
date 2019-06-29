<?php

namespace App\Repositories;

use App\Models\instalaciones;
use App\Repositories\BaseRepository;

/**
 * Class instalacionesRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:25 am UTC
*/

class instalacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'src',
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
        return instalaciones::class;
    }
}
