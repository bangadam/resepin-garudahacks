<?php

namespace App\Repositories;

use App\Models\ResepDetail;
use App\Repositories\BaseRepository;

/**
 * Class ResepDetailRepository
 * @package App\Repositories
 * @version August 15, 2020, 5:53 am UTC
*/

class ResepDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_resep',
        'id_obat',
        'kuantitas',
        'satuan',
        'periode',
        'dalam_sehari',
        'dalam_sekali',
        'boleh_berulang'
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
        return ResepDetail::class;
    }
}
