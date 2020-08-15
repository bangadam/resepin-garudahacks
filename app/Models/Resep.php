<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Resep
 * @package App\Models
 * @version August 15, 2020, 5:52 am UTC
 *
 * @property integer $id_user_pasien
 * @property integer $id_user_dokter
 * @property integer $id_user_apoteker
 * @property string|\Carbon\Carbon $tanggal_resep
 * @property string|\Carbon\Carbon $tanggal_tebus
 * @property string $diagnosa
 */
class Resep extends Model
{

    public $table = 'resep';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id_user_pasien',
        'id_user_dokter',
        'id_user_apoteker',
        'tanggal_resep',
        'tanggal_tebus',
        'diagnosa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user_pasien' => 'integer',
        'id_user_dokter' => 'integer',
        'id_user_apoteker' => 'integer',
        'tanggal_resep' => 'datetime',
        'tanggal_tebus' => 'datetime',
        'diagnosa' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal_resep' => 'required',
        'diagnosa' => 'nullable|string|max:255',
    ];

    public function resepDetail() {
        return $this->hasMany(ResepDetail::class, 'id_resep', 'id');
    }

    public function dokter() {
        return $this->hasOne(Dokter::class, 'id', 'id_user_dokter');
    }
}
