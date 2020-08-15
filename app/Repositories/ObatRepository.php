<?php

namespace App\Repositories;

use App\Models\Obat;
use App\Repositories\BaseRepository;

/**
 * Class ObatRepository
 * @package App\Repositories
 * @version August 14, 2020, 4:17 pm UTC
*/

class ObatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return Obat::class;
    }
}
