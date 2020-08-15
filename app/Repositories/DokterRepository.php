<?php

namespace App\Repositories;

use App\Models\Dokter;
use App\Repositories\BaseRepository;

/**
 * Class DokterRepository
 * @package App\Repositories
 * @version August 15, 2020, 12:17 am UTC
*/

class DokterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'sip',
        'str'
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
        return Dokter::class;
    }
}
