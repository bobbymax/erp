<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $dates = ['date_joined'];
	
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function accountDirectorate()
    {
    	return $this->belongsTo(Group::class, 'directorate');
    }

    public function accountDivision()
    {
    	return $this->belongsTo(Group::class, 'division');
    }

    public function accountDepartment()
    {
    	return $this->belongsTo(Group::class, 'department');
    }

    public function gradeGroup()
    {
        return $this->belongsTo(GradeGroup::class, 'grade_group_id');
    }
}
