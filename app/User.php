<?php

namespace App;

use App\Models\Pasien;
use App\Models\Resep;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function hasRoles() {
        return $this->hasOne(UserRoles::class, 'user_id', 'id');
    }

    public function pasien() {
        return $this->hasOne(Pasien::class, 'id_user', 'id');
    }

    public function resep() {
        return $this->hasMany(Resep::class, 'id_user_pasien', 'id');
    }
}
