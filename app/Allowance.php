<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    public function gradeGroup()
    {
    	return $this->belongsTo(GradeGroup::class, 'grade_group_id');
    }
}
