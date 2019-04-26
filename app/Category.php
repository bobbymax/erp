<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['module_id', 'name', 'label', 'icon', 'archived'];

    public function module()
    {
    	return $this->belongsTo(Module::class, 'module_id');
    }
}
