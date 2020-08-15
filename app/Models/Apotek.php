<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Apotek
 * @package App\Models
 * @version August 15, 2020, 3:23 am UTC
 *
 * @property string $nama
 * @property string $alamat
 * @property string $nomor_izin
 */
class Apotek extends Model
{
    public $table = 'apotek';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nama',
        'alamat',
        'nomor_izin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'alamat' => 'string',
        'nomor_izin' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'nomor_izin' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
