<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeGroup extends Model
{
    public function allowance()
    {
    	return $this->hasOne(Allowance::class);
    }

    public function travelCategories()
    {
    	return $this->belongsToMany(TravelCategory::class, 'per_diem_allowances')->withPivot('per_diem');
    }

    public function users()
    {
    	return $this->hasMany(Profile::class);
    }

    // public function estacode(TravelCategory $travel, GradeGroup $gradeGroup)
    // {
    //     $estacode = DB::table('per_diem_allowances')->where('travel_category_id', $travel->id)->where('grade_group_id', $gradeGroup->id)->pluck('per_diem');

    //     return $estacode;
    // }
}
