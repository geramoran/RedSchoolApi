<?php

namespace App\Repositories;

use App\Models\media;
use App\Repositories\BaseRepository;

/**
 * Class mediaRepository
 * @package App\Repositories
 * @version June 29, 2019, 2:36 am UTC
*/

class mediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'src',
        'typeMedia_id',
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
        return media::class;
    }
}
