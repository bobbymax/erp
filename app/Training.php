<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [

        'user_id', 'category_id', 'title', 'label', 'provider', 'provider_slug', 'location', 'approved', 'review', 'start_date', 'end_date', 'certificate', 'location_during_training', 'archived',
        
    ];

    protected $dates = [

        'start_date', 'end_date',

    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
