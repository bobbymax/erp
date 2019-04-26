<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['module_id', 'name', 'label', 'icon', 'permission', 'route', 'archived'];

    public function module()
    {
    	return $this->belongsTo(Module::class);
    }
}
