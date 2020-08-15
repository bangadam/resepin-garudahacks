<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pasien
 * @package App\Models
 * @version August 15, 2020, 12:12 am UTC
 *
 * @property integer $id_user
 * @property string $dob
 */
class Pasien extends Model
{

    public $table = 'pasien';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'id_user',
        'dob'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'dob' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dob' => 'required',
        'name' => 'required',
        'password' => 'required',
        'email' => 'required|unique:users,email',
        'alamat' => 'required',
        'telepon' => 'required',
        'nik' => 'required|unique:users,nik',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function resep() {
        return $this->hasMany(Resep::class, 'id_user_pasien', 'id_user');
    }
}
