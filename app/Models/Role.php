<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $dates = ['start_date', 'expiry_date'];

    public function getRouteKey()
    {
        return 'label'; // TODO: Change the autogenerated stub
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'permissionable');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function modules()
    {
        return $this->morphToMany(Module::class, 'moduleable');
    }

    public function grantPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
