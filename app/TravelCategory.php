<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCategory extends Model
{
    public function gradeGroups()
    {
    	return $this->belongsToMany(GradeGroup::class, 'per_diem_allowances')->withPivot('per_diem');
    }

    public function trainings()
    {
    	return $this->hasMany(Training::class);
    }
}
