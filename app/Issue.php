<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['category_id', 'name', 'label', 'requests', 'archived'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}
