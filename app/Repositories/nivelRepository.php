<?php

namespace App\Repositories;

use App\Models\nivel;
use App\Repositories\BaseRepository;

/**
 * Class nivelRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:39 am UTC
*/

class nivelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'subnivel_id',
        'nivelAtributos_id'
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
        return nivel::class;
    }
}
