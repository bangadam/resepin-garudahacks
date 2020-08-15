<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResepDetail
 * @package App\Models
 * @version August 15, 2020, 5:53 am UTC
 *
 * @property integer $id_resep
 * @property integer $id_obat
 * @property integer $kuantitas
 * @property string $satuan
 * @property integer $periode
 * @property integer $dalam_sehari
 * @property integer $dalam_sekali
 * @property boolean $boleh_berulang
 */
class ResepDetail extends Model
{

    public $table = 'resep_detail';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_resep' => 'integer',
        'id_obat' => 'integer',
        'kuantitas' => 'integer',
        'satuan' => 'string',
        'periode' => 'integer',
        'dalam_sehari' => 'integer',
        'dalam_sekali' => 'integer',
        'boleh_berulang' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_resep' => 'required',
        'id_obat' => 'required',
        'kuantitas' => 'required',
        'satuan' => 'required|string|max:255',
        'periode' => 'required',
        'dalam_sehari' => 'required',
        'dalam_sekali' => 'required',
        'boleh_berulang' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function obat() {
        return $this->hasOne(Obat::class, 'id', 'id_obat');
    }
}
