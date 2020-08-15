<?php

namespace App\Repositories;

use App\Models\Apotek;
use App\Repositories\BaseRepository;

/**
 * Class ApotekRepository
 * @package App\Repositories
 * @version August 15, 2020, 3:23 am UTC
*/

class ApotekRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'nomor_izin'
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
        return Apotek::class;
    }
}
