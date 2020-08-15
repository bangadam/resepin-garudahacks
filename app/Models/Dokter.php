<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dokter
 * @package App\Models
 * @version August 15, 2020, 12:17 am UTC
 *
 * @property integer $id_user
 * @property string $sip
 * @property string $str
 */
class Dokter extends Model
{

    public $table = 'dokter';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'id_user',
        'sip',
        'str'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'sip' => 'string',
        'str' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'sip' => 'required|string|max:255',
        'str' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

}
