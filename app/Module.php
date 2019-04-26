<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'label', 'icon', 'permission', 'route', 'archived'];

    public function menus()
    {
    	return $this->hasMany(Menu::class);
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
