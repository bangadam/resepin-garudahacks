<?php

namespace App\Repositories;

use App\Models\Apoteker;
use App\Repositories\BaseRepository;

/**
 * Class ApotekerRepository
 * @package App\Repositories
 * @version August 15, 2020, 3:25 am UTC
*/

class ApotekerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_apotek'
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
        return Apoteker::class;
    }
}
