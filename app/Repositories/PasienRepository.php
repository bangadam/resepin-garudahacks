<?php

namespace App\Repositories;

use App\Models\Pasien;
use App\Repositories\BaseRepository;

/**
 * Class PasienRepository
 * @package App\Repositories
 * @version August 15, 2020, 12:12 am UTC
*/

class PasienRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'dob'
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
        return Pasien::class;
    }
}
