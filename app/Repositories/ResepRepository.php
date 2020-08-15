<?php

namespace App\Repositories;

use App\Models\Resep;
use App\Repositories\BaseRepository;

/**
 * Class ResepRepository
 * @package App\Repositories
 * @version August 15, 2020, 5:52 am UTC
*/

class ResepRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user_pasien',
        'id_user_dokter',
        'id_user_apoteker',
        'tanggal_resep',
        'tanggal_tebus',
        'diagnosa'
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
        return Resep::class;
    }
}
