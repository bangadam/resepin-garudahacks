<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Apoteker
 * @package App\Models
 * @version August 15, 2020, 3:25 am UTC
 *
 * @property integer $id_user
 * @property integer $id_apotek
 */
class Apoteker extends Model
{

    public $table = 'apoteker';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'id_user',
        'id_apotek'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_apotek' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'id_apotek' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function apotek() {
        return $this->hasOne(Apotek::class, 'id', 'id_apotek');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
