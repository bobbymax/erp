<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeGroup extends Model
{
    public function allowance()
    {
    	return $this->hasOne(Allowance::class);
    }
}
