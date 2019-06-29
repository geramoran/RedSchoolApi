<?php

namespace App\Repositories;

use App\Models\subnivel;
use App\Repositories\BaseRepository;

/**
 * Class subnivelRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:39 am UTC
*/

class subnivelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'subNivelAtributos_id'
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
        return subnivel::class;
    }
}
