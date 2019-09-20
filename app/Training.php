<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [

        'user_id', 'category_id', 'title', 'label', 'provider', 'provider_slug', 'training_type', 'location', 'start_date', 'end_date', 'certificate', 'amount', 'location_during_training', 'completed', 'archived',
        
    ];

    protected $dates = [

        'start_date', 'end_date',

    ];

    public function proposed()
    {
        return $this->hasOne(Proposed::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

}
