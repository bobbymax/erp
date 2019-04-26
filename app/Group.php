<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'label', 'code', 'parent', 'relative', 'archived'];

    public function directorate()
    {
    	return $this->belongsTo(Group::class, 'parent');
    }

    public function division()
    {
    	return $this->belongsTo(Group::class, 'relative');
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class, 'group_permission');
    }

    public function givePermissionTo(Permission $permission)
    {
    	return $this->permissions()->save($permission);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class, 'user_group');
    }

    // public function assignGroupTo(User $user)
    // {
    // 	return $this->users()->save($user);
    // }
}
