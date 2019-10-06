<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function travelCategory()
    {
    	return $this->belongsTo(TravelCategory::class, 'travel_category_id');
    }
}
