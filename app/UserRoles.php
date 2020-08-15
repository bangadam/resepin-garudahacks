<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'users_has_roles';

    protected $guarded = [];

    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
